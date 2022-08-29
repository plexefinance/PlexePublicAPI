
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
    <input type="text" class="form-control" id="staticEmail2" value="simon@cuce.co.au" name="username" placeholder="username" >
  </div>
  <div class="form-group mx-sm-3 mb-2">
    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="password" class="form-control" id="inputPassword2" value="DelightWAY12!@" name="password" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="button1">Start Process</button>
</form>
      
   <?php
include('./services/service.php');

    ?>
     <?php
      
        if(isset($_POST['button1'])) {
            echo "This is Button1 that is selected";
            echo "</br>";  
            if(!isset($_POST['username'])) {
            echo "username is required!!!";
            exit;
            
            }
            if(!isset($_POST['password'])) {
                echo "Password is required!!!";
            exit;
            
            }
            echo "</br>";  
            echo $_POST['username'];
            echo "</br>";  
            echo $_POST['password'];
            
            if(isset($_POST['username']) && isset($_POST['password'])) {
                $apiUsername = $_POST['username'];
		        $apiPassword = $_POST['password'];
                $authenticationService = new AuthenticationService();
		        $result = $authenticationService -> AuthenticateUser($apiUsername, $apiPassword);
               if($result == 'BAD REQUEST'){
                
                echo 'LOGIN FAILED!!!';
                exit;
                }
                print_r($result->value);


                    if($result -> value -> token == ''){
                    echo "</br>"; 
                     echo 'LOGIN FAILED!!!';
                     exit;
                    }

                    $key = $result -> value -> token;
                    
                    /*
                    $applicationId = '0b124aa4-2c33-430f-9d82-d1ff0e1d60c4';
                    echo "</br>"; 
                    echo 'CALL CREATE CUSTOMER AND APPLICATION API.';
                    echo "</br>"; 
                
                    $application = $applicationService -> GetApplicationById($key, $applicationId);
                    echo "</br>"; 
                    print_r($application);
                    
                     $applicationCusotmerresponse = $applicationService -> CreateCustomerAndApplication($key);
                    echo "</br>";  
                    if($applicationCusotmerresponse == 'BAD REQUEST !!!')
                    {
                        echo 'Create Customer And Application FAILED!!!';
                        exit;
                    }
                    print_r($applicationCusotmerresponse);

                    $applicationId = $applicationCusotmerresponse -> value -> applicationId;
		            $customerId = $applicationCusotmerresponse -> value -> customerId;
                    echo "</br>";  
                    echo $customerId;
                    echo "</br>";  
                    echo $applicationId;
                    */

                    $applicationId = '0b124aa4-2c33-430f-9d82-d1ff0e1d60c4';
                    $customerId = 'ef06c751-0ff7-4d0c-bc6f-72c2dc760554';
                    $BankName ="Bank Test";
                    $applicationCusotmerresponse = $applicationService -> AddOrUpdateBankingData($key,$applicationId,$BankName);

                    echo "</br>"; 
                    echo '<b>STEP 3: ADDING OR UPDATING BANK DATA !!!</b>';
                    echo "</br>"; 
            
            }
             

        }



       
    ?>
        </div>
        </div>
        <?php
//include('./services/service.php');

    ?>
        </main>


        



      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
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
                 success: function(data)
            {
                if (data === 'Correct') {
                  console.log('done');
                }
                else {
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

    <!-- Graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.1/dist/Chart.min.js"></script>
    <script>
      var ctx = document.getElementById("myChart");
      var myChart = new Chart(ctx, {
        type: 'line',
        data: {
          labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
          datasets: [{
            data: [15339, 21345, 18483, 24003, 23489, 24092, 12034],
            lineTension: 0,
            backgroundColor: 'transparent',
            borderColor: '#007bff',
            borderWidth: 4,
            pointBackgroundColor: '#007bff'
          }]
        },
        options: {
          scales: {
            yAxes: [{
              ticks: {
                beginAtZero: false
              }
            }]
          },
          legend: {
            display: false,
          }
        }
      });
    </script>
  </body>
</html>
