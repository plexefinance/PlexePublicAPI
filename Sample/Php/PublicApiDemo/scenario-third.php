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
              echo "</br>";
              if (!isset($_POST['username'])) {
                echo "username is required!!!";
                exit;
              }
              if (!isset($_POST['password'])) {
                echo "Password is required!!!";
                exit;
              }
              echo "</br>";
              echo $_POST['username'];
              echo "</br>";
              echo $_POST['password'];

              if (isset($_POST['username']) && isset($_POST['password'])) {

                $apiUsername = $_POST['username'];
                $apiPassword = $_POST['password'];

                // Step 1: Logging into application and fetch token.
                $appService -> writeMessage("Step 1: Logging into application and fetch token!!!");
                $result = $appService -> AuthenticateUser($apiUsername, $apiPassword);
                $key = $result -> value -> token;
                $customerId = '0b124aa4-2c33-430f-9d82-d1ff0e1d60c4';
                $loanId = '0b124aa4-2c33-430f-9d82-d1ff0e1d60c4';

                // STEP 2: Get Customer Loans
                $appService -> writeMessage("STEP 2: Get Customer Loans!!!");
                //$appService -> GetCustomerLoans($loanService, $key, $customerId);

                // STEP 3: Get Loan
                $appService -> writeMessage("STEP 3: Get Loan!!!");
                //$appService -> GetLoan($loanService, $key, $customerId);

                // STEP 4: Get Transactions
                $appService -> writeMessage("STEP 4: Get Transactions!!!");
                //$appService -> GetTransactions($loanService, $key, $customerId);

                // STEP 5: Get Withdrawals
                $appService -> writeMessage("STEP 5: Get Withdrawals!!!");
                //$appService -> GetWithdrawals($loanService, $key, $customerId);

                // STEP 6: Get Total Balance
                $appService -> writeMessage("STEP 6: Get Total Balance!!!");
                //$appService -> GetTotalBalance($loanService, $key, $customerId);

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

  <!-- Icons -->
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
    feather.replace()
  </script>
</body>

</html>