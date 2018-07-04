<?php
include 'database.php';
include 'email.php';
$reset_key = $_GET['resetkey'];
//Retrieve data from table where row that match this passkey
$sql1 = "SELECT * FROM reset_pass WHERE reset_key='$reset_key'";
$result1 = mysqli_query($conn,$sql1);
//If successfully queried
$link_reset=0;
if ($result1)
{
    //Count how many has this passkey
    $count = mysqli_num_rows($result1);
    //if found this passkey,retieve data from table temp_members
    if ($count == 1)
    {
        $rows = mysqli_fetch_row($result1);
        $uid = $rows[0];
        reset_password_form($uid);        
    }
        else
    {
       echo "<script type='text/javascript'>alert(\"Wrong activation code\")</script>";
       echo "<script type='text/javascript'>window.location.href = '/PasswordManager/index.html';</script>";
    }
}
?>

<?php
function reset_password_form(){
echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Reset Password</title>
      <script>
      function validate(){
           var a = document.getElementById("password").value;
            var b = document.getElementById("confirmPassword").value;
            if (a!=b) {
               alert("Passwords do no match!");
               return false;
            }
        }
        </script>

    <!-- Bootstrap core CSS -->
    <link href="/PasswordManager/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="/PasswordManager/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">';
    echo "<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href='/PasswordManager/css/clean-blog.min.css' rel='stylesheet>
  </head>
  <body>";
echo '  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="/PasswordManager/user-home.html">Password Manager</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/PasswordManager/user-home.html">Back</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/PasswordManager/php/logout.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->';
    echo "<header class='masthead' style='background-image: url('/PasswordManager/img/background-2.jpg')''>";
     echo ' <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Password Manager</h1>
              <span class="subheading">A place to store your passwords secure </span>
            </div>
          </div>
        </div>
      </div>
    </header>
     <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="post-preview">
            <h4>Update Password</h4><br>';
         echo '<form class="login-form" onsubmit="return validate()" method="post" action="/PasswordManager/help-reset-password.php">';
                             echo ' <div class="form-group">
        <div class="input-group">
        <input type="password"  class="form-control" placeholder="password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
          <span class="input-group-addon">
              <i class="glyphicon glyphicon-lock"></i>
            </span>
        </div>
      </div>
      <div class="form-group">
          <div class="input-group">
       <input type="password" class="form-control" placeholder="confirm password" name="confirmPassword" id="confirmPassword" required><br>
              <span class="input-group-addon">
                  <i class="glyphicon glyphicon-lock"></i>
              </span>
          </div>
      </div>   
       <div class="form-group sign-btn">
                                  <input type="submit" class="btn"  name="reset" value="reset">
                              </div>
                          </form>
          <hr>
          <!-- Pager -->
        </div>
      </div>
    </div>
     <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; PV Group 2018</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>
</body>
</html>';
if (isset($_POST['reset'])){
  extract($_POST);
$password =md5($_POST["confirmPassword"]);
$sql = "UPDATE users SET password='$password' where uid='$uid'";
if (mysqli_query($conn, $sql)) {
  $message="<p>Welcome to PasswordManager, perfect place to store your passwords secure."."<br><br><br>"."Password was reset to your PasswordManager account."."<br><br><br><br><br>"."We're sending an email just to confirm that this was you. "."<br><br><br>"."---------------------------------------------"."<br><br><br>"."Copyright PV Group 2018</p>";
$subject="Password reset successful";
send_email($email,$message,$subject);
  echo "<script type='text/javascript'>alert(\"Password reset successful!!.\")</script>";
 echo "<script type='text/javascript'>window.location.href = '/PasswordManager/login.php';</script>";
} else {
    echo "Error updating Password! " . mysqli_error($conn);
}
mysqli_close($conn);
}
}
?>