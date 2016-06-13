Importante
==========
Este projeto ainda está em fase inicial. Nem todas as funcionalidades 
foram testadas ainda. Sempre que uma funcionalidade estiver OK, será 
adicionada aos exemplos logo abaixo.

PHP SDK para [Braspag](http://www.braspag.com.br) API
=====================================================

## Descrição
SDK para facilitar o uso da API Braspag. 

Este projeto foi criado a partir de um fork do [projeto original](https://github.com/Braspag/BraspagApiPhpSdk), 
porém, como as mudanças foram muito significativas, resolvi criar um 
novo projeto. 

## Instalação
Adicione "jotjunior/braspag-php-sdk": "dev-master" no seu composer.json.
```json
{
  "require": {
    "php": ">=5.5",
    "jotjunior/braspag-php-sdk": "dev-master"
  }
}
```

## Configuração
Por padrão, o arquivo de configuração da aplicação fica no diretório 
config, na raiz do repositório. 

Para reescrever qualquer atributo da configuração, basta injetar os 
dados, como um Array, no momento de instanciar o objeto.

Exemplo:
```php
<?php
$service = new ApiService([
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
    'authenticate' => true
]);

```

## Exemplos
Para realizar seus testes, crie suas credenciais no [Sandbox](https://cadastrosandbox.braspag.com.br) da Braspag.

### Vendas

#### Venda Simplificada
```php
<?php

require_once("vendor/autoload.php");

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


} else {
    $messages = $result->getMessages();
    // mensagens de alerta e erros
}
```

#### Venda Completa
```php
<?php

require_once("vendor/autoload.php");

use Braspag\ApiService;
use Braspag\Model\Sale\Sale;
use Braspag\Model\Payment\Payment;

$orderId = date('YmdHi');

$data = [
    'merchantOrderId' => 2016060900,
    'customer' => [
        'name' => 'Comprador de Testes',
        'identity' => '11225468954',
        'identityType' => 'CPF',
        'email' => 'compradordetestes@braspag.com.br',
        'birthDate' => '1991-01-02',
        'address' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ],
        'deliveryAddress' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ]
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'currency' => 'BRL',
        'country' => 'BRA',
        'provider' => 'Simulado',
        'serviceTaxAmount' => 0,
        'installments' => 1,
        'interest' => Payment::InterestByMerchant,
        'capture' => true,
        'authenticate' => false,
        'softDescriptor' => 'tst',
        'creditCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'saveCard' => false,
            'brand' => 'Visa',
        ],
        'extraDataCollection' => [
            [
                'name' => 'NomeDoCampo',
                'value' => '1234567'
            ]
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

} else {
    $messages = $result->getMessages();
    // mensagens de alerta e erros
}
```

#### Venda com autenticação
```php
<?php

require_once("vendor/autoload.php");

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
        'authenticate' => true,
        'returnUrl' => 'http//www.braspag.com.br/',
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

} else {

    $messages = $result->getMessages();
    // mensagens de alerta e erros

}
```

#### Venda com Análise de Fraude
```php
<?php

require_once("vendor/autoload.php");

use Braspag\ApiService;
use Braspag\Model\Sale\Sale;
use Braspag\Model\Payment\Payment;

$orderId = date('YmdHi');

$data = [
    'merchantOrderId' => 2016060900,
    'customer' => [
        'name' => 'Comprador de Testes',
        'identity' => '11225468954',
        'identityType' => 'CPF',
        'email' => 'compradordetestes@braspag.com.br',
        'birthDate' => '1991-01-02',
        'address' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ],
        'deliveryAddress' => [
            'street' => 'Av. Marechal Câmara',
            'number' => 160,
            'complement' => 'Sala 934',
            'zipCode' => '20020-080',
            'district' => 'Centro',
            'city' => 'Rio de Janeiro',
            'state' => 'RJ',
            'country' => 'BRA',
        ]
    ],
    'payment' => [
        'type' => 'CreditCard',
        'amount' => 100,
        'currency' => 'BRL',
        'country' => 'BRA',
        'provider' => 'Simulado',
        'serviceTaxAmount' => 0,
        'installments' => 1,
        'interest' => Payment::InterestByMerchant,
        'capture' => false,
        'authenticate' => false,
        'softDescriptor' => 'tst',
        'creditCard' => [
            'cardNumber' => '4532117080573700',
            'holder' => 'Test T S Testando',
            'expirationDate' => '12/2021',
            'securityCode' => '000',
            'saveCard' => false,
            'brand' => 'Visa',
        ],
        'extraDataCollection' => [
            [
                'name' => 'NomeDoCampo',
                'value' => '1234567'
            ]
        ],
        'fraudAnalysis' => [
            'sequence' => 'AnalyseFirst',
            'sequenceCriteria' => 'Always',
            'fingerprintId' => '074c1ee676ed4998ab66491013c565e2',
            'captureOnLowRisk' => false,
            'voidOnHighRisk' => true,
            'browser' => [
                'cookieAccepted' => false,
                'email' => 'compradorteste@live.com',
                'ipAddress' => '200.242.30.253',
                'type' => 'Chrome',
            ],
            'cart' => [
                'isGift' => false,
                'returnsAccepted' => true,
                'items' => [
                    [
                        'giftCategory' => 'undefined',
                        'hostHedge' => 'Off',
                        'nonSensicalHedge' => 'Off',
                        'obscenitiesHedge' => 'Off',
                        'phoneHedge' => 'Off',
                        'name' => 'ItemTeste',
                        'quantity' => 1,
                        'sku' => '201411170235134521346',
                        'unitPrice' => 123,
                        'risk' => 'High',
                        'timeHedge' => 'Normal',
                        'type' => 'AdultContent',
                        'velocityHedge' => 'High',
                        'passenger' => [
                            'email' => 'compradorteste@live.com',
                            'identity' => '11225468954',
                            'name' => 'Comprador Accepted',
                            'rating' => 'Adult',
                            'phone' => '987654321',
                            'status' => 'Accepted'
                        ]
                    ]
                ]
            ],
            'merchantDefinedFields' => [
                [
                    'id' => '95',
                    'value' => 'Eu defini isto'
                ]
            ],
            'shipping' => [
                'addressee' => 'Sr. Comprador Teste',
                'method' => 'LowCost',
                'phone' => '987654321'
            ],
            'travel' => [
                'departureTime' => '2016-06-11',
                'journeyType' => 'Ida',
                'route' => 'MAO-RJO',
                'legs' => [
                    [
                        'destination' => 'GYN',
                        'origin' => 'VCP'
                    ]
                ]
            ]

        ]

    ]

];

$sale = new Sale($data);

$service = new ApiService([
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
]);

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
    
    // Resultado da analise de fraude
    $fraudAnalysis = $result->getPayment()->getFraudAnalysis()->getReplyData();

    // Array do pedido completo
    $saleArray = $result->toArray();

    print_r($result);

} else {
    $messages = $result->getMessages();
    // mensagens de alerta e erros

}
```

### Captura
```php
<?php

require_once("vendor/autoload.php");

use Braspag\ApiService;
use Braspag\Model\Sale\CaptureRequest;

$service = new ApiService([
    'merchantId' => '00000000-0000-0000-0000-000000000000',
    'merchantKey' => '0000000000000000000000000000000000000000',
]);

$paymentId = '00000000-0000-0000-0000-000000000000';
$captureRequest = new CaptureRequest([
    'amount' => 15099,
    'serviceTaxAmount' => 0
]);

// retorna Braspag\Model\CaptureResponse
$capture = $service->capture($paymentId, $captureRequest);

if ($capture->isValid()) {
    // status da transacao
    $status = $capture->getStatus();
} else {
    $messages = $capture->getMessages();
}
```
