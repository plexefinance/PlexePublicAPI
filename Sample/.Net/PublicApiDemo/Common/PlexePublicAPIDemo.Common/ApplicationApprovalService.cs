using Newtonsoft.Json;
using PlexePublicAPIDemo.Common.Model;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace PlexePublicAPIDemo.Common
{
    public class ApplicationApprovalService
    {
        private readonly string BASE_URI = "https://apidemo.plexe.co/";
        private readonly string APPLICATION_URI = "api/ApplicationApproval/";

        public bool AddCompanyDetails(string key, string applicationId)
        {
            try
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
            catch (Exception ex)
            {
                return false;
            }
        }
        public bool AddPrimaryApplicantDetails(string key, string applicationId)
        {
            try
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
            catch (Exception ex)
            {
                return false;
            }
        }
        public BankDetail GetAllBanks(string key)
        {
            BankDetail bankDetail = new BankDetail();
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public bool SetPrimaryBankAccount(string key,string applicationId)
        {
            try
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
            catch (Exception ex)
            {
                return false;
            }
        }
        public ContractDocumentResponse GetContracts(string key, string applicationId)
        {
            ContractDocumentResponse contracts = new ContractDocumentResponse();
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public RequiredDocumentResponse GetRequiredDocuments(string key, string applicationId)
        {
            RequiredDocumentResponse requiredDocumentResponse = new RequiredDocumentResponse();
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public bool SignContracts(string key, string applicationId, string applicantId)
        {
            try
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
            catch (Exception ex)
            {
                return false;
            }
        }
        public bool SubmitRequiredDocuments(string key, string applicationId)
        {
            try
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
            catch (Exception ex)
            {
                return false;
            }
        }
    }
}
