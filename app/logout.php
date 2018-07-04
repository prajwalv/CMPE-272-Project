<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["password"]);
unset($_SESSION['logged_in']);
unset($_SESSION['uid']);
unset($_SESSION["authenticated"]);
if(session_destroy())
{
header("Location: /app/index.html");
}
?>