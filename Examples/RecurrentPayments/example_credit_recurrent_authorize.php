<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

include($_SERVER['DOCUMENT_ROOT']."/src/BraspagApiIncludes.php");

$sale = new BraspagSale();
$sale->merchantOrderId = '2014112703';

$customer = new BraspagCustomer();
$customer->name = "Comprador de Testes";
$customer->email = "compradordetestes@braspag.com.br";
$customer->birthDate = "1991-01-02";

$address = new BraspagAddress();
$address->city = "Rio de Janeiro";
$address->complement = "Sala 934";
$address->country = "BRA";
$address->district = "Centro";
$address->number = "160";
$address->state = "RJ";
$address->street = "Av. Marechal Câmara";
$address->zipCode = "20020-080";

$customer->address = $address;
$sale->customer = $customer;

$payment = new BraspagCreditCardPayment();
$payment->amount = 15900;
$payment->provider = "Simulado";

$payment->installments = 3;

$card = new BraspagCard();
$card->brand = "Visa";
$card->cardNumber = "4532117080573700";
$card->expirationDate = "12/2015";
$card->holder = "Test T S Testando";
$card->securityCode = "000";

$payment->creditCard = $card;

$recurrent = new BraspagRecurrentPayment();
$recurrent->authorizeNow = true;
$recurrent->endDate = "2020-08-01";
$recurrent->interval = "Monthly";

$payment->recurrentPayment = $recurrent;

$sale->payment = $payment;

$api = new BraspagApiServices();
$result = $api->createSale($sale);

if(is_a($result, 'BraspagSale')){
    /*
     * In this case, you made a succesful call to API and receive a Sale object in response
     */            
    echo "<li><a href=\"example_update_customer.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateCustomer</a></li></ul>";
    echo "<li><a href=\"example_update_installments.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateInstallments</a></li></ul>";
    echo "<li><a href=\"example_update_nextpaymentdate.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateNextPaymentDate</a></li></ul>";
    echo "<li><a href=\"example_update_amount.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateAmount</a></li></ul>";
    echo "<li><a href=\"example_update_endDate.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateEndDate</a></li></ul>";
    echo "<li><a href=\"example_update_day.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateDay</a></li></ul>";
    echo "<li><a href=\"example_update_interval.php?recurrentPaymentId={$sale->payment->recurrentPayment->recurrentPaymentId}\" target=\"_blank\">UpdateInterval</a></li></ul>";
      
    BraspagUtils::debug($sale,"Card Recurrent Success!");  
    
} elseif(is_array($result)){
    /*
     * In this case, you made a Bad Request and receive a collection with all errors
     */
    BraspagUtils::debug($result,"Bad Request Auth!");
} else{    
    /*
     * In this case, you received other error, such as Forbidden or Unauthorized
     */
    BraspagUtils::debug($result,"HTTP Status Code!");
}

?>