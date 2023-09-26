<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class AzamPaymentService
{
    protected $apiBaseUrl;
    protected $clientId;
    protected $clientSecret;
    protected $httpClient;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.azampay.base_url');
        $this->clientId = config('services.azampay.client_id');
        $this->clientSecret = config('services.azampay.client_secret_key');
        $this->httpClient = new Client();
    }

    public function token()
    {
        $payload = [
            "appName" => "fixpay",
            "clientId" => $this->clientId,
            "clientSecret" => $this->clientSecret,
        ];

        $headers = [
            'Content-Type' => 'application/json',
            'Authorization' => 'Basic ' . base64_encode($this->clientId . ':' . $this->clientSecret),
        ];
        try{
            $response = $this->httpClient->post("$this->apiBaseUrl/AppRegistration/GenerateToken", $payload);
            $responseData = json_decode($response->getBody(), true);
            // dd($responseData['data']['accessToken']);
            return $responseData['data']['accessToken'];

        }catch(\Exception $exception){
            Log::error('AzamPay API Error: ' . $exception->getMessage());
            throw $exception;
        }

    }

    public function processPayment($order)
    {
        $accessToken = $this->token();

        $payload = [
            'accountNumber' => $order['phone_number'],
            'amount' => $order['grand_total'],
            'currency' => 'TZS',
            'externalId' => $order['order_number'],
            'provider' => 'Airtel',
        ];
        // dd($payload);

        $headers = [
            'Authorization' => 'Bearer ' . $accessToken,
            'Content-Type' => 'application/json',
        ];
        try {
            $response = Http::post($this->apiBaseUrl . '/azampay/mno/checkout', [
                'headers' => $headers,
                'body' => $payload,
                'X-API-Key' => 'API-KEY',
            ]);


            $paymentResponse = json_decode($response->body(), true);

            return $paymentResponse;
        } catch (RequestException $e) {
            // Handle API request errors
            Log::error('AzamPay API Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
