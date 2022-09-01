<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
  
class CalculationService
{
    private $BASE_URI = "https://apidemo.plexe.co/";
    private $APPLICATION_URI ="api/Calculation/";

    function StatusCodeHandling($e)
    {
        if ($e -> getResponse() -> getStatusCode() == '400')
        {
            return 'BAD REQUEST';
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

    public function CalculateLOCSlider($key, $applicationId)
    {
        try
        {                
            $client = new Client();
            $headers = [
              'Content-Type' => 'application/json',
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $body = '{
              "amount": 34
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'application-loc-calculation-slider?applicationId='.$applicationId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            $result = $res->getBody();
            $decoded = json_decode($result);
            return $decoded;
        }
        catch (RequestException $e)
        {
            return 'BAD_REQUEST';
        }
    }

    public function ApplicationLocCalculation($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Content-Type' => 'application/json',
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $body = '{
              "amount": 23,
              "percentOfIncome": 22,
              "terms": 6,
              "fixedRepaymentCalculation": true
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'application-loc-calculation?applicationId='.$applicationId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            $result = $res->getBody();
            $decoded = json_decode($result);
            return $decoded;

        }
        catch (RequestException $e)
        {
            return 'BAD_REQUEST';
        }
    }
}
?>