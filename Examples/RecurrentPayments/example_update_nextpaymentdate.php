<?php
header('Content-Type: text/html; charset=utf-8');

include($_SERVER['DOCUMENT_ROOT']."/src/BraspagApiIncludes.php");

$recurrentPaymentId = $_GET['recurrentPaymentId'];

$recurrentApi = new RecurrentApiServices();
$result = $recurrentApi->updateNextPaymentDate($recurrentPaymentId, '2020-08-10');

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