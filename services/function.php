<?php
ob_start();
function updateLastVisited($service)
{	
	setcookie("service",$_COOKIE["service"].";".$service,time() + (86400 * 30),"/");
	setcookie("timestamp",$_COOKIE["timestamp"].";".date_timestamp_get(date_create()),time() + (86400 * 30),"/");		
}
?>


