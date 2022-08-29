<?php

require_once 'HTTP/Request2.php';
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
    public function AuthenticateUser($username,$password){
        try
        {
            $client = new Client();
            $headers = [
                'Accept' => 'application/json',
                'Cookie' => 'ARRAffinity=1588c513ce0d7e96e46731a6ab7dba784fc5a56e16a4c0cdd4089ceb7c2fc0f9; ARRAffinitySameSite=1588c513ce0d7e96e46731a6ab7dba784fc5a56e16a4c0cdd4089ceb7c2fc0f9'
            ];
            $request = new Request('GET', $this -> BASE_URI.$this -> APPLICATION_URI.'login?username='.$username.'&password='. $password, $headers);
            $res = $client->sendAsync($request)->wait();
            $result = $res->getBody();
            $decoded = json_decode($result);
            return $decoded;                
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }
    }

    public function AddCompanyDetails($key, $applicationId)
    {
        /*try
        {
            CompanyDetails companyDetails = new CompanyDetails()
            {
                businessName = "business Name",
                businessTaxId = "businessTaxId",
                city = "city",
                entityType = "entityType",
                zipCode = "zipCode"
            };
            var client = new RestClient(BASE_URI + APPLICATION_URI + "add-company-details/" + applicationId + "");

            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            var body = JsonConvert.SerializeObject(companyDetails);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function AddPrimaryApplicantDetails($key, $applicationId)
    {
        /*try
        {
            PrimaryApplicantDetails primaryApplicantDetails = new PrimaryApplicantDetails()
            {
                applicationId = applicationId,
                driversLicense = new DriversLicense()
                {
                    name = "simon",
                    address = "address",
                    cardNumber = "92883783838",
                    city = "city",
                    dateOfBirth = new DateTime(),
                    expiryDate = new DateTime(),
                    image = "image",
                    issuingState = "state"
                },
                email = "simon@cuce.co.au",
                isManuallyAdded = false,
                isPrimary = true,
                miscellaneousData = new MiscellaneousData()
                {
                    est5d = "",
                    pariatur_2 = "",
                    Ute1 = ""
                },
                mobile = "9999999999",
                name = "simon"

            };
            var client = new RestClient(BASE_URI + APPLICATION_URI + "add-primary-applicant-details/" + applicationId + "");

            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            var body = JsonConvert.SerializeObject(primaryApplicantDetails);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function GetAllBanks($key)
    {
       /* BankDetail bankDetail = new BankDetail();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-all-banks");
            var request = new RestRequest();
            request.Method = Method.Get;
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            bankDetail = JsonConvert.DeserializeObject<BankDetail>(response.Content);
            return bankDetail;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function SetPrimaryBankAccount($key,$applicationId)
    {
        /*try
        {
            SelectBankRequest selectBankRequest = new SelectBankRequest()
            {
                accountHolder = "accountHolder",
                accountId = "accountId",
                accountNumber = "accountNumber",
                accountType = "accountType",
                archived =false,
                available = "",
                balance = "73",
                bsb = "bsb",
                enabled = true,
                id = "",
                name = "name",
                selected = true,
                slug = "slug",
            };
            var client = new RestClient(BASE_URI + APPLICATION_URI + "set-primary-bank/" + applicationId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key);
            request.Method = Method.Post;
            var body = JsonConvert.SerializeObject(selectBankRequest);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function GetContracts($key, $applicationId)
    {
        /*ContractDocumentResponse contracts = new ContractDocumentResponse();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-contracts/" + applicationId + "");
            var request = new RestRequest();
            request.Method = Method.Get;
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            RestResponse response = client.Execute(request);
            Console.WriteLine(Environment.NewLine + response.Content);
            contracts = JsonConvert.DeserializeObject<ContractDocumentResponse>(response.Content);
            return contracts;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function GetRequiredDocuments($key, $applicationId)
    {
       /* RequiredDocumentResponse requiredDocumentResponse = new RequiredDocumentResponse();
        try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "get-required-documents/" + applicationId + "?skip=0&take=2147483647");
            var request = new RestRequest();
            request.Method = Method.Get;
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            Console.WriteLine(Environment.NewLine + response.Content);
            requiredDocumentResponse = JsonConvert.DeserializeObject<RequiredDocumentResponse>(response.Content);
            return requiredDocumentResponse;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function SignContracts($key, $applicationId, $applicantId)
    {
       /* try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "sign-contract/" + applicationId + "/" + applicantId + "");
            var request = new RestRequest();
            request.AddHeader("Content-Type", "application/json");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            request.Method = Method.Post;

            ContractSign contractSign = new ContractSign()
            {
                ipAddress = "",
                mimeType = "",
                secondaryApplicant = true,
                signature = "",
                signature2 = ""
            };
            var body = JsonConvert.SerializeObject(contractSign);
            request.AddParameter("application/json", body, ParameterType.RequestBody);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
    public function SubmitRequiredDocuments($key, $applicationId)
    {
       /* try
        {
            var client = new RestClient(BASE_URI + APPLICATION_URI + "submit-required-document/" + applicationId + "?fileType=eiusmod dolore&fileName=eiusmod dolore&details=eiusmod dolore");
            var filePath = "";
            var request = new RestRequest();
            request.AddHeader("Content-Type", "multipart/form-data");
            request.AddHeader("Accept", "application/json");
            request.AddHeader("Authorization", "Bearer " + key + "");
            request.Method = Method.Post;
            request.AddFile("fileData", filePath);
            RestResponse response = client.Execute(request);
            Console.WriteLine(response.Content);
            return true;
        }
        catch (RequestException $e)
        {
            $response =  $this->StatusCodeHandling($e);
            return $response;
        }*/
    }
}
?>