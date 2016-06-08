<?php
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

$payment = new BraspagEletronicTransferPayment();
$payment->amount = 15900;
$payment->provider = "Bradesco";
$payment->returnUrl = "http://www.braspag.com.br";

$sale->payment = $payment;

$api = new BraspagApiServices();
$result = $api->createSale($sale);
			
if(is_a($result, 'BraspagSale')){
    /*
     * In this case, you made a succesful call to API and receive a Sale object in response
     */            
    echo "<li><a href=\"example_all_get.php?paymentId={$sale->payment->paymentId}\" target=\"_blank\">Get EletronicTransfer</a></li></ul>";
    
    BraspagUtils::debug($sale,"Eletronic Transfer Success!");  
    
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