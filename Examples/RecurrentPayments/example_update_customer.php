<?php
header('Content-Type: text/html; charset=utf-8');

include($_SERVER['DOCUMENT_ROOT']."/src/BraspagApiIncludes.php");

$recurrentPaymentId = $_GET['recurrentPaymentId'];
$customer = new BraspagCustomer();
$customer->name = "Thrall";
$customer->email = "goel@frostwolf.clan.br";
$customer->birthDate = "1850-01-15";

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

$recurrentApi = new RecurrentApiServices();
$result = $recurrentApi->updateCustomer($recurrentPaymentId, $customer);

if($result == 200){
    /*
     * In this case, you made a succesful call to API and receive HTTP Status OK in response
     */
    BraspagUtils::debug($sale,"Update Response Succesful!");     
} elseif(is_array($result)){
    /*
     * In this case, you made a Bad Request and receive a collection with all errors
     */
    BraspagUtils::debug($result,"Bad Request:");
} else{    
    /*
     * In this case, you received other error, such as Forbidden or Unauthorized
     */
    BraspagUtils::debug($result,"HTTP Status Code:"); 
}

?>