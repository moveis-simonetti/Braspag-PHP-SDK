<?php

$path = dirname(dirname(dirname(__FILE__)));
$fileName = $path . "/vendor/autoload.php";
//echo $fileName;
require_once($fileName);

use Braspag\ApiService;
use Braspag\Model\Sale\Sale;

$data = [
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

$sale = new Sale($data);

$service = new ApiService([
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
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
    $customerArray = $result->getCustomer()->toArray();

    // Array do pedido completo
    $saleArray = $result->toArray();

    print_r($saleArray);

} else {
    $messages = $result->getMessages();
    // mensagens de alerta e erros

    print_r($messages);
}