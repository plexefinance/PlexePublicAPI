<?php

require_once 'HTTP/Request2.php';
require_once 'vendor/autoload.php';
  
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
  
class WebhookService
{
    /*private $BASE_URI = "https://apidemo.plexe.co/";
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
            var client = new RestClient(BASE_URI + WEBHOOK_URI + "register?partnerId=" + partnerId + "&customerId=" + customerId + "");
            var request = new RestRequest();
            request.Method = Method.Post;
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");


            WebhookSubscription webhookSubscription = new WebhookSubscription()
            {
                id ="",
                isActive =true,
                secret ="",
                webhooks = new List<string>() { "", "", "" },
                webhookUri = ""
            };


            var body = JsonConvert.SerializeObject(webhookSubscription);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            Console.WriteLine(Environment.NewLine + response.Content);                
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }*/
}
?>