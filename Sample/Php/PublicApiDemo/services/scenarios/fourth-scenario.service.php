<?php

include('services/service.php');
include('services/CalculationService.php');
include('services/LoanService.php');

class FourthScenarioService {

/////////////////////////// SCENARIO 4 //////////////////////////////////

    public function CalculateLOCSlider($key, $applicationId)
    {
        $calculationService = new CalculationService();
        $appService = new AppService();

        $appService -> writeMessage("CALL APPLICATION-LOC - CALCULATION - SLIDER API. THIS WILL RETURN THE LIST PERCENTAGE OPTIONS TO WITHDRAW!!!");
        
        $calculateLOCSliderResponse = $calculationService -> CalculateLOCSlider($key, $applicationId);
        
        if ($calculateLOCSliderResponse == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN APPLICATION-LOC - CALCULATION - SLIDER!!!");
        }
        
        $appService -> writeMessage("APPLICATION-LOC - CALCULATION - SLIDER FETCHED SUCCESSFULLY!!!");
    }

    public function ApplicationLocCalculation($key, $applicationId)
    {
        $calculationService = new CalculationService();
        $appService = new AppService();

        $appService -> writeMessage("CALL APPLICATION-LOC - CALCULATION.THIS WILL RETURN RATES FOR THE PROPOSED ADVANCE!!!");
        
        $applicationLocCalculationResponse = $calculationService -> ApplicationLocCalculation($key, $applicationId);
        
        if ($applicationLocCalculationResponse == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN APPLICATION-LOC - CALCULATION!!!");
        }

        $appService -> writeMessage("APPLICATION-LOC - CALCULATION FETCHED SUCCESSFULLY!!!");
    }

    //pass loan ID
    public function MakeWithdrawalLineOfCredit($key, $loanId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL MAKE-WITHDRAWAL-LINE-OF-CREDIT API.THIS WILL TRIGGER A OTP TO START THE ADVANCE PROCESS!!!");
        
        $makeWithdrawalLineOfCreditResponse = $loanService -> MakeWithdrawalLineOfCredit($key, $loanId);

        if ($makeWithdrawalLineOfCreditResponse == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN MAKE-WITHDRAWAL-LINE-OF-CREDIT!!!");
        }

        $appService -> writeMessage("MAKE-WITHDRAWAL-LINE-OF-CREDIT FETCHED SUCCESSFULLY!!!");
    }

    public function ResendWithdrawalOtp($key, $loanId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL RESEND-WITHDRAWAL-OTP API TO RESEND THE OTP IF NEEDED!!!");
        
        $otp = $loanService -> ResendWithdrawalOtp($key, $loanId);

        if ($otp == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN RESEND-WITHDRAWAL-OTP!!!");
        }

        $appService -> writeMessage("RESEND-WITHDRAWAL-OTP FETCHED SUCCESSFULLY!!!");
        $appService -> writeMessage("OTP IS:".$otp);
        
        return $otp;
    }

    public function ConfirmWithdrawalLineOfCredit($key, $loanId, $otp)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL CONFIRM-WITHDRAWAL-LINE-OF-CREDIT PASSING IN THE OTP TO CONFIRM THE ADVANCE!!!");
        
        $appService -> writeMessage("RECIEVED OTP IS: ".$otp."!!!");
        
        $confirmWithdrawalLineOfCreditSuccess = $loanService -> ConfirmWithdrawalLineOfCredit($key, $loanId, $otp);
        
        if ($confirmWithdrawalLineOfCreditSuccess == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN CONFIRM-WITHDRAWAL-LINE-OF-CREDIT!!!");
        }
        
        $appService -> writeMessage("CONFIRM-WITHDRAWAL-LINE-OF-CREDIT SUCCESSFULLY!!!");
    }
}
 $fourthScenarioService = new FourthScenarioService();
?>