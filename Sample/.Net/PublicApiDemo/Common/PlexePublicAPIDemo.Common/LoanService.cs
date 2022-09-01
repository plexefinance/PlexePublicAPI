using Newtonsoft.Json;
using PlexePublicAPIDemo.Common.Model;
using RestSharp;
using System;
using System.Collections.Generic;
using System.Net;
using System.Text;

namespace PlexePublicAPIDemo.Common
{
    public class LoanService
    {
        private readonly string BASE_URI = "https://apidemo.plexe.co/";
        private readonly string APPLICATION_URI = "api/Loan/";

        public List<LoanResponse> GetCustomerLoans(string key, string customerId)
        {
            List<LoanResponse> customerLoans = new List<LoanResponse>();
            try
            {
                var client = new RestClient(BASE_URI + APPLICATION_URI + "get-customer-loans/" + customerId + "");
                var request = new RestRequest();
                request.Method = Method.Get;
                request.AddHeader("Accept", "application/json");
                request.AddHeader("Authorization", "Bearer " + key + "");
                RestResponse response = client.Execute(request);
                Console.WriteLine(Environment.NewLine + response.Content);
                customerLoans = JsonConvert.DeserializeObject<List<LoanResponse>>(response.Content);
                return customerLoans;
            }
            catch (Exception ex)
            {
                return null;
            }
        }
        public LoanResponse GetLoan(string key, string loanId)
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public LoanTransaction GetTransactions(string key, string loanId)
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public PagedListAdvanceProjectionResponse GetWithdrawals(string key, string loanId)
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public LoanBalanceResponse GetTotalBalance(string key, string loanId)
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public BankDetails MakeWithdrawalLineOfCredit(string key, string loanId)
        {
            BankDetails bankDetails = new BankDetails();
            try
            {
                MakeWithdrawalLineOfCredit makeWithdrawalLineOfCredit = new MakeWithdrawalLineOfCredit()
                {
                    calculation = new Calculation() {
                        Amount = 65,
                        FixedRepaymentCalculation = false,
                        PercentOfIncome = 67,
                        Terms = 32
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public ResendWithdrawalOtpResponse ResendWithdrawalOtp(string key, string loanId)
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
            catch (Exception ex)
            {
                return null;
            }
        }
        public bool ConfirmWithdrawalLineOfCredit(string key, string loanId, string Otp)
        {
            try
            {
                ConfirmWithdrawalLineOfCreditModel confirmWithdrawalLineOfCreditModel = new ConfirmWithdrawalLineOfCreditModel()
                {
                    AdvanceRate =55,
                    Terms =44,
                    Amount =44,
                    Commission =new Commission() { 
                     DrawFee=33,
                      Trailing=4,
                       UpfrontFee=5
                    },
                    DateUTC = new DateTime(),
                    FixedRepayment = 4,
                    FixedRepaymentFee =5,
                    NextRepaymentDate = new DateTime(),
                    Otp = Otp,
                    PercentageOfIncome =43,
                    Priority =true,
                    TotalRepaymentAmount =3,
                    WeeklyPayment=4
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
            catch (Exception ex)
            {
                return false;
            }
        }
    }    
}
