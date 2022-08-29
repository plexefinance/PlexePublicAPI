<?php

require_once 'HTTP/Request2.php';
require_once 'vendor/autoload.php';
  
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
  
class LoanService
{
    /*private $BASE_URI = "https://apidemo.plexe.co/";
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
        LoansResponse customerLoans = new LoansResponse();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-customer-loans/" + customerId + "");
            var request = new RestRequest();
            request.Method = Method.Get;
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            customerLoans = JsonConvert.DeserializeObject<LoansResponse>(response.Content);
            return customerLoans;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }
    public function GetLoan($key, $loanId)
    {
        LoanResponse loan = new LoanResponse();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-loan/" + loanId + "");
            var request = new RestRequest();
                
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            request.Method = Method.Get;
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            loan = JsonConvert.DeserializeObject<LoanResponse>(response.Content);
            return loan;
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
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-transactions/" + loanId + "?skip=0&take=2147483647");
            var request = new RestRequest();
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            request.Method = Method.Get;
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            loanTransactions = JsonConvert.DeserializeObject<LoanTransaction>(response.Content);
            return loanTransactions;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }
    public function GetWithdrawals($key, $loanId)
    {
        PagedListAdvanceProjectionResponse withdrawals = new PagedListAdvanceProjectionResponse();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-withdrawals/" + loanId + "?skip=0&take=2147483647");
            var request = new RestRequest();
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            request.Method = Method.Get;
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            withdrawals = JsonConvert.DeserializeObject<PagedListAdvanceProjectionResponse>(response.Content);
            return withdrawals;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }
    public function GetTotalBalance($key, $loanId)
    {
        LoanBalanceResponse loanBalanceResponse = new LoanBalanceResponse();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-total-balance/" + loanId + "?skip=0&take=2147483647");
            var request = new RestRequest();
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            request.Method = Method.Get;
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            loanBalanceResponse = JsonConvert.DeserializeObject<LoanBalanceResponse>(response.Content);
            return loanBalanceResponse;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }
    public function MakeWithdrawalLineOfCredit($key, $loanId)
    {
        BankDetails bankDetails = new BankDetails();
        try
        {
            MakeWithdrawalLineOfCredit makeWithdrawalLineOfCredit = new MakeWithdrawalLineOfCredit()
            {
                calculation = new Calculation() {
                    amount = 65,
                    fixedRepaymentCalculation = false,
                    percentOfIncome = 67,
                    terms = 32
                }
            };
            var client = new RestClient(BASE_URI + APPLICATION_URI + "make-withdrawal-line-of-credit/" + loanId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            var body = JsonConvert.SerializeObject(makeWithdrawalLineOfCredit);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            bankDetails = JsonConvert.DeserializeObject<BankDetails>(response.Content);
            Console.WriteLine(response.Content);
            return bankDetails;
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
            var client = new RestClient(BASE_URI + APPLICATION_URI + "resend-withdrawal-otp/" + loanId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return JsonConvert.DeserializeObject<ResendWithdrawalOtpResponse>(response.Content);
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
            ConfirmWithdrawalLineOfCreditModel confirmWithdrawalLineOfCreditModel = new ConfirmWithdrawalLineOfCreditModel()
            {
                advanceRate =55,
                terms =44,
                amount =44,
                commission =new Commission() { 
                    drawFee=33,
                    trailing=4,
                    upfrontFee=5
                },
                dateUTC = new DateTime(),
                fixedRepayment = 4,
                fixedRepaymentFee =5,
                nextRepaymentDate = new DateTime(),
                otp = Otp,
                percentageOfIncome =43,
                priority =true,
                totalRepaymentAmount =3,
                weeklyPayment=4
            };
            var client = new RestClient(BASE_URI + APPLICATION_URI + "confirm-withdrawal-line-of-credit/" + loanId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            var body = JsonConvert.SerializeObject(confirmWithdrawalLineOfCreditModel);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }  */
}
?>