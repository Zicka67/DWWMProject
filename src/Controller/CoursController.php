<?php

namespace App\Controller;

use DateTime;
use App\Entity\Reservation;
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
                                                                
    $course = $em->getRepository("App\Entity\Cours")->findOneBy(['slug_cours' => $name]);

    //DQL pour select les jours des dates non dispo pour le mois courant(soit pour le cours courant soit tous)
    $unavailabilities = $em->createQuery(
        "SELECT DATE_FORMAT(ud.date, '%d') as unvalableDay 
        FROM App\Entity\UnavailableDate ud 
        WHERE DATE_FORMAT(ud.date, '%m') = :date 
        AND (ud.all_courses = true OR ud.course = :idCourse) 
        AND ud.all_day = true"
        )
    ->setParameter(":date", $date)
    ->setParameter(":idCourse", $course->getId())
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
    // $date=date_create("2023-06-13");
                                        
    // Cette ligne récupère le cours dont le slug correspond à la variable $name dans la base de données en utilisant l'EntityManager $em.
    $course = $em->getRepository("App\Entity\Cours")->findOneBy(['slug_cours' => $name]);

    // Le bloc de code suivant exécute une requête pour obtenir les dates non disponibles (UnavailableDate) pour le cours spécifique ou pour tous les cours (si all_courses est défini comme vrai) pour la date spécifique :
    $unavailabilities = $em->createQuery(
        "SELECT ud.slot, ud.all_day 
        FROM App\Entity\UnavailableDate ud 
        WHERE ud.date = :date 
        AND (ud.all_courses = true OR ud.course = :idCourse)"
        )
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
    $courseSlug  = $request->request->get('courseName');
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
    $reservation->setUser($user);
    $reservation->setDtResa(new DateTime());
    $reservation->setDtCours(new DateTime($date." ".$time));
    $reservation->setPayementMethod($request->request->get('payment-method'));

    // On enregistre et flush la reservation en DB
    $em->persist($reservation);
    $em->flush();
    //  On vérifie si la méthode de paiement de la réservation est "payment-online"
    if ($reservation->getPayementMethod() == "payment-online") {
        //  On redirige l'utilisateur vers la page de paiement, en ajoutant l'ID de la réservation à l'URL.
        return $this->redirect("payment/".$reservation->getId());
    }
    // Si la méthode de paiement n'est pas "payment-online", on redirige l'utilisateur vers le cours après payement.
    return $this->redirect("cours/".$courseSlug);
}


}