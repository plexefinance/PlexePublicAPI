<?php
require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;

class ApplicationService
{
    private $BASE_URI = "http://localhost:5002/";
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
                    "acnNumber" : "",
                    "acnType ": "user",
                    "firstName": "Simon",
                    "lastName": "test15",
                    "mobile": "9999999999",
                    "email": "testcustomer15@plexe.com.au",
                    "businessName": "test business 15",
                    "tradingName": "tradingName15",
                    "partnerId": null,
                    "extraInformation": {
                        test : ""
                    },
                    acknowledgements : [
                        {
                            acknowledgementCode : "acknowledgementCode1",
                            acknowledged : true,
                        },
                        {
                            acknowledgementCode : "acknowledgementCode2",
                            acknowledged : true,
                    }]
                },
                "customer": {
                    "email": "testcustomer15@plexe.com.auit",
                    "firstName": "test",
                    "lastName": "test",
                    "mobileNumber": "9999999999",
                    "businessName": "test15",
                    "tradingName": "test15",
                    "password": "DelightWAY12!@",
                    "type": "user",
                    "parentId": null,
                    "dateOfBirth": "1971-11-18T07:26:53.873Z",
                    "hasLoggedIn": true
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
                    "availableBalance": "23",
                    "currentBalance": "33",
                    "accountNumber": "voluptate ea",
                    "bsb": "bsb",
                    "accountType": "AccountType",
                    "bank": "exercitation of",
                    "id": "dolor dolore",
                    "transactions": [
                    {
                        "amount": 23,
                        "balance": 22,
                        "date": "1964-07-30T19:09:15.450Z",
                        "text": "text",
                        "type": "type",
                        "tags": [
                        {
                            "value": ""
                        },
                        {
                            "value": ""
                        }
                        ],
                        "catgeory": "category"
                    },
                    {
                        "amount": 35,
                        "balance": 67,
                        "date": "1973-02-03T14:40:03.128Z",
                        "text": "text",
                        "type": "type",
                        "tags": [
                        {
                            "value": ""
                        },
                        {
                            "value": ""
                        }
                        ],
                        "catgeory": "category"
                    }
                    ],
                    "accountName": "AccountName",
                    "accountHolder": "AccountHolder"
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

    public function ProcessApplication($key, $applicationId, $currentProcess)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'process-application/'.$applicationId.'?currentProcess='.$currentProcess, $headers);
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