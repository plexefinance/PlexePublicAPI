using Newtonsoft.Json;
using PlexePublicAPIDemo.Common;
using PlexePublicAPIDemo.Common.Model;
using System;

namespace PlexePublicAPIDemo.ScenarioOne
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
            ApplicationService applicationService = new ApplicationService();
            WebhookService webhookService = new WebhookService();

            Console.WriteLine("WELCOME TO PLEXE API DEMO !!!!");

            // Step 1: LOGIN
            Console.WriteLine("Step 1: LOGIN!!!!");
            UserData userData = Login();
            var key = userData.Token;

            // STEP 2: CreateCustomerAndApplication
            Console.WriteLine("STEP 2: CreateCustomerAndApplication !!!!");
            var applicationAndCustomerCreateResponse = CreateCustomerAndApplication(applicationService, key);

            // Load application Id and customer Id
            var applicationId = applicationAndCustomerCreateResponse.ApplicationId;
            var customerId = applicationAndCustomerCreateResponse.CustomerId;

            Console.WriteLine("Application Id is : " + applicationId);
            Console.WriteLine("Customer Id is : " + customerId);
            // STEP 3: AddOrUpdateBankingData
            Console.WriteLine("STEP 3: AddOrUpdateBankingData !!!!");
            AddOrUpdateBankingData(applicationService, key, applicationId);

            // STEP 4: ProcessApplication
            Console.WriteLine("STEP 4: ProcessApplication !!!!");
            ProcessApplication(applicationService, key, applicationId);

            // STEP 5 : GetApplicationStatusOrRegisterWebhook
            Console.WriteLine("STEP 5: GetApplicationStatusOrRegisterWebhook !!!!");
            GetApplicationStatusOrRegisterWebhook(applicationService, webhookService, key, applicationId, customerId);

            // STEP 6 GetApplicationById
            Console.WriteLine("STEP 6: GetApplicationById !!!!");
            ApplicationResponse applicationResponse = GetApplicationById(applicationService, key, applicationId);

            // STEP 7: GetApplicationOffer
            Console.WriteLine("STEP 7: GetApplicationOffer !!!!");
            GetApplicationOffer(applicationService, key, applicationResponse, applicationId);

            Console.ReadLine();
        }

        private static UserData Login()
        {

            Console.WriteLine("WRITE YOUR USERNAME:");
            var username = Console.ReadLine();

            Console.WriteLine("ENTER YOUR PASSWORD:");
            var password = Console.ReadLine();

            AuthenticationService authenticationService = new AuthenticationService();

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

        private static ApplicationAndCustomerCreateResponse CreateCustomerAndApplication(ApplicationService applicationService, string key)
        {
            Console.WriteLine("CREATING CUSTOMER AND APPLICATION API !!!");
            ApplicationAndCustomerCreateResponse applicationAndCustomerCreateResponse = applicationService.CreateCustomerAndApplication(key);
            if (applicationAndCustomerCreateResponse == null)
            {
                Console.WriteLine("ERROR CREATING CUSTOMER AND APPLICATION !!!");
                Console.WriteLine(Environment.NewLine + JsonConvert.SerializeObject(applicationAndCustomerCreateResponse));
                Environment.Exit(0);
            }
            Console.WriteLine("CUSTOMER AND APPLICATION CREATED SUCCESSFULLY !!!");
            return applicationAndCustomerCreateResponse;
        }

        private static void AddOrUpdateBankingData(ApplicationService applicationService, string key, string applicationId)
        {
            Console.WriteLine("ADDING OR UPDATING BANK DATA !!!");
            var addOrUpdateBankingDataSuccess = applicationService.AddOrUpdateBankingData(key, applicationId, "Bank Test");

            if (!addOrUpdateBankingDataSuccess)
            {
                Console.WriteLine("ERROR ADDING OR UPDATING BANK DATA !!!");
                Environment.Exit(0);
            }

            Console.WriteLine("ADDING OR UPDATING BANK DATA SUCCESSFULL !!!");
        }

        private static void ProcessApplication(ApplicationService applicationService, string key, string applicationId)
        {
            Console.WriteLine("APPLICATION READY TO PROCESS:");
            var currentProcessSuccesss = applicationService.ProcessApplication(key, applicationId);

            if (!currentProcessSuccesss)
            {
                Console.WriteLine("ERROR PROCESSING APPLICATION !!!");
                Environment.Exit(0);
            }

            Console.WriteLine("APPLICATION PROCESSED SUCCESSFULLY!!!");
        }
        private static ApplicationResponse GetApplicationById(ApplicationService applicationService, string key, string applicationId)
        {
            Console.WriteLine("GET APPLICATION BY APPLICATIONID:");
            ApplicationResponse applicationResponse = applicationService.GetApplicationById(key, applicationId);
            if (applicationResponse == null)
            {
                Console.WriteLine("ERROR FETCHING APPLICATION!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("APPLICATION PROCESSED SUCCESSFULLY!!!");
            return applicationResponse;
        }

        private static void GetApplicationStatusOrRegisterWebhook(ApplicationService applicationService, WebhookService webhookService, string key, string applicationId, string customerId)
        {
            Console.WriteLine("SELECT BELOW OPTION");
            Console.WriteLine("1: GET APPLICATION STATUS");
            Console.WriteLine("2: REGISTER FOR WEBHOOK");
            var selectedOption = Console.ReadLine();
            if (selectedOption == "1")
            {
                var applicationStatus = applicationService.ApplicationStatus(key, applicationId);
                if (applicationStatus == null)
                {
                    Console.WriteLine("ERROR FETCHING APPLICATION STATUS!!!");
                    Environment.Exit(0);
                }
                Console.WriteLine("APPLICATION STATUS BELOW:");
                Console.WriteLine(Environment.NewLine);
                Console.WriteLine(applicationStatus);
            }
            else if (selectedOption == "2")
            {

                Console.WriteLine("REGISTERING WEBHOOK");
                Console.WriteLine("ENTER PARTNERID");
                var partnerId = Console.ReadLine();

                var webhookRegistrationDone = webhookService.RegisterWebhook(key, partnerId, customerId);
                if (!webhookRegistrationDone)
                {
                    Console.WriteLine("ERROR REGISTERING WEBHOOK!!!");
                    Environment.Exit(0);
                }
                Console.WriteLine("WEBHOOK REGISTERED!!!");
            }
            else
            {
                Console.WriteLine("TRY AGAIN !!!");
            }
        }

        private static void GetApplicationOffer(ApplicationService applicationService, string key, ApplicationResponse applicationResponse, string applicationId)
        {
            if (applicationResponse.StatusName.ToLower().Trim() == "offerready")
            {
                ApplicationOffer applicationOffer = applicationService.GetApplicationOffer(key, applicationId);
                if (applicationOffer == null)
                {
                    Console.WriteLine("ERROR FETCHING APPLICATION OFFER!!!");
                    Environment.Exit(0);
                }
                Console.WriteLine("FETCHING APPLICATION OFFER SUCCESSFUL!!!");
                Console.WriteLine(Environment.NewLine + JsonConvert.SerializeObject(applicationOffer));
            }
            else {
                Console.WriteLine("APPLICATION OFFER IS NOT READY!!!");
                Environment.Exit(0);
            }
        }
    }
}
