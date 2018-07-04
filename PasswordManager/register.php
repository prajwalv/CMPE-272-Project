<?php
require('database.php');
require('email.php');
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/user/encryption.php');
/* Google App Client Id */
define('CLIENT_ID', '138800578179-mn57im9u9iek79mhfphtou3ocoduveat.apps.googleusercontent.com');
/* Google App Client Secret */
define('CLIENT_SECRET', 'qDC12ygV3TF3Or-7dvFdpGiG');
/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://prajwalvenkatesh.com/PasswordManager/google/gauth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="/PasswordManager/css/style.css">
<link rel="stylesheet" href="/PasswordManager/google/google.css">
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
    </head>
<body>
  <div class="login-form">
    <h3 class="text-center">Sign Up for<a style="{text-decoration:none;}" href="/PasswordManager/index.html"> Password Manager </h3></a><br>
 <div class="wrapper">
<button onclick="window.location.href='<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>'" class="loginBtn loginBtn--google">
  Register with Google
</button>
</div><br>
  <form class="login-form" onsubmit="return validate()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="avatar">
      <img src="/PasswordManager/img/user.png" alt="Avatar">
    </div> 
                   <div class="form-group"><input type="text" class="form-control input-lg" name="username" placeholder="Username" pattern="[a-zA-Z\d\.]{5,}"  title="Must contain at least 5 characters. Only use alphabets and digits." required></div>
              <div class="form-group"> <input type="email" class="form-control input-lg" placeholder="Email" name="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}" title="Must be of the format, someone@abc.abc" required></div>
            <div class="form-group"> <input type="password"  class="form-control input-lg" placeholder="Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required></div>
            <div class="form-group"><input type="password" class="form-control input-lg" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required></div>
       <div class="form-group clearfix">  <input type="submit" class="btn btn-primary btn-lg pull-right" name="submit" value="Sign up">
          </div></form>
  <div class="hint-text">Have an account? <a href="/PasswordManager/login.php">Sign in here</a></div>
</div>
   <p class="m-0 text-center text-white">© Copyright 2018 PV Group</p>
</body>
</html>
<?php
 if ( isset( $_POST['submit'] ) ){
  $username=$_POST["username"];
  $email=$_POST["email"];
  $pass=$_POST["confirmPassword"];
  $password=md5($pass); 
  $check_email_query="select * from users where (username='$username' or email='$email');";

      $res=mysqli_query($conn,$check_email_query);

      if (mysqli_num_rows($res) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($res);
        if (strtoupper($username)==strtoupper($row['username']))
            {
                echo "<script type='text/javascript'>alert(\"Username already exists!Try with a different username.\")</script>";
            }
            
        elseif (strtoupper($email)==strtoupper($row['email']))
        {
             echo "<script type='text/javascript'>alert(\"Email already exists!Try with a different email.\")</script>";
        }

       } 
       else
       {
        $uid=generateRandomString(15);
        $link_id=generateRandomString(32);
        $activation_link='http://www.prajwalvenkatesh.com/PasswordManager/check-email-activation.php?passkey='.$link_id;
        $message="<p>Welcome to PasswordManager, perfect place to store your passwords secure."."<br><br><br>"."Thanks for signing up!."."<br><br>"."Your account has been created,you can access your account after activating by clicking the below URL."."<br><br>"."Click on the link to activate,"."<br>".$activation_link."<br><br><br>"."Note: The link can be used only once."."<br><br><br>"."---------------------------------------"."<br><br><br>"."Copyright PV Group 2018</p>";
        $subject="Registration Confirmation.";
        
        send_email($email,$message,$subject);
       if(mysqli_query($conn,"INSERT INTO tmp_users (`uid`,`username`,`email`,`password`,`activate_link`) VALUES('$uid','$username','$email','$password','$link_id')")) { 
    
    echo "<script type='text/javascript'>alert(\"Registered Successfully!Please check your inbox for activation link.\")</script>";
   // echo "<script>setTimeout(\"location.href = '/PasswordManager/login.php';\",1500);</script>";
    echo "<script type='text/javascript'>window.location.href = '/PasswordManager/login.php';</script>";

    die(); 
  }
   else { 
    echo "Error: " . "<br>" . mysqli_error($conn); 
  } 
  mysqli_close($conn); 
}
}
?>
