<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        $uid = $_SESSION['uid'];
    }
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/session_expiry.php'); 
require('user-authenticate.php');
require("database.php");
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/email.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Delete account</title>

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
     <h3 class="text-center">Delete account</h3><br>
<p>Do you wish to delete your account?</p>
 <div class="form-group"><input type="radio"  name="inp" value="yes" checked>Yes</input></div>
 <div class="form-group"><input type="radio"  name="inp" value="no">No</input></div>
<div class="form-group clearfix">  <input type="submit" class="btn btn-primary btn-lg pull-right" name="submit" value="Submit">
          </div></form></div>
</form>

</body>
   <p class="m-0 text-center text-white">© Copyright 2018 PV Group</p>
</html> 

<?php
if($uid==NULL or $uid=="")
  {
    echo "<script type='text/javascript'>alert(\"Uid cannot be null!\")</script>";
  }
 if ( isset( $_POST['submit'] ) ){
  extract($_POST);
  if ($inp=='yes')
  {
     $message="<p>Hello User,<br>We regret you to inform that your account has been deleted upon your request."."<br>"."This is a confirmation mail that your account has been deleted."."<br><br>"."Hope you enjoyed your time with us."."<br><br>"."Hope to see you in the future."."<br><br><br>"."---------------------------------------"."<br><br><br>"."Copyright PV Group 2018</p>";
        $subject="Account Deletion Confirmation.";
        $email=$_SESSION['email'];
        send_email($email,$message,$subject);
    $query2 = mysqli_query($conn,"Delete from general where uid='$uid'");
    $query3 = mysqli_query($conn,"Delete from bank where uid='$uid'");
    $query1 = mysqli_query($conn,"Delete from users where uid='$uid'");
    unset($_SESSION["username"]);
    unset($_SESSION["uid"]);
    unset($_SESSION["email"]);
    unset($_SESSION["password"]);
      if(session_destroy())
      {
        echo "<script type='text/javascript'>window.location.href = '/PasswordManager/user/exit-page.html';</script>";
      }
  }
  else
  {
echo "<script type='text/javascript'>alert(\"Good Decision!\")</script>";
echo "<script type='text/javascript'>window.location.href = '/PasswordManager/user-home.php';</script>";
  }
}
// Closing Connection with Server.
mysqli_close($conn);
?>
    