<?php

include('ApplicationApprovalService.php');
include('ApplicationService.php');
include('AuthenticationService.php');
include('CalculationService.php');
include('LoanService.php');
include('WebhookService.php');

class AppService {
    
    public function writeErrorMessage($message){
        echo "</br>";
        echo "".$message."";
        echo "</br>";
        exit;
    }
    
    public function writeMessage($message){
        echo "</br>";
        echo "".$message."";
        echo "</br>";
    }

    public function AuthenticateUser($apiUsername, $apiPassword) {
        $authenticationService = new AuthenticationService();
        $result = $authenticationService->AuthenticateUser($apiUsername, $apiPassword);
        print_r($result);

        if ($result == 'BAD_REQUEST') {
            $this -> writeErrorMessage("LOGIN FAILED!!!");
        }
        
        if ($result -> token == '') {
            $this -> writeErrorMessage("LOGIN FAILED!!!");
        }

        $this -> writeMessage("LOGGED IN SUCCESSFULLY!!!");

        $this -> writeMessage("TOKEN: ".$result -> token."");

        return $result;
    }

    public function CreateCustomerAndApplication($key){

        $applicationService = new ApplicationService();
            
        $this -> writeMessage("CALLING CREATE CUSTOMER AND APPLICATION API.");

        $applicationCusotmerresponse = $applicationService -> CreateCustomerAndApplication($key);
        
        if($applicationCusotmerresponse == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("CREATE CUSTOMER AND APPLICATION FAILED!!!");
        }

        $this -> writeMessage("CUSTOMER AND APPLICATION CREATED SUCCESSFULLY!!!");

        return $applicationCusotmerresponse;
    }

    public  function AddOrUpdateBankingData($key, $applicationId, $BankName){

        $applicationService = new ApplicationService();
        
        $this -> writeMessage("ADDING OR UPDATING BANK DATA !!!");               
        
        $addOrUpdateBankingDataResponse = $applicationService -> AddOrUpdateBankingData($key, $applicationId, $BankName);
        
        if ($addOrUpdateBankingDataResponse == 'BAD_REQUEST')
        {   
            $this -> writeErrorMessage("ERROR ADDING OR UPDATING BANK DATA !!!");
        }
        $this -> writeMessage("ADDING OR UPDATING BANK DATA SUCCESSFULL !!!");
    }

    public function ProcessApplication($key, $applicationId, $currentProcess){
        $applicationService = new ApplicationService();               

        $this -> writeMessage("APPLICATION READY TO PROCESS:");

        $this -> writeMessage("ENTER CURRENT PROCESS:");
        
        if($currentProcess == "")
        {
            $currentProcess = "1";
        }
        $this -> writeMessage("CURRENT PROCESS IS:".$currentProcess."");
        
        $currentProcessSuccesss = $applicationService -> ProcessApplication($key, $applicationId, $currentProcess);
        if ($currentProcessSuccesss == 'BAD_REQUEST')
        {   
            $this -> writeErrorMessage("ERROR PROCESSING APPLICATION !!!");
        }
        $this -> writeMessage("APPLICATION PROCESSED SUCCESSFULLY!!!");
    }

    public function GetApplicationStatusOrRegisterWebhook($key, $applicationId, $customerId, $selectedOption){
        $applicationService = new ApplicationService();
        $webhookService = new WebhookService();

        if(!($selectedOption == '1' || $selectedOption == '2'))
        {
            $this -> writeErrorMessage("NO OPTION SELECTED, RERUN!!!");
        }
          
        $this -> writeMessage("SELECTED OPTION");
        $this -> writeMessage("1: GET APPLICATION STATUS");
        $this -> writeMessage("2: REGISTER FOR WEBHOOK");        
        $this -> writeMessage("SELECTED OPTION IS: ".$selectedOption."");
        if ($selectedOption == "1")
        {
            $this -> writeMessage("FETCHING APPLICATION STATUS !!!");
            $applicationStatus = $applicationService -> ApplicationStatus($key, $applicationId);
            if ($applicationStatus == 'BAD_REQUEST')
            {
                $this -> writeErrorMessage("ERROR FETCHING APPLICATION STATUS!!!");
            }
            $this -> writeMessage("APPLICATION STATUS FETCHED SUCCESSFULLY!!!");
            $this -> writeMessage("APPLICATION STATUS BELOW:");
        }
        else if ($selectedOption == "2")
        {
            $this -> writeMessage("REGISTERING WEBHOOK !!!");

            $partnerId = '0a298a17-54db-4785-b0aa-4729cf6e984a';
            $this -> writeMessage("PARTNER ID IS: ".$partnerId."");                     
        
            $webhookRegistrationDone = $webhookService -> RegisterWebhook($key, $partnerId, $customerId);
            if ($webhookRegistrationDone == 'BAD_REQUEST')
            {
                $this -> writeErrorMessage("ERROR REGISTERING WEBHOOK!!!");
            }
            $this -> writeErrorMessage("WEBHOOK REGISTERED!!!");
        }
    }
           
    public function GetApplicationById($key, $applicationId){
        $applicationService = new ApplicationService();            
        
        $this -> writeMessage("GET APPLICATION BY APPLICATIONID:");
        
        $applicationResponse = $applicationService -> GetApplicationById($key, $applicationId);
        print_r($applicationResponse);
        if ($applicationResponse == 'BAD_REQUEST')
        {   
            $this -> writeErrorMessage("ERROR FETCHING APPLICATION!!!");
        }
        $this -> writeMessage("FETCH APPLICATION BY ID PROCESSED SUCCESSFULLY!!!");
        return $applicationResponse;
    }

    public function GetApplicationOffer($applicationResponse, $key, $applicationId){
        $applicationService = new ApplicationService();
                
        if ($applicationResponse -> statusName != "OfferReady")
        {
            $this -> writeMessage("OFFER IS NOT READY FOR APPLICATION!!!");
        }
        
        $this -> writeMessage("FETCHING APPLICATION OFFER:");

        $applicationOffer = $applicationService -> GetApplicationOffer($key, $applicationId);

        print_r($applicationOffer);
        
        if ($applicationOffer == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR FETCHING APPLICATION OFFER!!!");
        }
        $this -> writeMessage("FETCHING APPLICATION OFFER SUCCESSFUL!!!");
    }


    /////////////////////////// SCENARIO 2 //////////////////////////////////

    public function SignContracts($key, $applicationId, $applicantId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL SIGN-CONTRACT API TO SEND THE CONTRACT SIGNATURES. !!!");
        $signContractsSuccess = $applicationApprovalService -> SignContracts($key, $applicationId, $applicantId);
        if ($signContractsSuccess == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN SIGN-CONTRACT!!!");
        }
        $this -> writeMessage("SIGN-CONTRACT SUCCESSFULLY!!!");
    }

    public function GetRequiredDocuments($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL GET-REQUIRED - DOCUMENTS TO GET THE DETAILS OF THE REQUIRED DOCUMENTS!!!");
        
        $requiredDocuments = $applicationApprovalService -> GetRequiredDocuments($key, $applicationId);
        if ($requiredDocuments == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-REQUIRED - DOCUMENTS!!!");
        }
        if (!($requiredDocuments != null && $requiredDocuments -> totalCount > 0))
        {
            $this -> writeErrorMessage("ERROR IN GET-REQUIRED - DOCUMENTS!!!");
        }
        $this -> writeMessage("GET-REQUIRED - DOCUMENTS SUCCESSFULLY!!!");
        $this -> writeMessage("BELOW IS REQUIRED - DOCUMENTS FETCHED:");

        // Console.WriteLine(JsonConvert.SerializeObject(requiredDocuments));
    }

    public function SubmitRequiredDocuments($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL SUBMIT-REQUIRED - DOCUMENT API TO SUBMIT THE REQUIRED DOCUMENTS!!!");
        
        $submitRequiredDocumentsSuccess = $applicationApprovalService -> SubmitRequiredDocuments($key, $applicationId);
        if ($submitRequiredDocumentsSuccess == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN SUBMIT-REQUIRED - DOCUMENT!!!");
        }
        $this -> writeMessage("SUBMIT-REQUIRED - DOCUMENT SUCCESSFULLY!!!");
    }

    public function AddCompanyDetails($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL ADD-COMPANY - DETAILS API.THIS WILL UPDATE THE COMPANTY DETAILS !!!");
        
        $addingCompanyDetailsSuccess = $applicationApprovalService -> AddCompanyDetails($key, $applicationId);
        if ($addingCompanyDetailsSuccess == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN ADDING COMPANY DETAILS!!!");
        }
        $this -> writeMessage("COMPANY DETAILS ADDED SUCCESSFULLY!!!");
    }
    public function AddPrimaryApplicantDetails($key, $applicationId)
    { 
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL ADD-PRIMARY - APPLICANT - DETAILS API.THIS WILL ADD THE DRIVER LIC AND SNN TO YOUR SYSTEM. !!!");        
        $addPrimaryApplicantDetailsSuccess = $applicationApprovalService -> AddPrimaryApplicantDetails($key, $applicationId);
        if ($addPrimaryApplicantDetailsSuccess == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN ADD-PRIMARY - APPLICANT - DETAILS!!!");
        }
        $this -> writeMessage("ADD-PRIMARY - APPLICANT - DETAILS ADDED SUCCESSFULLY!!!");
    }
    public function GetAllBanks($key)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL GET-ALL - BANKS API.THIS WILL RETURN ALL BANKS TO THE PRIMARY CAN BE SELECTED !!!");
        $allBanks = $applicationApprovalService-> GetAllBanks($key);
        if ($allBanks == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-ALL - BANKS!!!");            
        }
        $this -> writeMessage("GET-ALL - BANKS SUCCESSFULLY!!!");
        
        $this -> writeMessage("BELOW IS BANKS FETCHED:");
        //Console.WriteLine(JsonConvert.SerializeObject(allBanks));
    }
    public function SetPrimaryBankAccount($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL SET-PRIMARY - BANK API TO SET THE PRIMARY BANK !!!");
        $setPrimaryBankAccountSuccess = $applicationApprovalService -> SetPrimaryBankAccount($key, $applicationId);
        if ($setPrimaryBankAccountSuccess == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN SET-PRIMARY - BANK!!!");
        }
         $this -> writeMessage("SET-PRIMARY - BANK SUCCESSFULLY!!!");
    }

    public function GetContracts($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $this -> writeMessage("CALL GET-CONTRACTS TO GET THE CONTRACT DETAILS THAT MUST BE DISPLAYED TO THE CUSTOMER !!!");
        $contracts = $applicationApprovalService -> GetContracts($key, $applicationId);
        if ($contracts == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-CONTRACTS - DOCUMENTS!!!");
        }
        if (!($contracts != null && count($contracts)> 0))       
        {
            $this -> writeErrorMessage("ERROR IN GET-CONTRACTS!!!");           
        }
        $this -> writeMessage("GET-CONTRACTS SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(contracts));
    }
        
    /////////////////////////// SCENARIO 3 //////////////////////////////////

    //pass loan id
    public function GetLoan($key, $loanId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL GET - LOAN API.THIS WILL RETURN THE LOAN DETAILS ON A LOAN ID!!!");
        $customerLoan = $loanService -> GetLoan($key, $loanId);
        if ($customerLoan == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET - LOAN!!!");
        }
        $this -> writeMessage("GET - LOAN FETCHED SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(customerLoan));
    }

    public function GetTransactions($key, $loanId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL GET-TRANSACTIONS API.THIS WILL RETURN ALL TRANSACTIONS!!!");
        $transactions = $loanService -> GetTransactions($key, $loanId);
        if ($transactions == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-TRANSACTIONS!!!");
        }
        $this -> writeMessage("GET-TRANSACTIONS SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(transactions));
    }

    public function GetWithdrawals($key, $loanId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL GET-WITHDRAWALS API TO GET ALL WITHDRAWALS!!!");
        $withdrawals = $loanService -> GetWithdrawals($key, $loanId);
        if ($withdrawals == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-WITHDRAWALS!!!");
        }
        $this -> writeMessage("GET-WITHDRAWALS SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(withdrawals));
    }

    public function GetTotalBalance($key, $loanId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL GET-TOTAL - BALANCE TO GET THE BALANCE!!!");
        $totalBalance = $loanService -> GetTotalBalance($key, $loanId);
        if ($totalBalance == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-TOTAL - BALANCE!!!");
                
        }
        $this -> writeMessage("GET-TOTAL - BALANCE SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(totalBalance));
    }

    //pass customerId
    public function GetCustomerLoans($key, $customerId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL GET-CUSTOMER - LOANS API.THIS WILL RETURN THE LIST OF LOANS FOR A CUSTOMER !!!");
        $customerLoans = $loanService -> GetCustomerLoans($key, $customerId);
        if ($customerLoans == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN GET-CUSTOMER - LOANS!!!");
        }
        $this -> writeMessage("GET-CUSTOMER - LOANS FETCHED SUCCESSFULLY!!!");
    }
        
/////////////////////////// SCENARIO 4 //////////////////////////////////

    public function CalculateLOCSlider($key, $applicationId)
    {
        $calculationService = new CalculationService();
        $this -> writeMessage("CALL APPLICATION-LOC - CALCULATION - SLIDER API. THIS WILL RETURN THE LIST PERCENTAGE OPTIONS TO WITHDRAW!!!");
        $calculateLOCSliderResponse = $calculationService -> CalculateLOCSlider($key, $applicationId);
        if ($calculateLOCSliderResponse == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN APPLICATION-LOC - CALCULATION - SLIDER!!!");
        }
        $this -> writeMessage("APPLICATION-LOC - CALCULATION - SLIDER FETCHED SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(calculateLOCSliderResponse));
    }

    public function ApplicationLocCalculation($key, $applicationId)
    {
        $calculationService = new CalculationService();
        $this -> writeMessage("CALL APPLICATION-LOC - CALCULATION.THIS WILL RETURN RATES FOR THE PROPOSED ADVANCE!!!");
        $applicationLocCalculationResponse = $calculationService -> ApplicationLocCalculation($key, $applicationId);
        if ($applicationLocCalculationResponse == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN APPLICATION-LOC - CALCULATION!!!");
        }

        $this -> writeMessage("APPLICATION-LOC - CALCULATION FETCHED SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(applicationLocCalculationResponse));
    }

    //pass loan ID
    public function MakeWithdrawalLineOfCredit($key, $loanId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL MAKE-WITHDRAWAL-LINE-OF-CREDIT API.THIS WILL TRIGGER A OTP TO START THE ADVANCE PROCESS!!!");
        $makeWithdrawalLineOfCreditResponse = $loanService -> MakeWithdrawalLineOfCredit($key, $loanId);

        if ($makeWithdrawalLineOfCreditResponse == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN MAKE-WITHDRAWAL-LINE-OF-CREDIT!!!");
        }

        $this -> writeMessage("MAKE-WITHDRAWAL-LINE-OF-CREDIT FETCHED SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(makeWithdrawalLineOfCreditResponse));
    }

    public function ResendWithdrawalOtp($key, $loanId)
    {
        $loanService = new LoanService();
        $this -> writeMessage("CALL RESEND-WITHDRAWAL-OTP API TO RESEND THE OTP IF NEEDED!!!");
        $otp = $loanService -> ResendWithdrawalOtp($key, $loanId);

        if ($otp == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN RESEND-WITHDRAWAL-OTP!!!");
        }

        $this -> writeMessage("RESEND-WITHDRAWAL-OTP FETCHED SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(otp));
        $this -> writeMessage("OTP IS:".$otp);
        return $otp;
    }

    public function ConfirmWithdrawalLineOfCredit($key, $loanId, $otp)
    {
        $this -> writeMessage("CALL CONFIRM-WITHDRAWAL-LINE-OF-CREDIT PASSING IN THE OTP TO CONFIRM THE ADVANCE!!!");
        $this -> writeMessage("RECIEVED OTP IS: ".$otp."!!!");
        $loanService = new LoanService();
        $confirmWithdrawalLineOfCreditSuccess = $loanService -> ConfirmWithdrawalLineOfCredit($key, $loanId, $otp);
        if ($confirmWithdrawalLineOfCreditSuccess == 'BAD_REQUEST')
        {
            $this -> writeErrorMessage("ERROR IN CONFIRM-WITHDRAWAL-LINE-OF-CREDIT!!!");
        }
        $this -> writeMessage("CONFIRM-WITHDRAWAL-LINE-OF-CREDIT SUCCESSFULLY!!!");
    }
}
 $appService = new AppService();
?>