<?php

namespace App\Controller;

require_once '../vendor/autoload.php';
require_once '../stripe/secret.php';

use Stripe\Stripe;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WebhookController extends AbstractController
{
#[Route('/webhook', name: 'app_webhook')]
public function index(): Response
{
    Stripe::setApiKey(STRIPE_SECRET_KEY);
    // A mettre dans secret.php pour la s&curité
    $endpoint_secret = 'whsec_2d0104dd61f1b9d7b8648e3d2186f99cefde7f51613b2053a61a9f504bb46e7d';

    $payload = @file_get_contents('php://input');
    $sig_header = $_SERVER['HTTP_STRIPE_SIGNATURE'];
    $event = null;

    try {
    $event = \Stripe\Webhook::constructEvent(
        $payload, $sig_header, $endpoint_secret
    );
    } catch(\UnexpectedValueException $e) {
    // Invalid payload
    http_response_code(400);
    // return new Response('...', 400);
    exit();
    } catch(\Stripe\Exception\SignatureVerificationException $e) {
    // Invalid signature
    http_response_code(400);
    // return new Response('...', 400);
    exit();
    }

    // Handle the event
    switch ($event->type) {
    case 'payment_intent.succeeded':
        echo 'Payment success';
        $paymentIntent = $event->data->object;  
    // ... handle other event types
    default:
        echo 'Received unknown event type ' . $event->type;
    }

    // http_response_code(200);
    return new Response('Success', 200);
}
}