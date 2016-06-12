<?php

require_once("vendor/autoload.php");

use Braspag\ApiService;
use Braspag\Model\Sale;
use Braspag\Model\CaptureRequest;

// criando um pedido sem captura
$sale = [
    'merchantOrderId' => 2016080600,
    'customer' => [
        'name' => 'Comprador de Testes',
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'provider' => 'Simulado',
        'installments' => 1,
        'capture' => true,
        'authenticate' => false,
        'creditCard' => [
            'cardNumber' => '4532117080573700', //'4931031130079792',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'brand' => 'Visa'
        ]
    ]
];
$sale = new Sale($sale);

$service = new ApiService([
    'merchantId' => '5f0776bf-0600-4f14-bc51-fe28e4d9eebf',
    'merchantKey' => 'NEIJRYCSVYLNGAPYMZPJFYEPRUSARXOHBESBURMH',
]);
$sale = $service->authorize($sale);

// testa se o pedido foi autorizado
if ($sale->isValid()) {

    try {
        $paymentId = $sale->getPayment()->getPaymentId();
        $captureRequest = new CaptureRequest(['amount' => $sale->getPayment()->getAmount(), 'serviceTaxAmount' => 0]);

        $capture = $service->capture($paymentId, $captureRequest);

        if ($capture->isValid()) {
            print_r($capture);
        } else {
            print_r($capture->getMessages());
        }

    } catch (\Exception $e) {
        echo $e->getMessage(), PHP_EOL;
    }

} else {
    print_r($sale->getMessages());
}



