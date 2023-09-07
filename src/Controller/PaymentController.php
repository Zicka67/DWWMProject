<?php

namespace App\Controller;

// require_once '../vendor/autoload.php';
require_once 'stripe/secret.php';

use Exception;
use App\Entity\Cours;
use Stripe\StripeClient;
use App\Repository\CoursRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Bundle\SecurityBundle\SecurityBundle;

class PaymentController extends AbstractController
{

#[Route('/payment/{id}', name: 'reservation_payment')]
public function reservationPayment (int $id, ReservationRepository $reservationRepository, EntityManagerInterface $em, Security $security) 
{
    $reservation = $reservationRepository->find($id);
    $reservationUser = $reservation->getUser();
    $user = $security->getUser();

    /** @var \App\Entity\User $user docblock */ 
    if ($user->getId() != $reservationUser->getId()) 
    {
        return $this->redirect('/');
    }

    return $this->render('payment/index.html.twig',[
        'reservationId' => $id,
        'userMail' => $reservationUser->getEmail()
        ]);
}

#[Route('/create-payment-intent', name: 'checkout')]
public function checkout(ReservationRepository $reservationRepository, EntityManagerInterface $em, Request $request): Response
{
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);
    $id = $jsonObj->reservationId;

    // Trouve le cours basé sur le slug
    $reservation = $reservationRepository->find($id);
    // $cours = $em->getRepository(Cours::class)->findOneBy(['slug_cours' => $slug]);

    if (!$reservation) {
        throw $this->createNotFoundException('La reservation demandée n\'existe pas.');
    }

    $amount = $reservation->getCours()->getPrix() * 100;

    // Définir la clé secrète Stripe
    $stripe = new StripeClient(STRIPE_SECRET_KEY);

    try {
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $amount,
            'currency' => 'eur',
            'payment_method_types' => ['card'],
            'metadata' => [
                'reservationId' => $id,
            ],
        ]);

        $output = [
            'clientSecret' => $paymentIntent->client_secret,
        ];

        return new JsonResponse($output);

    }catch (Exception $e) {
        http_response_code(500);
        return new JsonResponse(['error' => $e->getMessage()]);
    }
    
}


#[Route('/payment-success', name: 'success_payment')]
public function paymentSuccess(): Response
{
    // Ajouter email de confirmation ?
    // un reçu ?

    return $this->render('payment/success.html.twig');
}

}