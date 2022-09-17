<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class ApplicationService
{
    private $BASE_URI = "https://apidemo.plexe.co/";
    private $APPLICATION_URI = "api/Application/";

    function StatusCodeHandling($e)
    {
        if ($e -> getResponse() -> getStatusCode() == '400')
        {
            //$response = json_decode($e -> getResponse()->getBody(true)->getContents());
            //return $response;
            return 'BAD REQUEST';
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

    public function GetApplicationById($key, $applicationId)
    {
        try
        {
            $client = new Client();

            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];

            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-application/'.$applicationId, $headers);
            
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

    public function CreateCustomerAndApplication($key)
    {
        try
        {
            $client = new Client();
            $guid = bin2hex(openssl_random_pseudo_bytes(16));
                    
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $body = '{
                "application": {
                    "businessName": "New Application 24105 Apiuser17092022-1 <TBA>, apiuser17092022-1@plexe.co.au, 8888888888, Sep 17, 2022",
                    "customerId": "",
                    "partnerId": "",
                    "extraInformation": {
                    "years": "2-5 years", "zipcode": "82772", "industry": "Rice"
                    }
                },
                "customer": {
                    "email": "apiuser17092022-1@plexe.co.au", 
	                "firstName": "Apiuser17092022-1", 
	                "lastName": "<TBA>",
	                "mobileNumber": "8888888888",
	                "password": "DelightWAY12!@"
                }
            }';                   
            
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'create-customer-and-application',$headers, $body);
            
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
    
    public function GetApplicationOffer($key, $applicationId)
    {
            
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'application-offer/'.$applicationId.'?force=false', $headers);
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
        
    public function AddOrUpdateBankingData($key, $applicationId, $bankName)
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
                  "bankAccounts": [
                    {
                      "bank": "Bank One",
                      "availableBalance": "23333",
                      "accountNumber": "82722892920",
                      "routing": "827282",
                      "accountName": "Bank One Test",
                      "currentBalance": "3455",
                      "accountType": "Current",
                      "transactions": [
                        {
                          "amount": 34,
                          "date": "1962-03-15T21:07:50.047Z",
                          "text": "Transaction One",
                          "isCredit": true,
                          "balance": 345
                        },
                        {
                          "amount": 23,
                          "date": "2020-08-03T08:07:00.597Z",
                          "text": "Transaction Two",
                          "isCredit": true,
                          "balance": 356
                        }
                      ]
                    },
                    {
                      "bank": "Bank Two",
                      "availableBalance": "34553",
                      "accountNumber": "9774789329",
                      "routing": "983738",
                      "accountName": "Bank Two Test",
                      "currentBalance": "8373",
                      "accountType": "Current",
                      "transactions": [
                        {
                          "amount": 34,
                          "date": "1962-03-15T21:07:50.047Z",
                          "text": "Transaction One",
                          "isCredit": true,
                          "balance": 234
                        },
                        {
                          "amount": 67,
                          "date": "2020-08-03T08:07:00.597Z",
                          "text": "Transaction Two",
                          "isCredit": true,
                          "balance": 456
                        }
                      ]
                    }
                  ]
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'add-or-update-banking-data/'.$applicationId.'?bankName='.$bankName, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            $result = $res->getBody();
            $decoded = json_decode($result);
            return array($res->getStatusCode(), $decoded);
        }
        catch (RequestException $e)
        {            
            return 'BAD_REQUEST';
        }
    }

    public function ProcessApplication($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'process-application/'.$applicationId, $headers);
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

    public function ApplicationStatus($key, $applicationId)
    {
            
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET',  $this->BASE_URI.$this->APPLICATION_URI.'application-status/'.$applicationId, $headers);
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