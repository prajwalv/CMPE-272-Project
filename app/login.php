<?php
require('database.php');
/* Google App Client Id */
define('CLIENT_ID', '340876954104-99ele4r0dk01s24iehv18ki7m07m71tp.apps.googleusercontent.com');
/* Google App Client Secret */
define('CLIENT_SECRET', '1e1UjqFlMxE6UebRh_mQwuJa');
/* Google App Redirect Url */
define('CLIENT_REDIRECT_URL', 'http://prajwalvenkatesh.com/app/google/gauth.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Login</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="/app/css/style.css">
<link rel="stylesheet" href="/app/google/google.css">
</head>
<body>
<div class="login-form">
<h2 class="text-center">Login to<a style="{text-decoration:none;}" href="/app/index.html"> Marketplace Portal</h2></a>
    <div class="wrapper">
<button onclick="window.location.href='<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>'" class="loginBtn loginBtn--google">
  Login with Google
</button>
</div><br>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		<div class="avatar">
			<img src="/app/img/user.png" alt="Avatar">
		</div>           
        <div class="form-group">
        	<input type="text" class="form-control input-lg" name="username" placeholder="Username or Email" required="required">	
        </div>
		<div class="form-group">
            <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="required">
        </div>        
        <div class="form-group clearfix">
            <button type="submit" class="btn btn-primary btn-lg pull-right">Sign in</button>
        </div>		
    </form>
     <div class="form-group">

</div>
	<div class="hint-text">Don't have an account? <a href="register.php">Sign up here</a></div>
</div>

</body>
</html>                            
<?php
if (isset($_POST['username']) and isset($_POST['password'])){
$username=$email = $_POST['username'];
$password = md5($_POST['password']);
$user_query = "SELECT * FROM `users` WHERE ( username='$username' OR email = '$username')  and password='$password'";
$user_result = mysqli_query($conn, $user_query) or die(mysqli_error($conn));
$user_count = mysqli_num_rows($user_result);
if ($user_count == 1 ){
$uid_query="SELECT uid FROM users WHERE (username ='$username' or email ='$email')";
$uid_result = mysqli_query($conn,$uid_query) or die(mysqli_error($conn));
$row = mysqli_fetch_row($uid_result);
$uid=$row[0];
session_start();
$_SESSION['username'] = $username;
$_SESSION['uid'] = $uid;
$_SESSION["authenticated"] = 'true';
echo "<script type='text/javascript'>window.location.href = '/app/home.html';</script>";
}
else{
echo "<script type='text/javascript'>alert(\"Wrong Username or Password\")</script>";
echo "<script type='text/javascript'>window.location.href = '/app/login.php';</script>";
}
}
?>
