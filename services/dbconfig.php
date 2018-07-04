<?php
/**
 * Created by PhpStorm.
 * User: Abraham
 * Date: 10/17/2016
 * Time: 4:46 PM
 */
define('DB_SERVER', 'abrahamwilliam007.com:3306');
define('DB_USERNAME', 'abrahar1_abraham');
define('DB_PASSWORD', 'abraham');
define('DB_DATABASE', 'abrahar1_abrahamdb');
//$servername = "localhost:3306";
//$username = "abrahar1_abraham";
//$password = "abraham";
//$dbname = "abrahar1_abrahamdb";
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
?>