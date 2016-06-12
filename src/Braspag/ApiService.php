<?php

/**
 * Braspag PHP SDK
 *
 * @link https://github.com/JotJunior/BraspagPhpSdk for the canonical source repository
 * @copyright Copyright (c) 2016 JotJunior
 *
 * This file is part of Braspag-PHP-SDK.
 *
 * Braspag PHP SDK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Braspag-PHP-SDK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Braspag-PHP-SDK. If not, see <http://www.gnu.org/licenses/>.
 */

namespace Braspag;

use Braspag\Model;
use Braspag\Lib\Hydrator;
use Braspag\Lib\Util;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client as HttpClient;

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

    /**
     * @var HttpClient
     */
    protected $http;

    /**
     * ApiService constructor.
     * @param array $options
     */
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
     * @param Model\Sale $sale
     * @return Model\Sale
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

        } catch (RequestException $e) {
            $sale->setMessages(\json_decode($e->getResponse()->getBody()->getContents()));
        }

        return $sale;
    }

    /**
     * Captures a pre-authorized payment
     * @param string $paymentId
     * @param Model\CaptureRequest $captureRequest
     * @return mixed
     */
    public function capture($paymentId, Model\CaptureRequest $captureRequest)
    {

        if (!$paymentId) {
            throw new \InvalidArgumentException('$paymentId é obrigatório');
        }

        $uri = $this->config['apiUri'] . \sprintf('/sales/%s/capture', $paymentId);
        if ($captureRequest) {
            $uri .= '?' . \http_build_query($captureRequest->toArray());
        }

        $captureResponse = new Model\CaptureResponse();

        try {
            $response = $this->http()->request('PUT', $uri, [
                'headers' => $this->headers
            ]);

            $result = \json_decode($response->getBody()->getContents(), true);


            Hydrator::hydrate($captureResponse, $result);

        } catch (RequestException $e) {
            $captureResponse->setMessages(\json_decode($e->getResponse()->getBody()->getContents(), true));
        }

        return $captureResponse;
    }

    /**
     * Void a payment
     * @param string $paymentId
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
     * @param string $paymentId
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

    protected function http()
    {
        if (!$this->http) {
            $this->http = new HttpClient();
        }
        return $this->http;
    }


}
