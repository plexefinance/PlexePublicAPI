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
                <label for="inputBankName">Bank Name</label>
                <input type="text" class="form-control" id="inputBankName" value="Test Bank" name="bankName" placeholder="Bank Name">
              </div>
              <div class="form-group">
                <label for="inputCurrentProcess">Current Process</label>
                <input type="text" class="form-control" id="inputCurrentProcess" value="22" name="currentProcess" placeholder="Current Process">
              </div>
              <div class="form-group">
                <label for="inputSelectedOption">Select Option</label>
              </div>
              <div class="form-group">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedOption" id="inlineRadio1" value="1" checked>
                  <label class="form-check-label" for="inlineRadio1">GET APPLICATION STATUS</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="selectedOption" id="inlineRadio2" value="2">
                  <label class="form-check-label" for="inlineRadio2">REGISTER FOR WEBHOOK</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary mb-2" name="button1">Start Process</button>              
            </form>
          </div>
          <div class="col-md-9" style="border: 2px solid lightblue;overflow:auto; max-height:800px;">
            <?php
            include('./services/service.php');
            if (isset($_POST['button1'])) {
              if (!isset($_POST['username'])) {
                $appService -> writeErrorMessage("USERNAME IS REQUIRED!!!");
              }
              if (!isset($_POST['password'])) {
                $appService -> writeErrorMessage("PASSWORD IS REQUIRED!!!");
              }
              if (!isset($_POST['bankName'])) {
                $appService -> writeErrorMessage("BANKNAME IS REQUIRED!!!");
              }
              if (!isset($_POST['currentProcess'])) {
                $appService -> writeErrorMessage("CURRENTPROCESS IS REQUIRED!!!");
              }
              if (!isset($_POST['selectedOption'])) {
                $appService -> writeErrorMessage("SELECTEDOPTION IS REQUIRED!!!");
              }

              if (isset($_POST['username']) 
              && isset($_POST['password'])
              && isset($_POST['bankName'])
              && isset($_POST['currentProcess'])
              && isset($_POST['selectedOption'])
              ) {

                $apiUsername = $_POST['username'];
                $apiPassword = $_POST['password'];
                $bankName = $_POST['bankName'];
                $currentProcess = $_POST['currentProcess'];
                $selectedOption = $_POST['selectedOption'];

                $appService -> writeMessage("USERNAME IS: ".$apiUsername."");

                //$applicationId = '0b124aa4-2c33-430f-9d82-d1ff0e1d60c4';
                //$customerId = 'ef06c751-0ff7-4d0c-bc6f-72c2dc760554';
                
                // Step 1: Logging into application and fetch token.
                $appService -> writeMessage("<b>STEP 1: LOGGING TO APPLICATION!!!</b>");
                $result = $appService -> AuthenticateUser($apiUsername, $apiPassword);
                $key = $result -> token;

                // STEP 2: CreateCustomerAndApplication
                $appService -> writeMessage("<b>STEP 2: CREATE CUSTOMER AND APPLICATION!!!</b>");
                //$applicationAndCustomerCreateResponse = $appService -> CreateCustomerAndApplication($key);

                // Load application Id and customer Id
                $applicationId = 'c9b8f9a5-0a27-4f2f-ad58-efae098f321e';//$applicationAndCustomerCreateResponse -> applicationId;
		        $customerId = 'ef06c751-0ff7-4d0c-bc6f-72c2dc760554';// $applicationAndCustomerCreateResponse -> customerId;
                $appService -> writeMessage("ApplicationId: ".$applicationId."");
                $appService -> writeMessage("CustomerId: ".$customerId."");
                
                // STEP 3: AddOrUpdateBankingData                
                $appService -> writeMessage("<b>STEP 3: Add Or Update Banking Data !!!</b>");                
                //$appService -> AddOrUpdateBankingData($key, $applicationId, $bankName);

                // STEP 4: ProcessApplication  
                $appService -> writeMessage("<b>STEP 4: ProcessApplication !!!</b>");  
                //$appService -> ProcessApplication($key, $applicationId, $currentProcess);

                // STEP 5 : Get application status or register webhook
                $appService -> writeMessage("<b>STEP 5: GET APPLICATION STATUS OR REGISTER WEBHOOK !!!</b>");  
                $appService -> GetApplicationStatusOrRegisterWebhook($key, $applicationId, $customerId, $selectedOption);

                //STEP 6 GetApplication By ApplicationId
                $appService -> writeMessage("<b>STEP 6: Get APPLICATION BY ID !!!</b>");  
                $applicationResponse = $appService -> GetApplicationById($key, $applicationId);
                   
                // STEP 7: Fetch Application offer
                $appService -> writeMessage("<b>STEP 7: Get Application Offer !!!</b>");  
                $appService -> GetApplicationOffer($applicationResponse, $key, $applicationId); 
                
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

        function ValidateForm() { 
            let inputUserName = $("#inputUserName").val();
            let inputPassword = $("#inputPassword").val();
            let inputBankName = $("#inputBankName").val();
            let inputCurrentProcess = $("#inputCurrentProcess").val();
            
	        if (inputUserName.length == "") {
	            $("#message").text('Username is required');
                $("#validation-message").show();
	            return false;
	        } else if (inputPassword.length == "") {
	            $("#message").text('Password is required');
                $("#validation-message").show();
	            return false;
	        } if (inputBankName.length == "") {
	            $("#message").text('Bank name is required');
                $("#validation-message").show();
	            return false;
	        } if (inputCurrentProcess.length == "") {
	            $("#message").text('Current process is required');
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