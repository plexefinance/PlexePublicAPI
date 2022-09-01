<?php

include('services/service.php');
include('LoanService.php');

class ThirdScenarioService {
    
    public function GetLoan($key, $loanId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET - LOAN API.THIS WILL RETURN THE LOAN DETAILS ON A LOAN ID!!!");
        
        $customerLoan = $loanService -> GetLoan($key, $loanId);
        
        if ($customerLoan == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET - LOAN!!!");
        }
        
        $appService -> writeMessage("GET - LOAN FETCHED SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(customerLoan));
    }

    public function GetTransactions($key, $loanId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-TRANSACTIONS API.THIS WILL RETURN ALL TRANSACTIONS!!!");
        
        $transactions = $loanService -> GetTransactions($key, $loanId);
        
        if ($transactions == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-TRANSACTIONS!!!");
        }
        
        $appService -> writeMessage("GET-TRANSACTIONS SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(transactions));
    }

    public function GetWithdrawals($key, $loanId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-WITHDRAWALS API TO GET ALL WITHDRAWALS!!!");
        
        $withdrawals = $loanService -> GetWithdrawals($key, $loanId);
        
        if ($withdrawals == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-WITHDRAWALS!!!");
        }
        
        $appService -> writeMessage("GET-WITHDRAWALS SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(withdrawals));
    }

    public function GetTotalBalance($key, $loanId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-TOTAL - BALANCE TO GET THE BALANCE!!!");
        
        $totalBalance = $loanService -> GetTotalBalance($key, $loanId);
        
        if ($totalBalance == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-TOTAL - BALANCE!!!");                
        }
        
        $appService -> writeMessage("GET-TOTAL - BALANCE SUCCESSFULLY!!!");
        //Console.WriteLine(JsonConvert.SerializeObject(totalBalance));
    }

    public function GetCustomerLoans($key, $customerId)
    {
        $loanService = new LoanService();
        $appService = new AppService();

        $appService -> writeMessage("CALL GET-CUSTOMER - LOANS API.THIS WILL RETURN THE LIST OF LOANS FOR A CUSTOMER !!!");
        
        $customerLoans = $loanService -> GetCustomerLoans($key, $customerId);
        
        if ($customerLoans == 'BAD_REQUEST')
        {
            $appService -> writeErrorMessage("ERROR IN GET-CUSTOMER - LOANS!!!");
        }
        
        $appService -> writeMessage("GET-CUSTOMER - LOANS FETCHED SUCCESSFULLY!!!");
    }
}
 $thirdScenarioService = new ThirdScenarioService();
?>