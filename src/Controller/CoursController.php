<?php

namespace App\Controller;

use DateTime;
use App\Entity\Reservation;
use App\Service\PdfGenerator;
use App\Form\UserDetailsFormType;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CoursController extends AbstractController
{

private $pdfGenerator;

public function __construct(PdfGenerator $pdfGenerator)
{
    $this->pdfGenerator = $pdfGenerator;
}


#[Route('/showCours', name: 'app_cours')]
public function index(CoursRepository $coursRepository): Response
{
    $cours = $coursRepository->findAll();
    // dump($cours); die;
    return $this->render('pagesInfo/showCours.html.twig', [
        'listeCours' => $cours,
    ]);
}

// *****
// Cette fonction est utilisée pour récupérer les jours indisponibles pour un cours 
// spécifique dans un mois donné. On commence par obtenir le mois à partir de la date 
// envoyée dans la requête, puis on recherche le cours spécifié par le slug dans la 
// base de données. Ensuite, on exécute une requête DQL pour sélectionner tous les 
// jours du mois actuel qui sont marqués comme indisponibles pour ce cours spécifique 
// (ou pour tous les cours si all_courses est vrai) et où all_day est vrai. On formate 
// ensuite ces jours dans un tableau et on renvoie ce tableau sous forme de réponse JSON.
// *****

#[Route('/days_unavailable/{name}', name: 'days_unavailable')]
public function days_unavailable(string $name, Request $request, EntityManagerInterface $em): Response{

    //Recupere / convertit / formate
    $date = date_format(date_create($request->request->get('date')), "m");
                      
    // Récupère l'entité du cours en fonction du slug fourni dans l'URL
    $course = $em->getRepository("App\Entity\Cours")->findOneBy(['slug_cours' => $name]);

    //DQL pour select les jours des dates non dispo pour le mois courant(soit pour le cours courant soit tous)
    $unavailabilities = $em->createQuery(
        // Sélectionne et formate la date depuis l'entité UnavailableDate (aliasée en ud) DATE_FORMAT pour formater.
        "SELECT DATE_FORMAT(ud.date, '%d') as unvalableDay 
        -- On cible l'entité aliasé en ud
        FROM App\Entity\UnavailableDate ud 
        -- DATE_FORMAT pour filtrer par mois
        WHERE DATE_FORMAT(ud.date, '%m') = :date 
        -- Vérifie si la date non disponible ud concerne tous les cours ou juste un cours spécifique
        AND (ud.all_courses = true OR ud.course = :idCourse) 
        -- Filtre pour ne récupérer que les dates où all_day est vrai.
        AND ud.all_day = true"
        )
    //on filtre :date pour récupérer le mois
    ->setParameter(":date", $date)
    //on filtre :idCourse pour récupérer l'id du cours
    ->setParameter(":idCourse", $course->getId())
    // on execute
    ->getResult();

    $formatedSlot = [];

    foreach($unavailabilities as $slot){
        $formatedSlot[] = $slot["unvalableDay"];
    }

    return new JsonResponse($formatedSlot);
}
// *****
//  Cette fonction est similaire à la précédente, mais au lieu de récupérer les jours indisponibles,
//  elle récupère les créneaux horaires spécifiques qui sont indisponibles pour un cours 
//  spécifique pour une date donnée. Elle commence par obtenir la date à partir de 
//  la requête et recherche le cours par son slug. Ensuite, elle exécute une requête 
//  DQL pour récupérer les créneaux horaires indisponibles et vérifie également si tout le 
//  jour est marqué comme indisponible. Elle vérifie également les réservations existantes
//   pour le cours sur cette date et ajoute ces créneaux horaires à la liste des créneaux 
//   indisponibles. La liste est ensuite renvoyée sous forme de réponse JSON.
// *****

#[Route('/course_unavailability/{name}', name: 'course_unavailability')]
public function course_unavailability(string $name, Request $request, EntityManagerInterface $em): Response
{
    // Cette ligne crée un objet de type DateTime à partir de la date récupérée dans la requête HTTP et le stocke dans la variable $date.
    $date = date_create($request->request->get('date'));

                                        
    // Cette ligne récupère le cours dont le slug correspond à la variable $name dans la base de données en utilisant l'EntityManager $em.
    $course = $em->getRepository("App\Entity\Cours")->findOneBy(['slug_cours' => $name]);

    // DQL => exécute une requête pour obtenir les dates non disponibles (UnavailableDate) pour le cours spécifique ou pour tous les cours (si all_courses est défini comme vrai) pour la date spécifique :
    $unavailabilities = $em->createQuery(
        //On selectionne slot et all_day de l'entité Unavailable
        // Compare le champ date de l'entité à une valeur lier pus tard via setParameter(":date", $date)
        // Si all_courses=true OU si ud.course est égal à la valeur lier plus tard via setParameter(":idCourse", $course->getId()) => vraie
        "SELECT ud.slot, ud.all_day 
        FROM App\Entity\UnavailableDate ud 
        WHERE ud.date = :date 
        AND (ud.all_courses = true OR ud.course = :idCourse)"
        )

    // La requête qui récupère les dates non disponibles utilise des paramètres nommés :date et :idCourse. 
    // Ces paramètres sont bindés à l'aide de la méthode setParameter(), ce qui prévient les injections SQL.
    ->setParameter(":date", $date)
    ->setParameter(":idCourse", $course->getId())
    ->getResult();

    // Le bloc de code suivant exécute une requête pour obtenir les réservations existantes pour le cours spécifique :
    $resevations = $em->createQuery(
        "SELECT r.dt_cours 
        FROM App\Entity\Reservation r 
        WHERE r.cours = :idCourse"
        )
    ->setParameter(":idCourse", $course->getId())
    ->getResult();

    // Cette ligne initialise un tableau vide $formatedSlot.
    $formatedSlot = [];

    // Le bloc foreach suivant parcourt les indisponibilités récupérées précédemment. Si all_day est vrai, le tableau $formatedSlot est réinitialisé avec une seule valeur "all day". Sinon, si un créneau est défini, il est formaté et ajouté au tableau $formatedSlot.
    foreach($unavailabilities as $slot){
        if($slot["all_day"]){
            $formatedSlot = ["all day"];
            break;
        }
        elseif($slot["slot"]){
            $formatedSlot[] = date_format($slot["slot"], "H:i");
        }
    }

    // Le deuxième bloc foreach parcourt les réservations récupérées précédemment. Si la date de la réservation correspond à la date donnée, le créneau horaire de la réservation est formaté et ajouté au tableau $formatedSlot.
    foreach($resevations as $resevation){
        if(date_format($resevation["dt_cours"], "Y-m-d")==date_format($date, "Y-m-d")){
            $formatedSlot[] = date_format($resevation["dt_cours"], "H:i");
        }
    }

    // Renvoyez la liste des créneaux indisponibles au format JSON
    return new JsonResponse($formatedSlot);
}

#[Route('/save_reservation', name: 'save_reservation')]
public function save_reservation(Security $security, Request $request, EntityManagerInterface $em): Response
{
    // On utilise le service Security pour obtenir l'utilisateur actuellement connecté et on le stocke dans la variable
    $user = $security->getUser();
    // On récupère le nom du cours à partir de la requête HTTP et on le stock
    $courseSlug = filter_var($request->request->get('courseName'), FILTER_SANITIZE_SPECIAL_CHARS);
    // On utilise l'EM, on récupère le chemin pour l'entité Cours, on cherche le cours correspondant au slug.
    $course = $em->getRepository("App\Entity\Cours")->findOneBy(['slug_cours' => $courseSlug ]);
    // On vérifie si un utilisateur est connecté.
    if (!$user) {
        // On utilise l'objet Request pour obtenir la session en cours.
        $session = $request->getSession();
        // On stocke l'URL que l'utilisateur avait l'intention de visiter dans la session pour la redirection
        $session->set("intentedUrl", "cours/".$courseSlug);
        // On redirige l'utilisateur vers la page de connexion.
        return $this->redirectToRoute('app_login');
    }
    // On récupère la date du créneau à réserver à partir de la requête HTTP.
    $date = $request->request->get('slotDate');
    // On récupère la lheure du créneau à réserver à partir de la requête HTTP.
    $time = $request->request->get('slotTime');

    $reservation = new Reservation;
    
    // On définit les attributs de la réservation
    $reservation->setCours($course);
    //user récupéré avec getUser
    $reservation->setUser($user);
    //date actuelle de la resa (aujorud'hui)
    $reservation->setDtResa(new DateTime());
    //date du cours selectionné avec les slotDate et slotTime plus haut (jour + heure)
    $reservation->setDtCours(new DateTime($date." ".$time));
    $reservation->setPayementMethod($request->request->get('payment-method'));
    $reservation->setIsPaid(0);

    // On enregistre et flush la reservation en DB
    $em->persist($reservation);
    $em->flush();

    //  On vérifie si la méthode de paiement de la réservation est "payment-online"
    if ($reservation->getPayementMethod() == "payment-online") {
        return $this->redirectToRoute("user_details", ['id' => $reservation->getId()]);
    }
    // Si la méthode de paiement n'est pas "payment-online", on redirige l'utilisateur vers le cours après payement.
    // return $this->redirect("cours/".$courseSlug);
    return $this->redirectToRoute("user_details", ['id' => $reservation->getId()]);
}

#[Route('/user_details/{id}', name: 'user_details')]
public function userDetails($id, Request $request, EntityManagerInterface $em): Response
{
    // Récupère la réservation existante en utilisant l'ID
    $reservation = $em->getRepository(Reservation::class)->find($id);
    // Vérifie si la réservation existe
    if (!$reservation) {
        throw $this->createNotFoundException('Aucune réservation trouvée pour cet ID');
    }
    // Créer le formulaire
    $form = $this->createForm(UserDetailsFormType::class, $reservation);

    $form->handleRequest($request);

    if ($form->isSubmitted()) {
        
        // Vérifie le honeypot
        if ($form->get('honeypot')->getData()) {
            $this->addFlash('error', 'Veuillez attendre quelques minutes avant de réessayer.');
            return $this->redirectToRoute('app_home'); 
        }

        if ($form->isValid()) {
            // Update de la réservation existante
            $em->flush();

            // Veérifie le mode de paiement
            if ($reservation->getPayementMethod() == "payment-sur-place") {
                
                // Redirige vers la page des cours
                $this->addFlash('success', 'Votre reservation à bien été faite');
                return $this->redirect('http://localhost:8000/showCours');
            }
            // Redirige vers page de paiement
            return $this->redirectToRoute("reservation_payment", ['id' => $reservation->getId()]);
        }
    }

    return $this->render('payment/userDetails.html.twig', [
        'form' => $form->createView(),
        'reservation' => $reservation
    ]);
}




}