<?php
require('database.php');
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
<link rel="stylesheet" href="/app/css/style.css">
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
  <h2 class="text-center">Register to<a style="{text-decoration:none;}" href="/app/index.html">Marketplace Portal</h2></a>

<form class="login-form" onsubmit="return validate()" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <div class="avatar">
      <img src="/app/img/user.png" alt="Avatar">
    </div>   
        <div class="form-group">
              <input type="text" class="form-control input-lg" name="username" placeholder="Username" pattern="[a-z\d\.]{5,}"  title="Must contain at least 5 characters. Only use alphabets and digits." required><br></div>
              <div class="form-group"><input type="email" class="form-control input-lg" placeholder="Email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Must be of the format, someone@abc.abc" required><br></div>
            <div class="form-group"><input type="password"  class="form-control input-lg" placeholder="Password" name="password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br></div>
           <div class="form-group"><input type="password" class="form-control input-lg" placeholder="Confirm Password" name="confirmPassword" id="confirmPassword" required><br></div>
            <div class="form-group clearfix"><input type="submit" class="btn btn-primary btn-lg pull-right" name="submit" value="Sign up"></div>
  </form>
  <div class="hint-text">Have an account? <a href="login.php">Sign in here</a></div>
</div>
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
        $row = mysqli_fetch_assoc($res);
        if ($username==$row['username'])
            {
                echo "<script type='text/javascript'>alert(\"Username already exists!Try with a different username.\")</script>";
                //echo "<br>"."Try with a different username.";
            }
            
        elseif ($email==$row['email'])
        {
             echo "<script type='text/javascript'>alert(\"Email already exists!Try with a different email.\")</script>";
        }

       } 
       else
       {
       if(mysqli_query($conn,"INSERT INTO users (`uid`,`username`,`email`,`password`) VALUES('$uid','$username','$email','$password')")) { 
    
    echo "<script type='text/javascript'>alert(\"Registered Successfully!\")</script>";
    echo "<script type='text/javascript'>window.location.href = '/app/login.php';</script>";

    die(); 
  }
   else { 
    echo "Error: " . "<br>" . mysqli_error($conn); 
  } 
  mysqli_close($conn); 
}
}
?>