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

use Braspag\Exceptions\UnauthorizedException;
use Braspag\Lib\Hydrator;
use Braspag\Lib\Util;
use Braspag\Model\Sale\CaptureRequest;
use Braspag\Model\Sale\CaptureResponse;
use Braspag\Model\Sale\Sale;
use Braspag\Model\Sale\VoidResponse;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\RequestException;

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
        if (isset($options['httpClient'])) {
            $this->http = $options['httpClient'];
            unset($options['httpClient']);
        }

        $this->config = include __DIR__ . '/../../config/braspag.config.php';

        if (is_array($options)) {
            $this->config = array_merge($this->config, $options);
        }

        $this->headers = [
            'MerchantId' => $this->config['merchantId'],
            'MerchantKey' => $this->config['merchantKey'],
            'Content-Type' => 'application/json;charset=UTF-8',
        ];
    }

    /**
     * @param Sale $sale
     * @return Sale
     * @throws \Exception
     */
    public function authorize(Sale $sale)
    {
        $arrSale = $this->capitalizeRequestData($sale->toArray());

        try {
            $result = $this->makeRequest('POST', $this->config['apiUri'] . '/sales/', $arrSale);
            Hydrator::hydrate($sale, $result);
        } catch (RequestException $e) {
            if ($e->getResponse() === null) {
                throw $e;
            }

            $sale->setMessages(json_decode($e->getResponse()->getBody()->getContents()));
        }

        return $sale;
    }

    /**
     * Captures a pre-authorized payment
     * @param string $paymentId
     * @param CaptureRequest $captureRequest
     * @return mixed
     */
    public function capture($paymentId, CaptureRequest $captureRequest)
    {
        if (!$paymentId) {
            throw new \InvalidArgumentException('$paymentId é obrigatório');
        }

        $uri = $this->config['apiUri'] . sprintf('/sales/%s/capture', $paymentId);
        if ($captureRequest) {
            $uri .= '?' . http_build_query($captureRequest->toArray());
        }

        $captureResponse = new CaptureResponse();
        try {
            $result = $this->makeRequest('PUT', $uri);
            Hydrator::hydrate($captureResponse, $result);
        } catch (RequestException $e) {
            if ($e->getResponse() === null) {
                throw $e;
            }

            $captureResponse->setMessages(json_decode($e->getResponse()->getBody()->getContents(), true));
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
        $uri = $this->config['apiUri'] . sprintf('/sales/%s/void', $paymentId);

        if ($amount) {
            $uri .= sprintf('?amount=%f', (float)$amount);
        }

        $voidResponse = new VoidResponse();
        try {
            $result = $this->makeRequest('PUT', $uri);
            Hydrator::hydrate($voidResponse, $result);
        } catch (RequestException $e) {
            if ($e->getResponse() === null) {
                throw $e;
            }

            $voidResponse->setMessages(json_decode($e->getResponse()->getBody()->getContents(), true));
        }

        return $voidResponse;
    }

    /**
     * Gets a sale
     * @param string $paymentId
     * @return mixed
     */
    public function get($paymentId)
    {
        try {
            $uri = $this->config['apiQueryUri'] . sprintf('/sales/%s', $paymentId);

            $result = $this->makeRequest('GET', $uri);

            $sale = new Sale($result);
        } catch (RequestException $e) {
            if ($e->getResponse() === null) {
                throw $e;
            }

            $sale = new Sale();
            $sale->setMessages(json_decode($e->getResponse()->getBody()->getContents(), true));
        }

        return $sale;
    }

    /**
     * @return HttpClient
     */
    protected function http()
    {
        if (!$this->http) {
            $this->http = new HttpClient();
        }

        return $this->http;
    }

    private function makeRequest(string $method, string $url, array $body = [])
    {
        try {
            $response = $this->http()->request($method, $url, [
                'body' => json_encode($body),
                'headers' => $this->headers,
            ]);

            return json_decode($response->getBody()->getContents(), true);
        } catch (RequestException $e) {
            if ($e->getCode() == 401) {
                throw new UnauthorizedException("Falha ao se autenticar na Braspag", $e->getCode(), $e);
            }

            throw $e;
        }
    }
}
