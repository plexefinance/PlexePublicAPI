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
                <label for="inputApplicationId">Application Id</label>
                <input type="text" class="form-control" id="inputApplicationId" value="" name="applicationId" placeholder="Application Id">
              </div>
              <div class="form-group">
                <label for="inputApplicantId">Applicant Id</label>
                <input type="text" class="form-control" id="inputApplicantId" value="" name="applicantId" placeholder="Applicant Id">
              </div>
              <button type="submit" class="btn btn-primary mb-2" name="button1">Start Process</button>              
            </form>
          </div>
          <div class="col-md-9" style="border: 2px solid lightblue;overflow:auto; max-height:800px;">
            <?php
            include('./services/scenarios/second-scenario.service.php');
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
              if (!isset($_POST['applicantId']) || empty($_POST['applicantId'])) {
                $appService -> writeErrorMessage("APPLICANT ID IS REQUIRED!!!");
              }
              
              if (isset($_POST['username']) 
              && isset($_POST['password'])
              && isset($_POST['applicationId'])
              && isset($_POST['applicantId'])
              ) {

                $apiUsername = $_POST['username'];
                $apiPassword = $_POST['password'];
                $applicationId = $_POST['applicationId'];
                $applicantId = $_POST['applicantId'];

                $appService -> writeMessage("USERNAME IS: ".$apiUsername."");
                $appService -> writeMessage("APPLICATION ID IS: ".$applicationId."");
                $appService -> writeMessage("APPLICANT ID IS: ".$applicantId."");

                // Step 1: Logging into application and fetch token.
                $appService -> writeMessage("<b>STEP 1: LOGGING INTO APPLICATION AND FETCH TOKEN!!!</b>");
                $result = $appService -> AuthenticateUser($apiUsername, $apiPassword);
                $key = $result -> token;
                
                // STEP 2: Add Company Details
                $appService -> writeMessage("<b>STEP 2: Add Company Details!!!</b>");
                $secondScenarioService -> AddCompanyDetails($key, $applicationId);

                // STEP 3: Add Primary Applicant Details
                $appService -> writeMessage("<b>STEP 3: Add Primary Applicant Details!!!</b>");
                $secondScenarioService -> AddPrimaryApplicantDetails($key, $applicationId);
                
                // STEP 4: Get All Banks
                $appService -> writeMessage("<b>STEP 4: Get All Banks!!!</b>");
                $secondScenarioService -> GetAllBanks($key, $applicationId);

                // STEP 5: Set Primary Bank Account
                $appService -> writeMessage("<b>STEP 5: Set Primary Bank Account!!!</b>");
                $secondScenarioService -> SetPrimaryBankAccount($key, $applicationId);

                // STEP 6: Get Contracts
                $appService -> writeMessage("<b>STEP 6: Get Contracts!!!</b>");
                $secondScenarioService -> GetContracts($key, $applicationId);

                // STEP 6: Get Contract Details
                $appService -> writeMessage("<b>STEP 7: Get Contract Details!!!</b>");
                $secondScenarioService -> GetContractDetails($key, $applicationId);
                
                // STEP 7: Sign Contracts
                $appService -> writeMessage("<b>STEP 8: Sign Contracts!!!</b>");
                $secondScenarioService -> SignContracts($key, $applicationId, $applicantId);

                // STEP 8: Get Required Documents
                $appService -> writeMessage("<b>STEP 9: Get Required Documents!!!</b>");
                $secondScenarioService -> GetRequiredDocuments($key, $applicationId);

                // STEP 9: Submit Required Documents
                $appService -> writeMessage("<b>STEP 10: Submit Required Documents!!!</b>");
                $secondScenarioService -> SubmitRequiredDocuments($key, $applicationId);
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
            let inputApplicantId = $("#inputApplicantId").val();
            
	        if (inputUserName.length == "") {
	            $("#message").text('Username is required');
                $("#validation-message").show();
	            return false;
	        } else if (inputPassword.length == "") {
	            $("#message").text('Password is required');
                $("#validation-message").show();
	            return false;
	        } if (inputApplicationId.length == "") {
	            $("#message").text('Application Id is required');
                $("#validation-message").show();
	            return false;
	        } if (inputApplicantId.length == "") {
	            $("#message").text('Applicant Id is required');
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