<?php

namespace Braspag;

use Braspag\Model\CaptureResponse;
use Braspag\Model\Sale;
use Braspag\Model\HttpStatus;
use Braspag\Model\CreditCardPayment;
use Braspag\Model\BoletoPayment;
use Braspag\Model\DebitCardPayment;
use Braspag\Model\EletronicTransferPayment;
use Braspag\Model\CaptureRequest;
use Braspag\Lib\Hydrator;
use GuzzleHttp\Client as HttpClient;

class ApiService
{

    /**
     * @var HttpClient
     */
    protected $http;

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
    public function createSale(Sale $sale)
    {
        $arrSale = $this->capitalizeRequestData($sale->toArray());

        try {
            $response = $this->http()->request('POST', $this->config['apiUri'] . '/sales/', [
                'body' => \json_encode($arrSale),
                'headers' => $this->headers
            ]);

            $result = \json_decode($response->getBody()->getContents(), true);

            Hydrator::hydrate($sale, $result);


            if ($response->getStatusCode() === HttpStatus::Created) {
                return $sale;
            } elseif ($response->getStatusCode() === HttpStatus::BadRequest) {
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
    public function capture($paymentId, CaptureRequest $captureRequest)
    {

        $uri = $this->config['apiUri'] . \sprintf('/sales/%s/capture', $paymentId);

        if ($captureRequest) {
            $uri .= '?' . \http_build_query($captureRequest->toArray());
        }

        $response = $this->http()->request('PUT', $uri, [
            'headers' => $this->headers
        ]);

        $result = $response->getBody()->getMetadata();

        if ($response->getStatusCode() === HttpStatus::Ok) {
            $captureResponse = new CaptureResponse($result);
            return $captureResponse;
        } elseif ($response->getStatusCode() === BraspagHttpStatus::BadRequest) {
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

        if ($response->getStatusCode() === HttpStatus::Ok) {
            $voidResponse = new VoidResponse($result);
            return $voidResponse;
        } elseif ($response->code == BraspagHttpStatus::BadRequest) {
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

        $uri = $this->config['apiQueryUri'] . \sprintf('/sales/%s', $paymentId);

        $response = $this->http()->request('GET', $uri, [
            'headers' => $this->headers
        ]);

        $result = $response->getBody()->getMetadata();

        if ($response->getStatusCode() === HttpStatus::Ok) {
            $sale = new Sale($result);
            return $sale;
        } elseif ($response->code == BraspagHttpStatus::BadRequest) {
            return BraspagUtils::getBadRequestErros($response->body);
        }
        return $response->code;
    }

    protected function http()
    {
        if (!$this->http) {
            $this->http = new HttpClient();
        }
        return $this->http;
    }

    static protected function capitalizeRequestData($data)
    {
        foreach ($data as $key => &$value) {
            if (\is_array($value)) {
                $value = self::capitalizeRequestData($value);
            }
            $data[\ucfirst($key)] = $value;
            if (ctype_lower($key{0})) {
                unset($data[$key]);
            }
        }
        return $data;
    }

}
