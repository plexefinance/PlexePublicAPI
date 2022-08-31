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