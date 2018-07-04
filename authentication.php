<?php
session_start();
if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
     echo "<script>window.location='display-error.php'</script>";

}
?>