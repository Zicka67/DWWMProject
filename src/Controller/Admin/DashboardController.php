<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Cours;
use App\Entity\Payement;
use App\Entity\Reservation;
use App\Entity\UnavailableDate;
use App\Controller\Admin\CoursCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
public function __construct(
    private AdminUrlGenerator $adminUrlGenerator
) {
    
}

#[Route('/admin', name: 'admin')]
public function index(): Response
{
    // return parent::index();
    $url = $this->adminUrlGenerator
        ->setController(CoursCrudController::class)
        ->generateUrl();

    return $this->redirect($url);
}

public function configureDashboard(): Dashboard
{
    return Dashboard::new()
        ->setTitle('LittleCocon');
}

public function configureMenuItems(): iterable
{
    yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

    yield MenuItem::linkToCrud('Cours', 'fas fa-solid fa-arrow-right', Cours::class); 

    yield MenuItem::linkToCrud('Payement', 'fas fa-solid fa-arrow-right', Payement::class);
    
    yield MenuItem::linkToCrud('Reservation', 'fas fa-solid fa-arrow-right', Reservation::class);

    yield MenuItem::linkToCrud('User', 'fas fa-solid fa-arrow-right', User::class);

    yield MenuItem::linkToCrud('UnavailableDate', 'fas fa-solid fa-arrow-right', UnavailableDate::class);

    // yield MenuItem::linkToCrud('', 'fas fa-solid fa-arrow-right', ::class);
}
}
