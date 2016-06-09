PHP SDK para [Braspag](http://www.braspag.com.br) API
=====================================================

## Descrição
SDK para facilitar o uso da API Braspag. 

Este projeto foi criado a partir de um fork do [projeto original](https://github.com/Braspag/BraspagApiPhpSdk), 
porém como as mudanças foram muito significativas, resolvi criar um 
novo projeto. 

## Configuração
Adicione "jotjunior/braspag-php-sdk": "dev-master" no seu composer.json.

## Exemplos

# Venda Simplificada

```php
<?php

use Braspag\ApiServices;
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

$service = new ApiServices();
$result = $service->createSale($sale);
```

