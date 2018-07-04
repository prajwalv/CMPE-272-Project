<?php 
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/session_expiry.php');
include("user-authenticate.php");
include("database.php");
include("encryption.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Select Vendor</title>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="/PasswordManager/css/style.css">
</head>
<body >    

  <div class="login-form">
    <br><br><br>
 <div class="btn-group" role="group" aria-label="...">
  <button type="button" onclick="window.location.href='/PasswordManager/user-home.php'" class="btn btn-default">Back</button>
  <button type="button" onclick="window.location.href='/PasswordManager/user-home.php'" class="btn btn-default">Home</button>
   <button type="button" onclick="window.location.href='/PasswordManager/php/logout.php'" class="btn btn-default">LogOut</button>
</div><br><br>
  
 <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
     <h3 class="text-center">Select Vendor</h3><br>
       <div class="form-group"> <label>Vendor Type</label><br>
                <select class="form-control input-lg" name="vendortype">
                  <option>Bank</option>
                  <option>Others</option>
                </select></div>
       <div class="form-group clearfix">  <input type="submit" class="btn btn-primary btn-lg pull-right" name="submit" value="Select">
          </div></form></div>
</body>
   <p class="m-0 text-center text-white">© Copyright 2018 PV Group</p>
</html> 

<?php

 if ( isset( $_POST['submit'] ) ){
  extract($_POST);
  if($vendortype=='Bank')
  {
     echo "<script type='text/javascript'>window.location.href = '/PasswordManager/user/bank-password.php';</script>";
  }
  else
  {
     echo "<script type='text/javascript'>window.location.href = '/PasswordManager/user/other-password.php';</script>";
}  }
?>
 