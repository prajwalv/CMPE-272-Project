<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(empty($_SESSION["authenticated"]) || $_SESSION["admin"] != 'true') {
    header('Location: /PasswordManager/admin/admin-error.php');
}
?>