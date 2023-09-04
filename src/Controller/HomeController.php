<?php

namespace App\Controller;

use App\Repository\CoursRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
#[Route('/', name: 'app_home')]
public function index(CoursRepository $coursRepository): Response
{

    $cours = $coursRepository->findAll();

    return $this->render('home/index.html.twig', [
        'controller_name' => 'HomeController',
        'listeCours' => $cours,
    ]);
}


}