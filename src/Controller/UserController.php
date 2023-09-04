<?php

namespace App\Controller;

use App\Form\ChangeEmailType;
use App\Form\ChangePseudoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class UserController extends AbstractController
{
#[Route('/profil', name: 'app_user')]
public function index(): Response
{
    return $this->render('user/profil.html.twig', [
        'controller_name' => 'UserController',
    ]);
}

#[Route('/profil', name: 'app_userShow')]
public function show(Security $security): Response
{
    $user = $security->getUser();

    return $this->render('user/profil.html.twig', [
        'user' => $user,
    ]);
}

#[Route('/user/changePseudo', name: 'account_change_pseudo')]
public function changePseudo(Request $request, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    $form = $this->createForm(ChangePseudoType::class, $user);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        $this->addFlash('success', 'Votre pseudo a été modifié avec succès.');
        
        return $this->redirectToRoute('app_user');
    }

    return $this->render('user/changePseudo.html.twig', [
        'changePseudoForm' => $form->createView(),
    ]);
}

#[Route('/user/changeEmail', name: 'account_change_email')]
public function changeEmail(Request $request, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    $form = $this->createForm(ChangeEmailType::class, $user);

    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        $this->addFlash('success', 'Votre adresse e-mail a été modifiée avec succès.');

        return $this->redirectToRoute('app_user');
    }

    return $this->render('user/changeEmail.html.twig', [
        'changeEmailForm' => $form->createView(),
    ]);
}
}