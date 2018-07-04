<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
        $uid = $_SESSION['uid'];
    }
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/session_expiry.php'); 
require('database.php');
require('user-authenticate.php');
require('encryption.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update other password</title>
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

<div class="maindiv">
<div class="divA">
<div class="title">
<h2>Update my other passwords</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click on the vendorname</p>
<?php
if (isset($_GET['submit'])) {
$id = $_GET['id'];
$vendorname = $_GET['vendorname'];
$vendortype = $_GET['vendortype'];
$email = $_GET['email'];
$phoneno = $_GET['phoneno'];
$username = $_GET['username'];
$password = encryptPassword($_GET['password']);
$query = mysqli_query($conn,"update general set vendorname='$vendorname', vendortype='$vendortype',email='$email', phoneno='$phoneno', username='$username',password='$password' where id='$id'");
}
$query = mysqli_query($conn,"select * from general where uid='$uid'");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='update-other-password.php?update={$row['id']}'>{$row['vendorname']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysqli_query($conn,"select * from general where id=$update");
while ($row1 = mysqli_fetch_array($query1)) {
echo "<form class='form' method='get'>";
$auth_uid=$row1['uid'];
if($auth_uid!=$uid){echo "<script type='text/javascript'>alert(\"Unauthorised Access!\")</script>";}
else{
echo"<input class='input' type='hidden' name='id' value='{$row1['id']}' />";
echo "<br />";
echo "<label>" . "Old Vendortype:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='email' value='{$row1['vendortype']}' disabled/>";
echo "<br />";
echo "<label>" . "New Vendortype:*" . "</label>" . "<br />";
echo '<select class="form-control" name="vendortype" required>
                  <option>Email</option>
                  <option>Online Shopping </option>
                  <option>Social Media</option>
                  <option>Others</option>
                </select>'; 
                echo "<br />";
echo "<label>" . "Old Vendorname:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='phoneno' value='{$row1['vendorname']}' disabled/>";
echo "<br />";
echo "<label>" . "New Vendorname:*" . "</label>" . "<br />";
echo '<select class="form-control" name="vendorname"  required>
                  <option>Gmail</option>
                  <option>Outlook</option>
                  <option>Facebook</option>
                  <option>Twitter</option>
                  <option>Amazon</option>
                  <option>Flipkart</option>
                  <option>Instagram</option>
                  <option>Others</option>
                </select>';
echo "<br />";
echo "<label>" . "Email:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}' value='{$row1['email']}' />";
echo "<br />";
echo "<label>" . "Phone No:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='phoneno' value='{$row1['phoneno']}' />";
echo "<br />";
echo "<label>" . "Username:" . "</label>" . "<br />";
echo "<input class='input' class='form-control'  type='text' name='username' value='{$row1['username']}' />";
echo "</text>";
echo "<br />";
echo "<label>" . "Old Password:" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='text' name='password' value=".decryptPassword($row1['password'])." disabled/>";
echo "</text>";
echo "<br />";
echo "<label>" . "New Password:*" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='password' name='password'  title='Please type the old password if not updating as well.' required/>";
echo "</password>";
echo "<br />";
echo "* Please use the old values for New Vendortype, New Vendorname and New Password if you are not updating!<br>";
echo "<input class='submit' type='submit' name='submit' value='Update' />";
echo "</form>";
}}
}
if (isset($_GET['submit'])) {
echo '<div class="form" id="form3"><br><br><br><br><br><br>
<Span>Data Updated Successfully!!</span></div>';
}
mysqli_close($conn);
?>
</div>
</body>
   <p class="m-0 text-center text-white">© Copyright 2018 PV Group</p>
</html> 