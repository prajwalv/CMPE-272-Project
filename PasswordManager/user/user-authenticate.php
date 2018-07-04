<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
if(empty($_SESSION["authenticated"]) || $_SESSION["user"] != 'true') {
    echo "<script>window.location='/PasswordManager/user/user-error.php'</script>";
}
?>