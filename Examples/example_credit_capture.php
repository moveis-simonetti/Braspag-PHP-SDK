<?php
header('Content-Type: text/html; charset=utf-8');

include($_SERVER['DOCUMENT_ROOT']."/src/BraspagApiIncludes.php");

$paymentId = $_GET['paymentId'];
$captureRequest = new BraspagCaptureRequest();

$captureRequest->amount = 1500;

$api = new BraspagApiServices();
$result = $api->capture($paymentId, $captureRequest);

if(is_a($result, 'BraspagCaptureResponse')){
    /*
     * In this case, you made a succesful call to API and receive a CaptureResponse object in response
     */
      BraspagUtils::debug($sale,"Capture Response Succesful!");     
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