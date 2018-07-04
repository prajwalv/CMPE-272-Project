<?php
  $servername ="prajwalvenkatesh.com";
  $uname = "prajwalv_root";
  $pass = "prajwal@93";
  $dbname = "prajwalv_passwordmanager";
  $errors = array();
  $conn = new mysqli($servername, $uname, $pass, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
?>