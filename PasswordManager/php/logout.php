<?php
include ($_SERVER['DOCUMENT_ROOT'].'/PasswordManager/user/encryption.php');
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION["email"]);
$uid=urlencode(encryptPassword($_SESSION['uid']));
if(session_destroy())
{
header("Location: /PasswordManager/review.php?logoffUserAttributeTemp=$uid");
}
?>