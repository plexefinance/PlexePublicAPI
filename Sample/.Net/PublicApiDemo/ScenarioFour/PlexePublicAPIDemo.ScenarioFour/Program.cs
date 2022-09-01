using Newtonsoft.Json;
using PlexePublicAPIDemo.Common;
using PlexePublicAPIDemo.Common.Model;
using System;

namespace PlexePublicAPIDemo.ScenarioFour
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
            CalculationService calculationService = new CalculationService();
            LoanService loanService = new LoanService();

            Console.WriteLine("WELCOME TO PLEXE API DEMO!!!!");

            // Step 1: LOGIN
            Console.WriteLine("Step 1: LOGIN !!!!");
            UserData userData = Login();
            var key = userData.Token;

            var applicationId = LoadApplicationId();
            var loanId = LoadLoanId();

            // Step 2: CalculateLOCSlider
            Console.WriteLine("Step 2: CalculateLOCSlider !!!!");
            CalculateLOCSlider(calculationService, key, applicationId);

            // Step 3: ApplicationLocCalculation
            Console.WriteLine("Step 3: ApplicationLocCalculation !!!!");
            ApplicationLocCalculation(calculationService, key, applicationId);

            // Step 4: MakeWithdrawalLineOfCredit
            Console.WriteLine("Step 4: MakeWithdrawalLineOfCredit !!!!");
            MakeWithdrawalLineOfCredit(loanService, key, loanId);

            // Step 5: CheckResendOTPOption
            Console.WriteLine("Step 5: CheckResendOTPOption !!!!");
            var resendOTP = CheckResendOTPOption();

            // Step 6: ResendWithdrawalOtp
            Console.WriteLine("Step 6: ResendWithdrawalOtp !!!!");
            if (resendOTP == "0")
            {
                ResendWithdrawalOtp(loanService, key, loanId);
            }

            // Step 7: ConfirmWithdrawalLineOfCredit
            Console.WriteLine("Step 7: ConfirmWithdrawalLineOfCredit !!!!");
            ConfirmWithdrawalLineOfCredit(key, loanId);

            Console.ReadLine();
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

        private static void CalculateLOCSlider(CalculationService calculationService, string key, string applicationId)
        {
            Console.WriteLine("CALL APPLICATION-LOC - CALCULATION - SLIDER API. THIS WILL RETURN THE LIST PERCENTAGE OPTIONS TO WITHDRAW!!!");
            var calculateLOCSliderResponse = calculationService.CalculateLOCSlider(key, applicationId);
            if (!(calculateLOCSliderResponse != null))
            {
                Console.WriteLine("ERROR IN APPLICATION-LOC - CALCULATION - SLIDER!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }
            Console.WriteLine("APPLICATION-LOC - CALCULATION - SLIDER FETCHED SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(calculateLOCSliderResponse));
        }

        private static void ApplicationLocCalculation(CalculationService calculationService, string key, string applicationId)
        {
            Console.WriteLine("CALL APPLICATION-LOC - CALCULATION.THIS WILL RETURN RATES FOR THE PROPOSED ADVANCE!!!");
            var applicationLocCalculationResponse = calculationService.ApplicationLocCalculation(key, applicationId);
            if (applicationLocCalculationResponse == null)
            {
                Console.WriteLine("ERROR IN APPLICATION-LOC - CALCULATION!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }

            Console.WriteLine("APPLICATION-LOC - CALCULATION FETCHED SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(applicationLocCalculationResponse));
        }

        private static void MakeWithdrawalLineOfCredit(LoanService loanService, string key, string loanId)
        {
            Console.WriteLine("CALL MAKE - WITHDRAWAL - LINE - OF - CREDIT API.THIS WILL TRIGGER A OTP TO START THE ADVANCE PROCESS!!!");
            var makeWithdrawalLineOfCreditResponse = loanService.MakeWithdrawalLineOfCredit(key, loanId);

            if (makeWithdrawalLineOfCreditResponse == null)
            {
                Console.WriteLine("ERROR IN MAKE - WITHDRAWAL - LINE - OF - CREDIT!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }

            Console.WriteLine("MAKE - WITHDRAWAL - LINE - OF - CREDIT FETCHED SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(makeWithdrawalLineOfCreditResponse));
        }

        private static string CheckResendOTPOption()
        {
            Console.WriteLine("DO YOU WANT TO RESEND OTP?");
            Console.WriteLine("0 : YES");
            Console.WriteLine("1 : NO");
            var resendOTP = Console.ReadLine();
            return resendOTP;
        }

        private static string ResendWithdrawalOtp(LoanService loanService, string key, string loanId)
        {
            Console.WriteLine("CALL RESEND - WITHDRAWAL - OTP API TO RESEND THE OTP IF NEEDED!!!");
            ResendWithdrawalOtpResponse otp = loanService.ResendWithdrawalOtp(key, loanId);

            if (otp == null)
            {
                Console.WriteLine("ERROR IN RESEND - WITHDRAWAL - OTP!!!");
                Console.ReadLine();
                Environment.Exit(0);
            }

            Console.WriteLine("RESEND - WITHDRAWAL - OTP FETCHED SUCCESSFULLY!!!");
            Console.WriteLine(JsonConvert.SerializeObject(otp));

            return otp.value;
        }

        private static void ConfirmWithdrawalLineOfCredit(string key, string loanId)
        {
            Console.WriteLine("CALL CONFIRM-WITHDRAWAL - LINE - OF - CREDIT PASSING IN THE OTP TO CONFIRM THE ADVANCE!!!");

            Console.WriteLine("ENTER OTP RECIEVED!!!");
            var otp = Console.ReadLine();

            LoanService loanService = new LoanService();
            var confirmWithdrawalLineOfCreditSuccess = loanService.ConfirmWithdrawalLineOfCredit(key, loanId, otp);
            if (!confirmWithdrawalLineOfCreditSuccess)
            {
                Console.WriteLine("ERROR IN CONFIRM-WITHDRAWAL - LINE - OF - CREDIT!!!");
                Environment.Exit(0);
            }
            Console.WriteLine("CONFIRM-WITHDRAWAL - LINE - OF - CREDIT SUCCESSFULLY!!!");
        }
    }
}
