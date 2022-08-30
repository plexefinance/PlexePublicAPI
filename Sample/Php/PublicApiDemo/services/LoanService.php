<?php

require_once 'HTTP/Request2.php';
require_once 'vendor/autoload.php';
  
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
  
class LoanService
{
    private $BASE_URI = "https://apidemo.plexe.co/";
    private $APPLICATION_URI ="api/Loan/";

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

    public function GetCustomerLoans($key, $customerId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-customer-loans/'.$customerId, $headers);
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
    public function GetLoan($key, $loanId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-loan/'.$loanId, $headers);
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
    public function GetTransactions($key, $loanId)
    {
        LoanTransaction loanTransactions = new LoanTransaction();
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-transactions/'.$loanId.'?skip=0&take=2147483647', $headers);
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
    public function GetWithdrawals($key, $loanId)
    {
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-withdrawals/'.$loanId.'?skip=0&take=2147483647', $headers);
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
    public function GetTotalBalance($key, $loanId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('GET', $this->BASE_URI.$this->APPLICATION_URI.'get-total-balance/'.$loanId, $headers);
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
    public function MakeWithdrawalLineOfCredit($key, $loanId)
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
              "calculation": {
                "amount": 85796499.59002653,
                "percentOfIncome": -61505291.60663152,
                "terms": 42126013,
                "fixedRepaymentCalculation": false
              }
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'make-withdrawal-line-of-credit/'.$loanId, $headers, $body);
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
    public function ResendWithdrawalOtp($key, $loanId)
    {
        try
        {
            $client = new Client();
            $headers = [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$key
            ];
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'resend-withdrawal-otp/'.$loanId, $headers);
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
    public function ConfirmWithdrawalLineOfCredit($key, $loanId, $Otp)
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
              "amount": 55087673.69903821,
              "priority": true,
              "percentageOfIncome": -38173445.44605397,
              "weeklyPayment": 24981594.539666712,
              "totalRepaymentAmount": 80012459.30422437,
              "nextRepaymentDate": "1944-09-19T23:32:28.472Z",
              "advanceRate": -34579787.9870168,
              "otp": ".$Otp.",
              "dateUTC": "2006-11-05T17:47:17.357Z",
              "commission": {
                "upfrontFee": 57705032.07244721,
                "trailing": 7608803.388788447,
                "drawFee": 11811609.115375355
              },
              "terms": 37293038,
              "fixedRepaymentFee": -60423280.766545594,
              "fixedRepayment": 46242054.91330761
            }';
            $request = new Request('POST', $this->BASE_URI.$this->APPLICATION_URI.'confirm-withdrawal-line-of-credit/'.$loanId, $headers, $body);
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
?>