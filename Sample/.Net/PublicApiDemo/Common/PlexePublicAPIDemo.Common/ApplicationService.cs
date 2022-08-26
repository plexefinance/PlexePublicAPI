using Newtonsoft.Json;
using PlexePublicAPIDemo.Common.Model;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace PlexePublicAPIDemo.Common
{
    public class ApplicationService
    {
        private readonly string BASE_URI = "https://apidemo.plexe.co/";
        private readonly string APPLICATION_URI = "api/Application/";

        public ApplicationResponse GetApplicationById(string key, string applicationId)
        {
            ApplicationResponse applicationResponse = new ApplicationResponse();
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "get-application/" + applicationId + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");
                RestResponse response = client.Execute(request);
                Console.WriteLine(Environment.NewLine + response.Content);
                applicationResponse = JsonConvert.DeserializeObject<ApplicationResponse>(response.Content);
                return applicationResponse;
            }
            catch (Exception ex)
            {
                return null;

            }

        }
        public ApplicationOffer GetApplicationOffer(string key, string applicationId)
        {
            ApplicationOffer applicationOffer = new ApplicationOffer();
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "application-offer/" + applicationId + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");
                RestResponse response = client.Execute(request);
                Console.WriteLine(Environment.NewLine + response.Content);
                applicationOffer = JsonConvert.DeserializeObject<ApplicationOffer>(response.Content);
                return applicationOffer;
            }
            catch (Exception ex)
            {
                return null;

            }

        }
        public ApplicationAndCustomerCreateResponse CreateCustomerAndApplication(string key)
        {
            ApplicationAndCustomerCreateResponse applicationAndCustomerCreateResponse = new ApplicationAndCustomerCreateResponse();
            applicationAndCustomerCreateResponse = null;
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "create-customer-and-application");
                var request = new RestRequest();
                request.Method = Method.Post;
                request.AddHeader("Content-Type", "application/json");
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");


                CustomerAndApplication customerAndApplication = new CustomerAndApplication();
                List<Acknowledgement> acknowledgements = new List<Acknowledgement>();
                acknowledgements.Add(new Acknowledgement()
                {
                    acknowledgementCode = "acknowledgementCode1",
                    acknowledged = true,
                });
                acknowledgements.Add(new Acknowledgement()
                {
                    acknowledgementCode = "acknowledgementCode2",
                    acknowledged = true,
                });
                customerAndApplication.application = new Application()
                {
                    abn = "",
                    acknowledgements = acknowledgements,
                    acnNumber = "",
                    acnType = "user",
                    businessName = "test business 15",
                    email = "testcustomer15@plexe.com.au",
                    extraInformation = new ExtraInformation()
                    {
                        test = ""
                    },
                    firstName = "Simon",
                    lastName = "test15",
                    mobile = "9999999999",
                    partnerId = null,
                    tradingName = "tradingName15"
                };
                customerAndApplication.customer = new Customer()
                {
                    email = "testcustomer15@plexe.com.auit",
                    firstName = "test",
                    lastName = "test",
                    mobileNumber = "999999999",
                    businessName = "test15",
                    tradingName = "test15",
                    password = "DelightWAY12!@",
                    type = "user",
                    dateOfBirth = new DateTime(1975, 3, 7, 15, 0, 0, 41),
                    hasLoggedIn = true
                };

                var body = JsonConvert.SerializeObject(customerAndApplication);
                request.AddParameter("application/json", body, ParameterType.RequestBody);
                RestResponse response = client.Execute(request);
                Console.WriteLine(response.Content);
                Console.WriteLine(Environment.NewLine + response.Content);
                applicationAndCustomerCreateResponse = JsonConvert.DeserializeObject<ApplicationAndCustomerCreateResponse>(response.Content);
                return applicationAndCustomerCreateResponse;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
        public bool AddOrUpdateBankingData(string key, string applicationId, string bankName)
        {
            ApplicationAndCustomerCreateResponse applicationAndCustomerCreateResponse = new ApplicationAndCustomerCreateResponse();
            applicationAndCustomerCreateResponse = null;
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "add-or-update-banking-data/" + applicationId + "?bankName=" + bankName + "");
                var request = new RestRequest();
                request.AddHeader("Content-Type", "application/json");
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key);
                request.Method = Method.Post;

                BankingDataRequest bankingDataRequest = new BankingDataRequest();

                List<BankAccountRequest> bankAccountRequests = new List<BankAccountRequest>();
                List<TransactionRequest> transactionRequests1 = new List<TransactionRequest>();
                transactionRequests1.Add(new TransactionRequest()
                {
                    Amount = 34,
                    Balance = 33,
                    Catgeory = "category",
                    Date = new DateTime(),
                    Tags = new List<Tag>(),
                    Text = "text",
                    Type = "type",
                });
                transactionRequests1.Add(new TransactionRequest()
                {
                    Amount = 34,
                    Balance = 33,
                    Catgeory = "category",
                    Date = new DateTime(),
                    Tags = new List<Tag>(),
                    Text = "text",
                    Type = "type",
                });
                bankAccountRequests.Add(new BankAccountRequest()
                {
                    AvailableBalance = "23",
                    CurrentBalance = "33",
                    AccountNumber = "56456456456",
                    Bsb = "bsb",
                    AccountType = "AccountType",
                    Bank = "Bank",
                    Transactions = transactionRequests1,
                    AccountName = "AccountName",
                    AccountHolder = "AccountHolder",

                });

                bankingDataRequest.BankAccounts = bankAccountRequests;

                var body = JsonConvert.SerializeObject(bankingDataRequest);
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
        public bool ProcessApplication(string key, string applicationId, string currentProcess)
        {
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "process-application/" + applicationId + "?currentProcess=" + currentProcess + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");
                RestResponse response = client.Execute(request);
                Console.WriteLine(Environment.NewLine + response.Content);
                return true;
            }
            catch (Exception ex)
            {
                return false;
            }
        }
        public ApplicationStatusResponse ApplicationStatus(string key, string applicationId)
        {
            ApplicationStatusResponse applicationStatus = new ApplicationStatusResponse();
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "application-status/" + applicationId + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");
                RestResponse response = client.Execute(request);
                Console.WriteLine(Environment.NewLine + response.Content);
                applicationStatus = JsonConvert.DeserializeObject<ApplicationStatusResponse>(response.Content);
                return applicationStatus;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
    }
}

