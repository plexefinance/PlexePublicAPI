<?php

require_once 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
  
class ApplicationApprovalService
{
    private $BASE_URI = "https://apidemo.plexe.co/";
    private $APPLICATION_URI ="api/ApplicationApproval/";

    function StatusCodeHandling($e)
    {
        if ($e -> getResponse() -> getStatusCode() == '400')
        {
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

    public function AddCompanyDetails($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Content-Type' => 'application/json',
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '. $key
            ];
            $body = '{
              "businessName": "business Name",
              "entityType": "entityType",
              "zipCode": "zipCode",
              "businessTaxId": "businessTaxId",
              "city": "city"
            }';
            $request = new Request('POST', $this -> BASE_URI.$this -> APPLICATION_URI.'add-company-details/' . $applicationId, $headers, $body);
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
    public function AddPrimaryApplicantDetails($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. $key
            ];
            $body = '{
              "name": "primary-applicant-17092022-3",
              "driversLicense": {
                "issuingState": "navada",
                "cardNumber": "922772829",
                "expiryDate": "1946-01-06T16:12:26.068Z",
                "name": "primary-applicant-17092022-3",
                "address": "street elm road 22",
                "dateOfBirth": "1951-05-24T16:44:32.648Z",
                "city": "ohio"
              },
              "email": "primary-applicant-17092022-3@plexe.co.au",
              "mobile": "8888888888",
              "miscellaneousData": {
                "ssn": "82828299292"
              }
            }';

            
            $request = new Request('POST', $this -> BASE_URI.$this -> APPLICATION_URI.'add-primary-applicant-details/' . $applicationId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            $result = $res -> getBody();
            $decoded = json_decode($result);
            return $decoded;
        }
        catch (RequestException $e)
        {
            return 'BAD_REQUEST';
        }
    }
    public function GetAllBanks($key,$applicationId)
    {
        try
        {            
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '. $key
            ];
            $request = new Request('GET', $this -> BASE_URI.$this -> APPLICATION_URI.'get-all-banks/'.$applicationId, $headers);
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
    public function SetPrimaryBankAccount($key,$applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '. $key
            ];
            $body = '{
                "accountHolder":"accountHolder",
                "accountId":"accountId",
                "accountNumber":"accountNumber",
                "accountType":"accountType",
                "archived":false,
                "available":"",
                "balance":"73",
                "bsb":"bsb",
                "enabled":true,
                "id":"",
                "name":"name",
                "selected":true,
                "slug":"slug",
            }';
            $request = new Request('POST', $this -> BASE_URI.$this -> APPLICATION_URI.'set-primary-bank/' . $applicationId, $headers, $body);
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
    public function GetContracts($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '. $key
            ];
            $request = new Request('GET', $this -> BASE_URI.$this -> APPLICATION_URI.'get-contracts/' . $applicationId, $headers);
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

    public function GetContractDetails($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '. $key
            ];
            $request = new Request('GET', $this -> BASE_URI.$this -> APPLICATION_URI.'get-contract-details/' . $applicationId, $headers);
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
    public function GetRequiredDocuments($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-required-documents/'.$applicationId.'?skip=0&take=2147483647', $headers);
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
    public function SignContracts($key, $applicationId, $applicantId)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $body = '{
              "ipAddress": "",
              "signature": "",
              "signature2": "",
              "mimeType": "",
              "secondaryApplicant": true
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'sign-contract/'.$applicationId.'/'.$applicantId, $headers, $body);
            $res = $client->sendAsync($request)->wait();
            $result = $res->getBody();
            $decoded = json_decode($result);
            print_r($decoded);
            return $decoded;
        }
        catch (RequestException $e)
        {
            return 'BAD_REQUEST';
        }
    }
    public function SubmitRequiredDocuments($key, $applicationId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Content-Type' => 'multipart/form-data',
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $options = [
              'multipart' => [
                [
                  'name' => 'fileData',
                  'contents' => '',
                  'filename' => '/path/to/file',
                  'headers'  => [
                    'Content-Type' => '<Content-type header>'
                  ]
                ]
            ]];
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'submit-required-document/'.$applicationId.'?fileType=eiusmod dolore&fileName=eiusmod dolore&details=eiusmod dolore', $headers);
            $res = $client->sendAsync($request, $options)->wait();
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