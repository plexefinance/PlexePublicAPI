using Newtonsoft.Json;
using PlexePublicAPIDemo.Common;
using PlexePublicAPIDemo.Common.Model;
using System;

namespace PlexePublicAPIDemo.ScenarioThree
{
    class Program
    {
        static void Main(string[] args)
        {
            StartProcess();
            Console.ReadLine();
        }

        private static void StartProcess()
        {
            LoanService loanService = new LoanService();

            Console.WriteLine("WELCOME TO PLEXE API DEMO !!!!");

            // Step 1: LOGIN
            Console.WriteLine("Step 1: LOGIN !!!!");
            UserData userData = Login();
            var key = userData.Token;

            var customerId = LoadCustomerId();
            var loanId = LoadLoanId();

            // Step 2: GetCustomerLoans
            Console.WriteLine("Step 2: GetCustomerLoans !!!!");
            GetCustomerLoans(loanService, key, customerId);

            // Step 3: GetLoan
            Console.WriteLine("Step 3: GetLoan !!!!");
            GetLoan(loanService, key, loanId);

            // Step 4: GetTransactions
            Console.WriteLine("Step 4: GetTransactions !!!!");
            GetTransactions(loanService, key, loanId);

            // Step 5: GetWithdrawals
            Console.WriteLine("Step 5: GetWithdrawals !!!!");
            GetWithdrawals(loanService, key, loanId);

            // Step 6: GetTotalBalance
            Console.WriteLine("Step 6: GetTotalBalance !!!!");
            GetTotalBalance(loanService, key, loanId);

            Console.ReadLine();
        }

        private static void GetLoan(LoanService loanService, string key, string loanId)
        {
            Console.WriteLine("CALL GET - LOAN API.THIS WILL RETURN THE LOAN DETAILS ON A LOAN ID!!!");
            var customerLoan = loanService.GetLoan(key, loanId);
            if (customerLoan == null)
            {
                Console.WriteLine("ERROR IN GET - LOAN!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET - LOAN FETCHED SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(customerLoan));
        }

        private static void GetTransactions(LoanService loanService, string key, string loanId)
        {
            Console.WriteLine("CALL GET-TRANSACTIONS API.THIS WILL RETURN ALL TRANSACTIONS!!!");
            var transactions = loanService.GetTransactions(key, loanId);
            if (!(transactions != null))
            {
                Console.WriteLine("ERROR IN GET-TRANSACTIONS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-TRANSACTIONS SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(transactions));
        }

        private static void GetWithdrawals(LoanService loanService, string key, string loanId)
        {
            Console.WriteLine("CALL GET-WITHDRAWALS API TO GET ALL WITHDRAWALS!!!");
            var withdrawals = loanService.GetWithdrawals(key, loanId);
            if (!(withdrawals != null && withdrawals.TotalCount > 0))
            {
                Console.WriteLine("ERROR IN GET-WITHDRAWALS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-WITHDRAWALS SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(withdrawals));
        }

        private static void GetTotalBalance(LoanService loanService, string key, string loanId)
        {
            Console.WriteLine("CALL GET-TOTAL - BALANCE TO GET THE BALANCE!!!");
            var totalBalance = loanService.GetTotalBalance(key, loanId);
            if (totalBalance == null)
            {
                Console.WriteLine("ERROR IN GET-TOTAL - BALANCE!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-TOTAL - BALANCE SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(totalBalance));
        }

        private static void GetCustomerLoans(LoanService loanService, string key, string customerId)
        {
            Console.WriteLine("CALL GET-CUSTOMER - LOANS API.THIS WILL RETURN THE LIST OF LOANS FOR A CUSTOMER !!!");
            var customerLoans = loanService.GetCustomerLoans(key, customerId);
            if (!(customerLoans != null && customerLoans.Count > 0))
            {
                Console.WriteLine("ERROR IN GET-CUSTOMER - LOANS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-CUSTOMER - LOANS FETCHED SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(customerLoans));
        }

        private static string LoadCustomerId()
        {
            Console.WriteLine("ENTER CUSTOMER ID !!!");
            var customerId = Console.ReadLine();

            if (customerId == "")
            {
                Console.WriteLine("NEED CUSTOMER ID!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }

            return customerId;
        }

        private static UserData Login()
        {

            Console.WriteLine("WRITE YOUR USERNAME:");
            var username = Console.ReadLine();

            Console.WriteLine("ENTER YOUR PASSWORD:");
            var password = Console.ReadLine();

            AuthenticationService authenticationService = new AuthenticationService();
            WebhookService webhookService = new WebhookService();
            UserData userdata = authenticationService.AuthenticateUser(username, password);

            if (userdata == null)
            {
                Console.WriteLine("LOGIN INCORRECT !!!");
                Console.WriteLine("EXIT !!!");
                Console.ReadLine();
                Environment.Exit(0);
            }
            Console.WriteLine("YOU HAVE SUCCESSFULLY LOGGED IN !!!");
            return userdata;
        }

        private static string LoadLoanId()
        {
            Console.WriteLine("ENTER LOAN ID !!!");
            var loanId = Console.ReadLine();

            if (loanId == "")
            {
                Console.WriteLine("NEED LOAN ID!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }

            return loanId;
        }
    }
}
