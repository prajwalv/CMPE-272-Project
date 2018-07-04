<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="css/login-style.css">
<link rel="stylesheet" href="css/style.js">
</head>
<body class="main">
   
<div class="login-screen"></div>
    <div class="login-center">
        <div class="container min-height" style="margin-top: 20px;">
        	<div class="row">
                <div class="col-xs-4 col-md-offset-8">
                    <div class="login" id="card">
                    	<div class="front signin_form"> 
                        <p>Login to<a href="index.html" style="{text-decoration:none; color:white};"> PV University</a></p>
                          <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                                  <div class="input-group">

                                     <input type="text" class ="form-control" placeholder="username" name="username" required><br>
                                      <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-user"></i>
                                      </span>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="input-group">
                                     <input type="password" class ="form-control" placeholder="password" name="password" required><br>
                                      <span class="input-group-addon">
                                          <i class="glyphicon glyphicon-lock"></i>
                                      </span>
                                  </div>
                              </div>
                                  <div class="form-group sign-btn">
                                  <input type="submit" class="btn" name="submit" value="Log in">
                                 <br> <br><p><strong>New to PV University?</strong><br><a href="user-create.php" id="flip-btn" class="signup signup_link">Sign up for a new account</a></p>
                              </div>
                          </form>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Flip/1.0.18/jquery.flip.js"></script>
        </body>
</html>
<?php 
  if ( isset( $_POST['submit'] ) ){
    extract($_POST);
    $contacts = file("password.txt",FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) or die("Unable to open file!");
    foreach ($contacts as $line) {
    $contact=( explode( ',', $line ) );
    $username= $contact[0];
    $password_typed=$contact[1];
    $role=$contact[2];
    if($role=='admin')
    {
    if($password_typed==$password)
    {
 
      $_SESSION['username'] = $username;
      $_SESSION["authenticated"] = 'true';
     echo "<script>window.location='display-users.php'</script>";

    }
    else
    {
     echo "<script>window.location='display-error.php'</script>";

    }
  }
}}
?>    
