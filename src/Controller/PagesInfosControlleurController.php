<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PagesInfosControlleurController extends AbstractController
{

// Route pour tt les cours
#[Route('cours/{templateName}', name: 'detailCours')]
public function detailCours(string $templateName): Response
{
    if (file_exists(__DIR__.'/../../templates/pagesInfo/'.$templateName.'.html.twig')) {
        return $this->render('pagesInfo/'.$templateName.'.html.twig');
    }
    return $this->redirectToRoute('app_cours');
}


// Route pour les infos
#[Route('/mentionsLegales', name: 'mentionsLegales')]
public function mentionsLegales(): Response
{
    return $this->render('pagesInfo/mentions-legales.html.twig');
}


#[Route('/politiqueDeConf', name: 'politiqueDeConf')]
public function politiqueDeConf(): Response
{
    return $this->render('pagesInfo/politique-confidentialité.html.twig');
}


#[Route('/termesConditions', name: 'termesConditions')]
public function termesConditions(): Response
{
    return $this->render('pagesInfo/termes-conditions.html.twig');
}

// Route pour la bio
#[Route('/mon-parcours', name: 'monParcours')]
public function monParcours(): Response
{
    return $this->render('pagesInfo/mon-parcours.html.twig');
}


// Route pour les contacts
#[Route('/contacts', name: 'contacts')]
public function contact(Request $request, MailerInterface $mailer)
{
    $form = $this->createForm(ContactType::class);
    $form->handleRequest($request);

    if ($form->isSubmitted()) {

        // Vérification de la soumission précédente
        $session = $request->getSession();
        $lastSuspiciousSubmission = $session->get('last_suspicious_submission');
        if ($lastSuspiciousSubmission && (time() - $lastSuspiciousSubmission < 60)) {  // 600 secondes = 10 minutes
            $this->addFlash('error', 'Veuillez attendre encore quelques minutes avant de réessayer.');
            return $this->redirectToRoute('app_home');
        }

        if ($form->get('honeypot')->getData()) {
            // Le formulaire a probablement été soumis par un robot
            $session->set('last_suspicious_submission', time());
            $this->addFlash('error', 'Veuillez attendre quelques minutes avant de réessayer.');
            return $this->redirectToRoute('app_home');
        }

        if ($form->isValid()) {
            $contactFormData = $form->getData();

            $email = (new Email())
                ->from($contactFormData['email'])
                ->to('littlecocon@gmail.com')
                ->subject($contactFormData['sujet'])
                ->text($contactFormData['message']);

            $mailer->send($email);

            $this->addFlash('success', 'Merci pour votre message, il a bien été envoyé');

            return $this->redirectToRoute('contacts');
        }   
    }

    return $this->render('pagesInfo/contacts.html.twig', [
        'contact_form' => $form->createView(),
    ]);
}


}