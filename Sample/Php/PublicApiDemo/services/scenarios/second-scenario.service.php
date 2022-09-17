<?php

include('services/service.php');
include('services/ApplicationApprovalService.php');

class SecondScenarioService {

    /////////////////////////// SCENARIO 2 //////////////////////////////////

    public function SignContracts($key, $applicationId, $applicantId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL SIGN-CONTRACT API TO SEND THE CONTRACT SIGNATURES. !!!");

        $signContractsSuccess = $applicationApprovalService -> SignContracts($key, $applicationId, $applicantId);

        if ($signContractsSuccess == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN SIGN-CONTRACT!!!");
        }

        $appService -> writeMessage("SIGN-CONTRACT SUCCESSFULLY!!!");
    }

    public function GetRequiredDocuments($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-REQUIRED - DOCUMENTS TO GET THE DETAILS OF THE REQUIRED DOCUMENTS!!!");
        
        $requiredDocuments = $applicationApprovalService -> GetRequiredDocuments($key, $applicationId);

        if ($requiredDocuments == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-REQUIRED - DOCUMENTS!!!");
        }

        if (!($requiredDocuments != null && $requiredDocuments -> totalCount > 0))
        {
            $appService -> writeErrorMessage("ERROR IN GET-REQUIRED - DOCUMENTS!!!");
        }

        $appService -> writeMessage("GET-REQUIRED - DOCUMENTS SUCCESSFULLY!!!");

        $appService -> writeMessage("BELOW IS REQUIRED - DOCUMENTS FETCHED:");
    }

    public function SubmitRequiredDocuments($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL SUBMIT-REQUIRED - DOCUMENT API TO SUBMIT THE REQUIRED DOCUMENTS!!!");
        
        $submitRequiredDocumentsSuccess = $applicationApprovalService -> SubmitRequiredDocuments($key, $applicationId);
        
        if ($submitRequiredDocumentsSuccess == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN SUBMIT-REQUIRED - DOCUMENT!!!");
        }

        $appService -> writeMessage("SUBMIT-REQUIRED - DOCUMENT SUCCESSFULLY!!!");
    }

    public function AddCompanyDetails($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL ADD-COMPANY - DETAILS API.THIS WILL UPDATE THE COMPANTY DETAILS !!!");
        
        $addingCompanyDetailsSuccess = $applicationApprovalService -> AddCompanyDetails($key, $applicationId);
        
        if ($addingCompanyDetailsSuccess == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN ADDING COMPANY DETAILS!!!");
        }
        
        $appService -> writeMessage("COMPANY DETAILS ADDED SUCCESSFULLY!!!");
    }
    public function AddPrimaryApplicantDetails($key, $applicationId)
    { 
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL ADD-PRIMARY - APPLICANT - DETAILS API.THIS WILL ADD THE DRIVER LIC AND SNN TO YOUR SYSTEM. !!!");        
        
        $addPrimaryApplicantDetailsSuccess = $applicationApprovalService -> AddPrimaryApplicantDetails($key, $applicationId);
        
        if ($addPrimaryApplicantDetailsSuccess == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN ADD-PRIMARY - APPLICANT - DETAILS!!!");
        }
        
        $appService -> writeMessage("ADD-PRIMARY - APPLICANT - DETAILS ADDED SUCCESSFULLY!!!");
    }
    public function GetAllBanks($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-ALL - BANKS API.THIS WILL RETURN ALL BANKS TO THE PRIMARY CAN BE SELECTED !!!");
        
        $allBanks = $applicationApprovalService-> GetAllBanks($key, $applicationId);
        
        if ($allBanks == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-ALL - BANKS!!!");            
        }
        
        $appService -> writeMessage("GET-ALL - BANKS SUCCESSFULLY!!!");
        
        $appService -> writeMessage("BELOW IS BANKS FETCHED:");        

        print_r($allBanks);
    }
    public function SetPrimaryBankAccount($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL SET-PRIMARY - BANK API TO SET THE PRIMARY BANK !!!");
        
        $setPrimaryBankAccountSuccess = $applicationApprovalService -> SetPrimaryBankAccount($key, $applicationId);
        
        if ($setPrimaryBankAccountSuccess == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN SET-PRIMARY - BANK!!!");
        }
         
        $appService -> writeMessage("SET-PRIMARY - BANK SUCCESSFULLY!!!");
    }

    public function GetContracts($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-CONTRACTS TO GET THE CONTRACT DETAILS THAT MUST BE DISPLAYED TO THE CUSTOMER !!!");
        
        $contracts = $applicationApprovalService -> GetContracts($key, $applicationId);
        
        if ($contracts == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-CONTRACTS - DOCUMENTS!!!");
        }
        
        if (!($contracts != null && count($contracts)> 0))       
        {
            $appService -> writeErrorMessage("ERROR IN GET-CONTRACTS!!!");           
        }
        
        $appService -> writeMessage("GET-CONTRACTS SUCCESSFULLY!!!");

        print_r($contracts);
    }

    public function GetContractDetails($key, $applicationId)
    {
        $applicationApprovalService = new ApplicationApprovalService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-CONTRACT DETAILS TO GET THE CONTRACT DETAILS THAT MUST BE DISPLAYED TO THE CUSTOMER !!!");
        
        $contractDetails = $applicationApprovalService -> GetContractDetails($key, $applicationId);
        
        if ($contractDetails == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-CONTRACT DETAILS!!!");
        }
        
        if (!($contractDetails != null))       
        {
            $appService -> writeErrorMessage("ERROR IN GET-CONTRACT DETAILS!!!");           
        }
        
        $appService -> writeMessage("GET-CONTRACT DETAILS SUCCESSFULLY!!!");

        print_r($contractDetails);
    }
}
 $secondScenarioService = new SecondScenarioService();
?>