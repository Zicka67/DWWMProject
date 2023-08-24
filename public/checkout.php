<?php

use Stripe\Stripe;
use Stripe\Checkout\Session;



require_once '../vendor/autoload.php';
require_once '../secrets.php';

Stripe::setApiKey('sk_test_51NAwNZJWIv9Iz53oOKn37p6lx6EGH5x1BQRPdXkZAVD1dqeJcmLCvMITw8RuaMsqT8sWMgCa7A6UPbcsw8MlsBbe00odwndVen');
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:4242';

$checkout_session = $stripe->checkout->sessions->create([
  'line_items' => [[
    'price' => 'price_1NJeECJWIv9Iz53ocE3wrlML',
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '/payment/success',
  // 'cancel_url' => $YOUR_DOMAIN . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header('Location:'.$checkout_session->url,true,303);
header("Location: " . $checkout_session->url);