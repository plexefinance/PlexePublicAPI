<!doctype html>
<html lang="en">

<?php include('common/head.php'); ?>

<body>

  <?php include('common/nav.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <?php include('common/sidebar-nav.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><?php include('common/resolve-title.php'); ?></h1>

        </div>
        <div class="section row">
          <div class="col-md-3">
            <div id="validation-message" class="alert alert-danger" role="alert" style="display:none;">
              <span id="message">
                
              </span>
              <button type="button" class="close" id="close-alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form1" method="post">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputUserName">UserName</label>
                  <input type="text" class="form-control" id="inputUserName" value="simon@cuce.co.au" name="username" placeholder="username">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword">Password</label>
                  <input type="password" class="form-control" id="inputPassword" value="DelightWAY12!@" name="password" placeholder="Password">
                </div>
              </div>
              <div class="form-group">
                <label for="inputApplicationId">Application Id</label>
                <input type="text" class="form-control" id="inputApplicationId" value="0b124aa4-2c33-430f-9d82-d1ff0e1d60c4" name="applicationId" placeholder="Application Id">
              </div>
              <div class="form-group">
                <label for="inputLoanId">Loan Id</label>
                <input type="text" class="form-control" id="inputLoanId" value="0b124aa4-2c33-430f-9d82-d1ff0e1d60c4" name="loanId" placeholder="Loan Id">
              </div>
              <div class="form-group">
                <label for="inputSelectedOption">Resend OTP</label>
              </div>
              <div class="form-group">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="resendOTP" id="inlineRadio1" value="1" checked>
                  <label class="form-check-label" for="inlineRadio1">YES</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="resendOTP" id="inlineRadio2" value="0">
                  <label class="form-check-label" for="inlineRadio2">NO</label>
                </div>
              </div>
              <div class="form-group">
                <label for="inputOTP">Enter Otp</label>
                <input type="text" class="form-control" id="inputOTP" value="" name="otp" placeholder="OTP" disabled>
              </div>
              <button type="Submit" class="btn btn-primary mb-2" name="button1">Start Process</button>              
            </form>
          </div>
          <div class="col-md-9" style="border: 2px solid lightblue;overflow:auto; max-height:800px;">
            <?php
            include('./services/scenarios/first-scenario.service.php');
            if (isset($_POST['button1'])) {
              if (!isset($_POST['username'])) {
                $appService -> writeErrorMessage("USERNAME IS REQUIRED!!!");
              }
              if (!isset($_POST['password'])) {
                $appService -> writeErrorMessage("PASSWORD IS REQUIRED!!!");
              }
              if (!isset($_POST['applicationId']) || empty($_POST['applicationId'])) {
                $appService -> writeErrorMessage("APPLICATION ID IS REQUIRED!!!");
              }
              if (!isset($_POST['loanId']) || empty($_POST['loanId'])) {
                $appService -> writeErrorMessage("LOAN ID IS REQUIRED!!!");
              }

              if (isset($_POST['username']) 
              && isset($_POST['password'])
              && isset($_POST['applicationId'])
              && isset($_POST['loanId'])
              ){

                $apiUsername = $_POST['username'];
                $apiPassword = $_POST['password'];
                $applicationId = $_POST['applicationId'];
                $loanId = $_POST['loanId'];
                $resendOTP = $_POST['resendOTP'];
                $otp = $_POST["otp"];

                $appService -> writeMessage("USERNAME IS: ".$apiUsername."");
                $appService -> writeMessage("APPLICATION ID IS: ".$applicationId."");
                $appService -> writeMessage("LOAN ID IS: ".$loanId."");

                // Step 1: Logging into application and fetch token.
                $appService -> writeMessage("<b>STEP 1: Logging into application and fetch token!!!</b>");
                $result = $appService -> AuthenticateUser($apiUsername, $apiPassword);
                $key = $result -> token;
                
                // STEP 2: Calculate LOC Slider
                $appService -> writeMessage("<b>STEP 2: CALCULATE LOC SLIDER!!!</b>");
                $fourthScenarioService -> CalculateLOCSlider($key, $applicationId);

                // STEP 3: Application Loc Calculation
                $appService -> writeMessage("<b>STEP 3: APPLICATION LOC CALCULATION!!!</b>");
                $fourthScenarioService -> ApplicationLocCalculation($key, $applicationId);

                // Step 4: Make Withdrawal Line Of Credit
                $appService -> writeMessage("<b>STEP 4: MAKE WITHDRAWAL LINE OF CREDIT!!!</b>");
                $fourthScenarioService -> MakeWithdrawalLineOfCredit($key, $loanId);

                // Step 5: Call ResendWithdrawalOtp and fetch otp
                if ($resendOTP == "1")
                {
                    // Step 5: Resend Withdrawal Otp
                    $appService -> writeMessage("<b>STEP 5: RESEND WITHDRAWAL OTP!!!</b>");
                    $otp = $fourthScenarioService -> ResendWithdrawalOtp($key, $loanId);
                }
                
                // Step 6: Confirm Withdrawal Line Of Credit
                $appService -> writeMessage("<b>STEP 6: CONFIRM WITHDRAWAL LINE OF CREDIT!!!</b>");
                $fourthScenarioService -> ConfirmWithdrawalLineOfCredit($key, $loanId, $otp);

              }
            }
            ?>
          </div>
        </div>
      </main>
    </div>
  </div>

  <?php include('common/footer.php'); ?>

  <script type="text/javascript">
  // Document is ready
    $(document).ready(function () {
        
        $("#close-alert").click(function (event) {
            $("#validation-message").hide();
        });
        $('#form1').on('submit', function() {
            return ValidateForm();
        });
        $("#inlineRadio1").click(function (event) {
            var value = event.target.value;
            $("#inputOTP").prop("disabled",true);
	    });
        $("#inlineRadio2").click(function (event) {
            var value = event.target.value;
            $("#inputOTP").prop("disabled",false);
	    });

        function ValidateForm() { 
            let inputUserName = $("#inputUserName").val();
            let inputPassword = $("#inputPassword").val();
            let inputApplicationId = $("#inputApplicationId").val();
            let inputLoanId = $("#inputLoanId").val();
            let inputOTP = $("#inputOTP").val();
            
	        if (inputUserName.length == "") {
	            $("#message").text('username is required');
                $("#validation-message").show();
	            return false;
	        } else if (inputPassword.length == "") {
	            $("#message").text('password is required');
                $("#validation-message").show();
	            return false;
	        } if (inputApplicationId.length == "") {
	            $("#message").text('application Id is required');
                $("#validation-message").show();
	            return false;
	        } if (inputLoanId.length == "") {
	            $("#message").text('loanid is required');
                $("#validation-message").show();
	            return false;
	        } if (!$("#inputOTP").prop("disabled") && inputOTP.length == "") {
	            $("#message").text('otp is required');
                $("#validation-message").show();
	            return false;
	        } else {
	            $("#validation-message").hide();
                return true;
	        }
        }
    });

  </script>
</body>
</html>