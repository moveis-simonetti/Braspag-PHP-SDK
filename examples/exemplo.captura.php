<?php

/**
 * Braspag PHP SDK
 *
 * @link https://github.com/JotJunior/BraspagPhpSdk for the canonical source repository
 * @copyright Copyright (c) 2016 JotJunior
 *
 * This file is part of Braspag-PHP-SDK.
 *
 * Braspag PHP SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Braspag-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Braspag-PHP-SDK. If not, see <http://www.gnu.org/licenses/>.
 */

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
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
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



