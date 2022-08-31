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
            <form method="post" id="form1">
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
                <label for="inputCustomerId">Customer Id</label>
                <input type="text" class="form-control" id="inputCustomerId" value="0b124aa4-2c33-430f-9d82-d1ff0e1d60c4" name="customerId" placeholder="Customer Id">
              </div>
              <div class="form-group">
                <label for="inputLoanId">Loan Id</label>
                <input type="text" class="form-control" id="inputLoanId" value="0b124aa4-2c33-430f-9d82-d1ff0e1d60c4" name="loanId" placeholder="Loan Id">
              </div>
              <button type="submit" class="btn btn-primary mb-2" name="button1">Start Process</button>              
            </form>
          </div>
          <div class="col-md-9" style="border: 2px solid lightblue;overflow:auto; max-height:800px;">
            <?php
            include('./services/service.php');
            if (isset($_POST['button1'])) {
              echo "</br>";
              if (!isset($_POST['username'])) {
                $appService -> writeErrorMessage("USERNAME IS REQUIRED!!!");
              }
              if (!isset($_POST['password'])) {
                $appService -> writeErrorMessage("PASSWORD IS REQUIRED!!!");
              }
              if (!isset($_POST['customerId']) || empty($_POST['customerId'])) {
                $appService -> writeErrorMessage("CUSTOMER ID IS REQUIRED!!!");
              }
              if (!isset($_POST['loanId']) || empty($_POST['loanId'])) {
                $appService -> writeErrorMessage("LOAN ID IS REQUIRED!!!");
              }
              
              if (isset($_POST['username']) 
              && isset($_POST['password'])
              && isset($_POST['customerId'])
              && isset($_POST['loanId'])
              ){

                $apiUsername = $_POST['username'];
                $apiPassword = $_POST['password'];
                $customerId = $_POST['customerId'];
                $loanId = $_POST['loanId'];

                $appService -> writeMessage("USERNAME IS: ".$apiUsername."");
                $appService -> writeMessage("CUSTOMER ID IS: ".$customerId."");
                $appService -> writeMessage("LOAN ID IS: ".$loanId."");

                // Step 1: Logging into application and fetch token.
                $appService -> writeMessage("<b>STEP 1: Logging into application and fetch token!!!</b>");
                $result = $appService -> AuthenticateUser($apiUsername, $apiPassword);
                $key = $result -> token;
                $customerId = '7a2f7619-c4d0-408e-90a8-58cce05bec4b';
                $loanId = 'cb6a2b66-bf78-446f-99cf-c35af58930ff';

                // STEP 2: Get Customer Loans
                $appService -> writeMessage("<b>STEP 2: Get Customer Loans!!!</b>");
                $appService -> GetCustomerLoans($key, $customerId);

                // STEP 3: Get Loan
                $appService -> writeMessage("<b>STEP 3: Get Loan!!!</b>");
                $appService -> GetLoan($key, $loanId);

                // STEP 4: Get Transactions
                $appService -> writeMessage("<b>STEP 4: Get Transactions!!!</b>");
                $appService -> GetTransactions($key, $loanId);

                // STEP 5: Get Withdrawals
                $appService -> writeMessage("<b>STEP 5: Get Withdrawals!!!</b>");
                $appService -> GetWithdrawals($key, $loanId);

                // STEP 6: Get Total Balance
                $appService -> writeMessage("<b>STEP 6: Get Total Balance!!!</b>");
                $appService -> GetTotalBalance($key, $loanId);

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
            let inputCustomerId = $("#inputCustomerId").val();
            let inputLoanId = $("#inputLoanId").val();
                        
	        if (inputUserName.length == "") {
	            $("#message").text('username is required');
                $("#validation-message").show();
	            return false;
	        } else if (inputPassword.length == "") {
	            $("#message").text('password is required');
                $("#validation-message").show();
	            return false;
	        } if (inputCustomerId.length == "") {
	            $("#message").text('Customer Id is required');
                $("#validation-message").show();
	            return false;
	        } if (inputLoanId.length == "") {
	            $("#message").text('Loan Id is required');
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