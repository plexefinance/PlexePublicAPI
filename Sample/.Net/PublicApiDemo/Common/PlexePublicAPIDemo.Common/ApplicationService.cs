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
        private readonly string BASE_URI = "https://apidemo.plexe.co/"; // "https://apidemo.plexe.co/";
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
                customerAndApplication.application = new Application()
                {
                    BusinessName = "New Application 24105 Apiuser16092022-1 <TBA>, apiuser16092022-1@plexe.co.au, 8888888888, Sep 16, 2022",
                    ExtraInformation = new ExtraInformation()
                    {
                        Years = "2-5 years",
                        Zipcode = "82772", 
                        Industry = "Rice"
                    },
                    PartnerId = null,
                };
                customerAndApplication.customer = new Customer()
                {
                    Email = "apiuser16092022-1@plexe.co.au",
                    FirstName = "apiuser16092022-1",
                    LastName = "lastname",
                    MobileNumber = "999999999",
                    Password = "DelightWAY12!@"
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
                List<TransactionRequest> transactionRequests2 = new List<TransactionRequest>();


                transactionRequests1.Add(new TransactionRequest()
                {
                    Amount = 7363,
                    Balance = 345,
                    Date = new DateTime(),
                    Text = "Transaction One",
                    IsCredit = true,
                });
                transactionRequests1.Add(new TransactionRequest()
                {
                    Amount = 4574,
                    Balance = 345,
                    Date = new DateTime(),
                    Text = "Transaction Two",
                    IsCredit = true,
                });
                transactionRequests2.Add(new TransactionRequest()
                {
                    Amount = 7363,
                    Balance = 345,
                    Date = new DateTime(),
                    Text = "Transaction One",
                    IsCredit = true,
                });
                transactionRequests2.Add(new TransactionRequest()
                {
                    Amount = 4574,
                    Balance = 345,
                    Date = new DateTime(),
                    Text = "Transaction Two",
                    IsCredit = true,
                });
                bankAccountRequests.Add(new BankAccountRequest()
                {
                    AvailableBalance = "23333",
                    CurrentBalance = "3455",
                    AccountNumber = "82722892920",
                    Routing = "827282",
                    AccountType = "Current",
                    Bank = "Bank One",
                    Transactions = transactionRequests1,
                    AccountName = "Bank One Test"
                });

                bankAccountRequests.Add(new BankAccountRequest()
                {
                    AvailableBalance = "23333",
                    CurrentBalance = "3455",
                    AccountNumber = "82722892920",
                    Routing = "827282",
                    AccountType = "Current",
                    Bank = "Bank Two",
                    Transactions = transactionRequests2,
                    AccountName = "Bank Two Test"
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
        public bool ProcessApplication(string key, string applicationId)
        {
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "process-application/" + applicationId);
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
        public string ApplicationStatus(string key, string applicationId)
        {
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "application-status/" + applicationId + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");
                RestResponse response = client.Execute(request);
                Console.WriteLine(Environment.NewLine + response.Content);
                return response.Content;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
    }
}

