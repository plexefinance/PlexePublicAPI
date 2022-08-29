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
        /*CalculateLOCSliderResponse calculateLOCSliderResponse = new CalculateLOCSliderResponse();
        try
        {                
            var client = new RestClient(BASE_URI + APPLICATION_URI + "application-loc-calculation-slider?applicationId=" + applicationId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            SliderRequest sliderRequest = new SliderRequest()
            {
                Amount = 23
            };
            var body = JsonConvert.SerializeObject(sliderRequest);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            calculateLOCSliderResponse = JsonConvert.DeserializeObject<CalculateLOCSliderResponse>(response.Content);
            Console.WriteLine(response.Content);
            return calculateLOCSliderResponse;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }

    public function ApplicationLocCalculation($key, $applicationId)
    {
        //ApplicationLocCalculation applicationLocCalculationResponse = new ApplicationLocCalculation();
        /*try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "application-loc-calculation?applicationId=" + applicationId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            CalculationRequest calculationRequest = new CalculationRequest()
            {
                Amount = 23,
                FixedRepaymentCalculation = true,
                PercentOfIncome = 2,
                Terms = 22
            };
            var body = JsonConvert.SerializeObject(calculationRequest);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            applicationLocCalculationResponse = JsonConvert.DeserializeObject<ApplicationLocCalculation>(response.Content);
            return applicationLocCalculationResponse;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
}
?>