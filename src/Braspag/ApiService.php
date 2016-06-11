<?php

namespace Braspag;

use Braspag\Model;
use Braspag\Lib\Hydrator;
use Braspag\Lib\Util;

class ApiService
{

    use Util;

    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected $headers;

    function __construct($options = [])
    {

        $this->config = include __DIR__ . '/../../config/braspag.config.php';

        if (\is_array($options)) {
            $this->config = \array_merge($this->config, $options);
        }

        $this->headers = array(
            'MerchantId' => $this->config['merchantId'],
            'MerchantKey' => $this->config['merchantKey'],
            'Content-Type' => 'application/json;charset=UTF-8'
        );
    }

    /**
     * @param Sale $sale
     * @return Sale
     * @throws \Exception
     */
    public function authorize(Model\Sale $sale)
    {
        $arrSale = $this->capitalizeRequestData($sale->toArray());

        try {
            $response = $this->http()->request('POST', $this->config['apiUri'] . '/sales/', [
                'body' => \json_encode($arrSale),
                'headers' => $this->headers
            ]);

            $result = \json_decode($response->getBody()->getContents(), true);

            Hydrator::hydrate($sale, $result);


            if ($response->getStatusCode() === Model\HttpStatus::Created) {
                return $sale;
            } elseif ($response->getStatusCode() === Model\HttpStatus::BadRequest) {
                return BraspagUtils::getBadRequestErros($result);
            }

            return $result;

        } catch (\Exception $e) {
            return false;
        }
    }

    /**
     * Captures a pre-authorized payment
     * @param GUID $paymentId
     * @param CaptureRequest $captureRequest
     * @return mixed
     */
    public function capture($paymentId, Model\CaptureRequest $captureRequest)
    {

        $uri = $this->config['apiUri'] . \sprintf('/sales/%s/capture', $paymentId);

        if ($captureRequest) {
            $uri .= '?' . \http_build_query($captureRequest->toArray());
        }

        $response = $this->http()->request('PUT', $uri, [
            'headers' => $this->headers
        ]);

        $result = $response->getBody()->getMetadata();

        if ($response->getStatusCode() === Model\HttpStatus::Ok) {
            $captureResponse = new Model\CaptureResponse($result);
            return $captureResponse;
        } elseif ($response->getStatusCode() === Model\HttpStatus::BadRequest) {
            return BraspagUtils::getBadRequestErros($result);
        }
        return $response->code;
    }

    /**
     * Void a payment
     * @param GUID $paymentId
     * @param int $amount
     * @return mixed
     */
    public function void($paymentId, $amount)
    {

        $uri = $this->config['apiUri'] . \sprintf('/sales/%s/capture', $paymentId);

        if ($amount) {
            $uri .= sprintf('?amount=%f', (float)$amount);
        }

        $response = $this->http()->request('PUT', $uri, [
            'headers' => $this->headers
        ]);

        $result = $response->getBody()->getMetadata();

        if ($response->getStatusCode() === Model\HttpStatus::Ok) {
            $voidResponse = new Model\VoidResponse($result);
            return $voidResponse;
        } elseif ($response->code == Model\HttpStatus::BadRequest) {
            return BraspagUtils::getBadRequestErros($result);
        }

        return $response->getStatusCode();
    }

    /**
     * Gets a sale
     * @param GUID $paymentId
     * @return mixed
     */
    public function get($paymentId)
    {

        try {
            $uri = $this->config['apiQueryUri'] . \sprintf('/sales/%s', $paymentId);

            $response = $this->http()->request('GET', $uri, [
                'headers' => $this->headers
            ]);

            $result = \json_decode($response->getBody()->getContents(), true);

            if ($response->getStatusCode() === Model\HttpStatus::Ok) {
                $sale = new Model\Sale($result);
                return $sale;
            } elseif ($response->getStatusCode() == Model\HttpStatus::BadRequest) {
                return BraspagUtils::getBadRequestErros($response->body);
            }

        } catch (\Exception $e) {

        }

    }

}
