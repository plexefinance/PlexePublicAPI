<?php

require_once 'HTTP/Request2.php';
require_once 'vendor/autoload.php';
  
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
  
class WebhookService
{
    private $BASE_URI = "https://apidemo.plexe.co/";
    private $APPLICATION_URI ="api/Webhook/";

    function StatusCodeHandling($e)
    {
        if ($e -> getResponse() -> getStatusCode() == '400')
        {
            $response = json_decode($e -> getResponse()->getBody(true)->getContents());
            return $response;
            //return 'BAD REQUEST';
            //$this->prepare_access_token();
        }
        else if ($e -> getResponse() -> getStatusCode() == '422')
        {
            $response = json_decode($e -> getResponse()->getBody(true)->getContents());
            return $response;
        }
        else if ($e -> getResponse() -> getStatusCode() == '500')
        {
            $response = json_decode($e ->getResponse()->getBody(true)->getContents());
            return $response;
        }
        else if ($e -> getResponse() -> getStatusCode() == '401')
        {
            $response = json_decode($e ->getResponse()->getBody(true)->getContents());
            return $response;
        }
        else if ($e->getResponse()->getStatusCode() == '403')
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
        else
        {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }
    }

    public function RegisterWebhook($key, $partnerId,$customerId)
    {
        try
        {   
            $client = new Client();
            $headers = [
              'Content-Type' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $body = '{
              "id": "bb1393df-4ac3-e796-7531-123a9a748c68",
              "webhookUri": "",
              "secret": "",
              "isActive": true,
              "webhooks": [
                "",
                ""
              ]
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'register?partnerId='.$partnerId.'&customerId='.$customerId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            echo $res->getBody();

            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }
}
$webhookService = new WebhookService();
?>