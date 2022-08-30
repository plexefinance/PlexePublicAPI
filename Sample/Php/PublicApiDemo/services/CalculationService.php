<?php

require_once 'HTTP/Request2.php';
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
              "amount": 85354485.92348841
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'application-loc-calculation-slider?applicationId='.$applicationId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            echo $res->getBody();
            return $res->getBody();
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
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
              "amount": 18041353.02463527,
              "percentOfIncome": -67586202.88244557,
              "terms": -45408789,
              "fixedRepaymentCalculation": true
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'application-loc-calculation?applicationId='.$applicationId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            echo $res->getBody();

        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }
}
?>