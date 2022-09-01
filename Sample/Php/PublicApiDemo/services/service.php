<?php

include('AuthenticationService.php');

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
}
 $appService = new AppService();
?>