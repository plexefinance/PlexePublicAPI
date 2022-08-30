<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
  <title>Dashboard Template for Bootstrap</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/dashboard/">
  <!-- Bootstrap core CSS -->
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="./css/dashboard.css" rel="stylesheet">
</head>
<body>
  <?php include('common/nav.php'); ?>
  <div class="container-fluid">
    <div class="row">
      <?php include('common/sidebar-nav.php'); ?>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2"><?php include('common/resolve-title.php'); ?></h1>
        </div>
        <div class="section">
          <div class="col-md-12">
            <form class="form-inline" method="post">
              <div class="form-group mb-2">
                <label for="staticEmail2" class="sr-only">UserName</label>
                <input type="text" class="form-control" id="staticEmail2" value="simon@cuce.co.au" name="username" placeholder="username">
              </div>
              <div class="form-group mx-sm-3 mb-2">
                <label for="inputPassword2" class="sr-only">Password</label>
                <input type="password" class="form-control" id="inputPassword2" value="DelightWAY12!@" name="password" placeholder="Password">
              </div>
              <button type="submit" class="btn btn-primary mb-2" name="button1">Start Process</button>
            </form>

            <?php
            include('./services/service.php');
            if (isset($_POST['button1'])) {
              if (!isset($_POST['username'])) {
                $appService -> writeErrorMessage("USERNAME IS REQUIRED!!!");
              }
              if (!isset($_POST['password'])) {
                $appService -> writeErrorMessage("PASSWORD IS REQUIRED!!!");
              }              

              if (isset($_POST['username']) && isset($_POST['password'])) {

                $apiUsername = $_POST['username'];
                $apiPassword = $_POST['password'];

                $appService -> writeMessage("USERNAME IS: ".$apiUsername."");

                $applicationId = '0b124aa4-2c33-430f-9d82-d1ff0e1d60c4';
                $customerId = 'ef06c751-0ff7-4d0c-bc6f-72c2dc760554';
                $BankName = "Bank Test";
                $currentProcess = '1';

                // Step 1: Logging into application and fetch token.
                $appService -> writeMessage("Step 1: LOGGING TO APPLICATION!!!");
                $result = $appService -> AuthenticateUser($apiUsername, $apiPassword);
                $key = $result -> value -> token;

                // STEP 2: CreateCustomerAndApplication
                $appService -> writeMessage("Step 2: CREATE CUSTOMER AND APPLICATION!!!");
                //$applicationAndCustomerCreateResponse = $appService -> CreateCustomerAndApplication($key);

                // Load application Id and customer Id
                //$applicationId = $applicationAndCustomerCreateResponse -> value -> applicationId;
		        //$customerId = $applicationAndCustomerCreateResponse -> value -> customerId;
                $appService -> writeMessage("ApplicationId: ".$applicationId."");
                $appService -> writeMessage("CustomerId: ".$customerId."");
                
                // STEP 3: AddOrUpdateBankingData                
                $appService -> writeMessage("STEP 3: Add Or Update Banking Data !!!");                
                //$appService -> AddOrUpdateBankingData($key, $applicationId, $BankName);

                // STEP 4: ProcessApplication  
                $appService -> writeMessage("STEP 4: ProcessApplication !!!");  
                //$appService -> ProcessApplication($key, $applicationId);

                // STEP 5 : Get application status or register webhook
                $appService -> writeMessage("STEP 5: GET APPLICATION STATUS OR REGISTER WEBHOOK !!!");  
                //$appService -> GetApplicationStatusOrRegisterWebhook($key, $applicationId, $customerId);

                //STEP 6 GetApplication By ApplicationId
                $appService -> writeMessage("STEP 6: Get APPLICATION BY ID !!!");  
                //$applicationResponse = $appService -> GetApplicationById($key, $applicationId);
                   
                // STEP 7: Fetch Application offer
                $appService -> writeMessage("STEP 7: Get Application Offer !!!");  
                //$appService -> GetApplicationOffer($applicationResponse, $key, $applicationId); 
                
              }
            }
            ?>
          </div>
        </div>
      </main>
    </div>
  </div>
  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script>
    window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
  </script>
  <script src="./js/popper.min.js"></script>
  <script src="./js/bootstrap.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#loginform').submit(function(e) {
        debugger;
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: 'services/AuthenticationService.php',
          data: {
            action: 'AuthenticateUserTwo',
            username: $("#username").val(),
            password: $("#password").val()
          },
          success: function(data) {
            if (data === 'Correct') {
              console.log('done');
            } else {
              alert(data);
            }
          }
        });
      });
    });
  </script>
  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>
</html>