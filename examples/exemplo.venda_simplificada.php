<?php

require_once("vendor/autoload.php");

use Braspag\ApiService;
use Braspag\Model\Sale;

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
        'creditCard' => [
            'cardNumber' => '4532117080573700',
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

// retorna Braspag\Model\Sale
$result = $service->authorize($sale);

if ($result->isValid()) {
    // Braspag\Model\Payment
    $payment = $result->getPayment();

    // Array do pagamento
    $paymentArray = $result->getPayment()->toArray();

    // Braspag\Model\Customer
    $customer = $result->getCustomer();

    // Array do cliente
    $customer = $result->getCustomer()->toArray();

    // Array do pedido completo
    $result->toArray();


} else {
    $messages = $result->getMessages();
    // mensagens de alerta e erros
}
