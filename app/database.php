<?php
  $servername ="prajwalvenkatesh.com";
  $uname = "prajwalv_app";
  $pass = "prajwal@93";
  $dbname = "prajwalv_app";
  //$conn = new mysqli($servername, $uname, $pass, $dbname);
  $conn = mysqli_connect($servername,$uname,$pass,$dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
?>
