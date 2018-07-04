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
<title>Update bank password</title>
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
<h2>Update my bank passwords</h2>
</div>
<div class="divB">
<div class="divD">
<p>Click on the bankname</p>
<?php
if (isset($_GET['submit'])) {
$id = $_GET['id'];
$vendorname = $_GET['vendorname'];
$ifsc = $_GET['ifsc'];
$accounttype = $_GET['accounttype'];
$accountno = $_GET['accountno'];
$username = $_GET['username'];
$password = encryptPassword($_GET['password']);
$email = $_GET['email'];
$phoneno = $_GET['phoneno'];
$cardno = $_GET['cardno'];
$cardtype1 = $_GET['cardtype1'];
$cardtype2 = $_GET['cardtype2'];
$cardexp = $_GET['cardexp'];
$cardpin = encryptPassword($_GET['cardpin']);
$cardcvv = encryptPassword($_GET['cardcvv']);
$query = mysqli_query($conn,"update bank set vendorname='$vendorname', ifsc='$ifsc', accounttype='$accounttype', accountno='$accountno', username='$username',password='$password', email='$email', phoneno='$phoneno', cardno='$cardno', cardtype1='$cardtype1',cardtype2='$cardtype2', cardexp='$cardexp',cardcvv='$cardcvv',cardpin='$cardpin' where id='$id'");
}
$query = mysqli_query($conn,"select * from bank where uid='$uid'");
while ($row = mysqli_fetch_array($query)) {
echo "<b><a href='update-bank-password.php?update={$row['id']}'>{$row['vendorname']}</a></b>";
echo "<br />";
}
?>
</div><?php
if (isset($_GET['update'])) {
$update = $_GET['update'];
$query1 = mysqli_query($conn,"select * from bank where id=$update");
while ($row1 = mysqli_fetch_array($query1)) {
echo "<form class='form' method='get'>";
$auth_uid=$row1['uid'];
if($auth_uid!=$uid){echo "<script type='text/javascript'>alert(\"Unauthorised Access!\")</script>";}
else{
echo"<input class='input' type='hidden' name='id' value='{$row1['id']}' />";
echo "<br />";
echo "<label>" . "Bankname:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='vendorname' value='{$row1['vendorname']}'/>";
echo "<br />";
echo "<label>" . "IFSC Code:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='ifsc' value='{$row1['ifsc']}'/>";
echo "<br />";
echo "<label>" . "Old Account Type:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='accounttype' value='{$row1['accounttype']}' disabled/>";
echo "<br />";
echo "<label>" . "New Account Type:*" . "</label>" . "<br />";
echo  "<select class='form-control' name='accounttype' required>
                  <option>Savings</option>
                  <option>Checking</option>
                  <option>Loan</option>
                  <option>Current</option>
                  <option>Other</option>
                   <option>None</option>
                </select><br>";
echo "<label>" . "Account No:" . "</label>" . "<br />";
echo "<input class='input' class='form-control'  type='text' name='accountno' pattern='([0-9]){8,20}' value='{$row1['accountno']}' />";
echo "</text>";
echo "<br />";
echo "<label>" . "Username:" . "</label>" . "<br />";
echo "<input class='input' class='form-control'  type='text' name='username' pattern='[a-z\d\.]{5,}' value='{$row1['username']}' />";
echo "</text>";
echo "<br />";
echo "<label>" . "Old Password:" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='text' name='password' value=".decryptPassword($row1['password'])." disabled/>";
echo "</text>";
echo "<br />";
echo "<label>" . "New Password:*" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='password' name='password'  required/>";
echo "</password>";
echo "<br />";
echo "<label>" . "Email:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='email' pattern='[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}' value='{$row1['email']}' />";
echo "<br />";
echo "<label>" . "Phone No:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='phoneno' value='{$row1['phoneno']}' />";
echo "<br />";
echo "<label>" . "Card No.:" . "</label>" . "<br />";
echo "<input class='input' class='form-control'  type='text' name='cardno' pattern='([0-9]){16}' value='{$row1['cardno']}' />";
echo "</text>";
echo "<br />";
echo "<label>" . "Old CardType-1:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='cardtype1' value='{$row1['cardtype1']}' disabled/>";
echo "<br />";
echo "<label>" . "New Card Type-1:*" . "</label>" . "<br />";
echo  "<select class='form-control' name='cardtype1' required>
                  <option>Credit Card</option>
                  <option>Debit Card</option>
                  <option>Foreign Currency Card</option>
                  <option>Tarvel Card</option>
                    <option>Gift Card</option>
                      <option>Others</option>
                </select>    <br> ";
echo "<label>" . "Old CardType-2:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='cardtype2' value='{$row1['cardtype2']}' disabled/>";
echo "<br />";
echo "<label>" . "New Card Type-2:*" . "</label>" . "<br />";
echo  "<select class='form-control' name='cardtype2' required>
                    <option>Visa</option>
                  <option>Master Card</option>
                  <option>Rupay</option>
                  <option>Other</option> 
                </select>    <br> ";
echo "<label>" . "Old  Crad Expiry:" . "</label>" . "<br />";
echo"<input class='input' class='form-control' type='text' name='cardexp' value='{$row1['cardexp']}' disabled />";
echo "<br />";
echo "<label>" . "New Card Expiry:" . "</label>" . "<br />";
echo "<input type='date' class ='form-control' name='cardexp'  required><br>";
echo "</date>";        
echo "<label>" . "Old Pin:" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='text' name='cardpin' value=".decryptPassword($row1['cardpin'])." disabled/>";
echo "</text>";
echo "<br />";
echo "<label>" . "New Pin:*" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='password' name='cardpin' pattern='([0-9]){4}'  required/>";
echo "</password>";
echo "<br />";
echo "<label>" . "Old CVV:" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='text' name='cardcvv' value=".decryptPassword($row1['cardcvv'])." disabled/>";
echo "</text>";
echo "<br />";
echo "<label>" . "New CVV:*" . "</label>" . "<br />";
echo "<input class='input' class='form-control' type='password' name='cardcvv' pattern='([0-9]){3}' required/>";
echo "</password>";
echo "<br />";
echo "* Please use the old values for New Account Type, New Password,New Card Type-1,New Card Type-2, New Card Expiry,New Card CVV and New Card Pin if you are not updating!";
echo "<br>";
echo "<input class='submit' type='submit' name='submit' value='Update' />";
echo "</form>";
}
}}
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