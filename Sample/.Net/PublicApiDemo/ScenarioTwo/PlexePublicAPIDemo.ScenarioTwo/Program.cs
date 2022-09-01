﻿using Newtonsoft.Json;
using PlexePublicAPIDemo.Common;
using PlexePublicAPIDemo.Common.Model;
using System;

namespace PlexePublicAPIDemo.ScenarioTwo
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
            AuthenticationService authenticationService = new AuthenticationService();
            WebhookService webhookService = new WebhookService();
            ApplicationService applicationService = new ApplicationService();
            ApplicationApprovalService applicationApprovalService = new ApplicationApprovalService();

            Console.WriteLine("WELCOME TO PLEXE API DEMO!!!!");

            // Step1: LOGIN
            UserDatas userData = Login();
            var key = userData.value.token;
            var applicationId = LoadApplicationId();

            AddCompanyDetails(applicationApprovalService, key, applicationId);

            AddPrimaryApplicantDetails(applicationApprovalService, key, applicationId);

            GetAllBanks(applicationApprovalService, key);

            SetPrimaryBankAccount(applicationApprovalService, key, applicationId);

            GetContracts(applicationApprovalService, key, applicationId);

            var applicantId = LoadApplicantId();
            SignContracts(applicationApprovalService, key, applicationId, applicantId);

            GetRequiredDocuments(applicationApprovalService, key, applicationId);

            SubmitRequiredDocuments(applicationApprovalService, key, applicationId);
        }

        private static void SignContracts(ApplicationApprovalService applicationApprovalService, string key, string applicationId, string applicantId)
        {
            Console.WriteLine("CALL SIGN-CONTRACT API TO SEND THE CONTRACT SIGNATURES. !!!");
            var signContractsSuccess = applicationApprovalService.SignContracts(key, applicationId, applicantId);
            if (!signContractsSuccess)
            {
                Console.WriteLine("ERROR IN SIGN-CONTRACT!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("SIGN-CONTRACT SUCCESSFULLY!!!");
        }

        private static void GetRequiredDocuments(ApplicationApprovalService applicationApprovalService, string key, string applicationId)
        {
            Console.WriteLine("CALL GET-REQUIRED - DOCUMENTS TO GET THE DETAILS OF THE REQUIRED DOCUMENTS!!!");
            var requiredDocuments = applicationApprovalService.GetRequiredDocuments(key, applicationId);
            if (!(requiredDocuments != null && requiredDocuments.value != null && requiredDocuments.value.totalCount > 0))
            {
                Console.WriteLine("ERROR IN GET-REQUIRED - DOCUMENTS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-REQUIRED - DOCUMENTS SUCCESSFULLY!!!");
            Console.WriteLine("BELOW IS REQUIRED - DOCUMENTS FETCHED:");
            Console.WriteLine(JsonConvert.SerializeObject(requiredDocuments));
        }

        private static void SubmitRequiredDocuments(ApplicationApprovalService applicationApprovalService, string key, string applicationId)
        {
            Console.WriteLine("CALL SUBMIT-REQUIRED - DOCUMENT API TO SUBMIT THE REQUIRED DOCUMENTS!!!");
            var submitRequiredDocumentsSuccess = applicationApprovalService.SubmitRequiredDocuments(key, applicationId);
            if (!submitRequiredDocumentsSuccess)
            {
                Console.WriteLine("ERROR IN SUBMIT-REQUIRED - DOCUMENT!!");
                Environment.Exit(0);
            }
            Console.WriteLine("SUBMIT-REQUIRED - DOCUMENT SUCCESSFULLY!!!");

            Console.ReadLine();
        }

        private static void AddCompanyDetails(ApplicationApprovalService applicationApprovalService, string key, string applicationId)
        {
            Console.WriteLine("CALL ADD-COMPANY - DETAILS API.THIS WILL UPDATE THE COMPANTY DETAILS !!!");
            var addingCompanyDetailsSuccess = applicationApprovalService.AddCompanyDetails(key, applicationId);
            if (!addingCompanyDetailsSuccess)
            {
                Console.WriteLine("ERROR IN ADDING COMPANY DETAILS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("COMPANY DETAILS ADDED SUCCESSFULLY!!!");
        }
        private static void AddPrimaryApplicantDetails(ApplicationApprovalService applicationApprovalService, string key, string applicationId)
        {
            Console.WriteLine("CALL ADD-PRIMARY - APPLICANT - DETAILS API.THIS WILL ADD THE DRIVER LIC AND SNN TO YOUR SYSTEM. !!!");
            var addPrimaryApplicantDetailsSuccess = applicationApprovalService.AddPrimaryApplicantDetails(key, applicationId);
            if (!addPrimaryApplicantDetailsSuccess)
            {
                Console.WriteLine("ERROR IN ADD-PRIMARY - APPLICANT - DETAILS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("ADD-PRIMARY - APPLICANT - DETAILS ADDED SUCCESSFULLY!!!");
        }
        private static void GetAllBanks(ApplicationApprovalService applicationApprovalService, string key)
        {
            Console.WriteLine("CALL GET-ALL - BANKS API.THIS WILL RETURN ALL BANKS TO THE PRIMARY CAN BE SELECTED !!!");
            var allBanks = applicationApprovalService.GetAllBanks(key);
            if (!(allBanks != null && allBanks.value != null && allBanks.value.Count > 0))
            {
                Console.WriteLine("ERROR IN GET-ALL - BANKS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-ALL - BANKS SUCCESSFULLY!!!");
            Console.WriteLine("BELOW IS BANKS FETCHED:");
            Console.WriteLine(JsonConvert.SerializeObject(allBanks));
        }
        private static void SetPrimaryBankAccount(ApplicationApprovalService applicationApprovalService, string key, string applicationId)
        {
            Console.WriteLine("CALL SET-PRIMARY - BANK API TO SET THE PRIMARY BANK !!!");
            var setPrimaryBankAccountSuccess = applicationApprovalService.SetPrimaryBankAccount(key, applicationId);
            if (!setPrimaryBankAccountSuccess)
            {
                Console.WriteLine("ERROR IN SET-PRIMARY - BANK!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("SET-PRIMARY - BANK SUCCESSFULLY!!!");
        }

        private static void GetContracts(ApplicationApprovalService applicationApprovalService, string key, string applicationId)
        {
            Console.WriteLine("CALL GET-CONTRACTS TO GET THE CONTRACT DETAILS THAT MUST BE DISPLAYED TO THE CUSTOMER !!!");
            var contracts = applicationApprovalService.GetContracts(key, applicationId);
            if (!(contracts != null && contracts.value != null && contracts.value.Count > 0))
            {
                Console.WriteLine("ERROR IN GET-CONTRACTS!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("GET-CONTRACTS - BANK SUCCESSFULLY!!!");
            Console.WriteLine("BELOW IS CONTRACTS FETCHED:");
            Console.WriteLine(JsonConvert.SerializeObject(contracts));
        }
        private static UserDatas Login()
        {

            Console.WriteLine("WRITE YOUR USERNAME:");
            var username = Console.ReadLine();

            Console.WriteLine("ENTER YOUR PASSWORD:");
            var password = Console.ReadLine();

            AuthenticationService authenticationService = new AuthenticationService();
            WebhookService webhookService = new WebhookService();
            UserDatas userdata = authenticationService.AuthenticateUser(username, password);

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
        private static string LoadApplicationId()
        {
            Console.WriteLine("ENTER APPLICATION ID !!!");
            var applicationId = Console.ReadLine();

            if (applicationId == "")
            {
                Console.WriteLine("NEED APPLICATION ID!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }

            return applicationId;
        }
        private static string LoadApplicantId()
        {
            Console.WriteLine("ENTER APPLICANT ID !!!");
            var applicantId = Console.ReadLine();

            if (applicantId == "")
            {
                Console.WriteLine("NEED APPLICANT ID!!!");
                Environment.Exit(0);
            }

            return applicantId;
        }
    }
}