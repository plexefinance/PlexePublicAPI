<?php

include('services/service.php');
include('services/ApplicationService.php');
include('services/WebhookService.php');

class FirstScenarioService {

    public function CreateCustomerAndApplication($key){

        $applicationService = new ApplicationService();
        $appService = new AppService();
            
        $appService -> writeMessage("CALLING CREATE CUSTOMER AND APPLICATION API.");

        $applicationCusotmerresponse = $applicationService -> CreateCustomerAndApplication($key);
        
        if($applicationCusotmerresponse == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("CREATE CUSTOMER AND APPLICATION FAILED!!!");
        }

        $appService -> writeMessage("CUSTOMER AND APPLICATION CREATED SUCCESSFULLY!!!");

        return $applicationCusotmerresponse;
    }

    public  function AddOrUpdateBankingData($key, $applicationId, $BankName){

        $applicationService = new ApplicationService();
        $appService = new AppService();

        $appService -> writeMessage("ADDING OR UPDATING BANK DATA !!!");               
        
        $addOrUpdateBankingDataResponse = $applicationService -> AddOrUpdateBankingData($key, $applicationId, $BankName);
        
        if ($addOrUpdateBankingDataResponse == 'BAD_REQUEST')
        {   
            $appService -> writeErrorMessage("ERROR ADDING OR UPDATING BANK DATA !!!");
        }
        $appService -> writeMessage("ADDING OR UPDATING BANK DATA SUCCESSFULL !!!");
    }

    public function ProcessApplication($key, $applicationId){
        $applicationService = new ApplicationService();        
        $appService = new AppService();

        $appService -> writeMessage("APPLICATION READY TO PROCESS:");
        
        $currentProcessSuccesss = $applicationService -> ProcessApplication($key, $applicationId);
        if ($currentProcessSuccesss == 'BAD_REQUEST')
        {   
            $appService -> writeErrorMessage("ERROR PROCESSING APPLICATION !!!");
        }
        $appService -> writeMessage("APPLICATION PROCESSED SUCCESSFULLY!!!");
    }

    public function GetApplicationStatusOrRegisterWebhook($key, $applicationId, $customerId, $selectedOption){
        $applicationService = new ApplicationService();
        $webhookService = new WebhookService();
        $appService = new AppService();

        if(!($selectedOption == '1' || $selectedOption == '2'))
        {
            $appService -> writeErrorMessage("NO OPTION SELECTED, RERUN!!!");
        }
          
        $appService -> writeMessage("SELECTED OPTION");
        $appService -> writeMessage("1: GET APPLICATION STATUS");
        $appService -> writeMessage("2: REGISTER FOR WEBHOOK");        
        $appService -> writeMessage("SELECTED OPTION IS: ".$selectedOption."");
        if ($selectedOption == "1")
        {
            $appService -> writeMessage("FETCHING APPLICATION STATUS !!!");
            $applicationStatus = $applicationService -> ApplicationStatus($key, $applicationId);
            if ($applicationStatus == 'BAD_REQUEST')
            {
                $appService -> writeErrorMessage("ERROR FETCHING APPLICATION STATUS!!!");
            }
            $appService -> writeMessage("APPLICATION STATUS FETCHED SUCCESSFULLY!!!");
            $appService -> writeMessage("APPLICATION STATUS BELOW:");
        }
        else if ($selectedOption == "2")
        {
            $appService -> writeMessage("REGISTERING WEBHOOK !!!");

            $partnerId = '0a298a17-54db-4785-b0aa-4729cf6e984a';
            $appService -> writeMessage("PARTNER ID IS: ".$partnerId."");                     
        
            $webhookRegistrationDone = $webhookService -> RegisterWebhook($key, $partnerId, $customerId);
            if ($webhookRegistrationDone == 'BAD_REQUEST')
            {
                $appService -> writeErrorMessage("ERROR REGISTERING WEBHOOK!!!");
            }
            $appService -> writeErrorMessage("WEBHOOK REGISTERED!!!");
        }
    }
           
    public function GetApplicationById($key, $applicationId){
        $applicationService = new ApplicationService();     
        $appService = new AppService();
        
        $appService -> writeMessage("GET APPLICATION BY APPLICATIONID:");
        
        $applicationResponse = $applicationService -> GetApplicationById($key, $applicationId);
        print_r($applicationResponse);
        if ($applicationResponse == 'BAD_REQUEST')
        {   
            $appService -> writeErrorMessage("ERROR FETCHING APPLICATION!!!");
        }
        $appService -> writeMessage("FETCH APPLICATION BY ID PROCESSED SUCCESSFULLY!!!");
        return $applicationResponse;
    }

    public function GetApplicationOffer($applicationResponse, $key, $applicationId){
        $applicationService = new ApplicationService();
        $appService = new AppService();
                
        if ($applicationResponse -> statusName != "OfferReady")
        {
            $appService -> writeMessage("OFFER IS NOT READY FOR APPLICATION!!!");
        }
        
        $appService -> writeMessage("FETCHING APPLICATION OFFER:");

        $applicationOffer = $applicationService -> GetApplicationOffer($key, $applicationId);

        print_r($applicationOffer);
        
        if ($applicationOffer == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR FETCHING APPLICATION OFFER!!!");
        }
        $appService -> writeMessage("FETCHING APPLICATION OFFER SUCCESSFUL!!!");
    }
}
 $firstScenarioService = new FirstScenarioService();
?>