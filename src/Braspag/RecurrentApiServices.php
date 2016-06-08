<?php

/**
 * Provide services to manage recurrencies
 *
 * @version 1.0
 * @author pfernandes
 */
class RecurrentApiServices
{
    function __construct(){
        $this->headers = array(
                'MerchantId' => BraspagApiConfig::merchantId,
                'MerchantKey' => BraspagApiConfig::merchantKey
            );
    }

    /**
     * Updates the customer of one recurrent payment
     * @param mixed $recurrentId 
     * @param BraspagCustomer $customer 
     */
    public function updateCustomer($recurrentId, $customer){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/Customer"; 

        $request = json_encode($customer, JSON_UNESCAPED_UNICODE);
        
        $response = \Httpful\Request::put($uri)
            ->sendsJson()
            ->addHeaders($this->headers)
            ->body($request)            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }
    
    /**
     * Updates the EndDate of one recurrent payment
     * @param mixed $recurrentId 
     * @param $endDate 
     */    
    public function updateEndDate($recurrentId, $endDate){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/EndDate"; 
        
        $response = \Httpful\Request::put($uri)
            ->sendsJson()
            ->addHeaders($this->headers)
            ->body('"'.$endDate.'"')            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }

    /**
     * Updates the EndDate of one recurrent payment
     * @param mixed $recurrentId 
     * @param $day 
     */
    public function updateDay($recurrentId, $day){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/RecurrencyDay"; 

        $request = json_encode($day, JSON_UNESCAPED_UNICODE);
        
        $response = \Httpful\Request::put($uri)
            ->sendsJson()
            ->addHeaders($this->headers)
            ->body($request)            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }

    /**
     * Updates the EndDate of one recurrent payment
     * @param mixed $recurrentId 
     * @param $interval 
     */
    public function updateInterval($recurrentId, $interval){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/Interval"; 

        $request = json_encode($interval, JSON_UNESCAPED_UNICODE);
        
        $response = \Httpful\Request::put($uri)
            ->sendsJson()
            ->addHeaders($this->headers)
            ->body($request)            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }

    /**
     * Updates the number of installments of one recurrent payment
     * @param mixed $recurrentId 
     * @param int $installments 
     */
    public function updateInstallments($recurrentId, $installments){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/Installments"; 
        
        $response = \Httpful\Request::put($uri)
            ->addHeaders($this->headers)
            ->addHeader("content-type", "text/json")
            ->body($installments)            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }

    /**
     * Updates the next payment date of one recurrent payment
     * @param mixed $recurrentId 
     * @param string $date 
     */
    public function updateNextPaymentDate($recurrentId, $date){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/NextPaymentDate"; 
        
        $response = \Httpful\Request::put($uri)
            ->sendsJson()
            ->addHeaders($this->headers)
            ->body('"'.$date.'"')            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }

    /**
     * Updates the amount of one recurrent payment
     * @param mixed $recurrentId 
     * @param int $amount 
     */
    public function updateAmount($recurrentId, $amount){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/Amount"; 
        
        $response = \Httpful\Request::put($uri)
            ->addHeaders($this->headers)
            ->addHeader("content-type", "text/json")
            ->body($amount)            
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    }  
    
    /**
     * Deactivate one recurrent payment
     * @param mixed $recurrentId 
     */
    public function deactivate($recurrentId, $amount){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/Deactivate"; 
        
        $response = \Httpful\Request::put($uri)
            ->addHeaders($this->headers)
            ->addHeader("content-type", "text/json")         
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    } 
    
    /**
     * Deactivate one recurrent payment
     * @param mixed $recurrentId 
     */
    public function reactivate($recurrentId, $amount){
        $uri = BraspagApiConfig::apiUri . "RecurrentPayment/$recurrentId/Reactivate"; 
        
        $response = \Httpful\Request::put($uri)
            ->addHeaders($this->headers)
            ->addHeader("content-type", "text/json")         
            ->send();

        if($response->code == BraspagHttpStatus::BadRequest){
            return BraspagUtils::getBadRequestErros($response->body);
        }

        return $response->code;
    } 
}
