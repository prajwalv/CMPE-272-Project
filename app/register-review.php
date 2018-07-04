<?php
include ('database.php');
if ( isset( $_POST['submit'] ) ){
extract($_POST);
$pid=(int)$pid;
$wid=(int)$wid;
$star=(double)$_POST['rating'];
if($wid<=0 or $wid>4 or $pid<=0 or $pid>10 or $serviceName==null)
{
    echo "<script type='text/javascript'>alert(\"Invalid page!\")</script>";
    echo "<script type='text/javascript'>window.location.href = '/services/service.html';</script>";
}
else{
if($star<0.5)
{
	echo "<script type='text/javascript'>alert(\"Rating cannot be 0!\")</script>";
    echo "<script type='text/javascript'>javascript:history.go(-1)</script>";
}
else{
$insert_query="INSERT INTO prod_review (`wid`,`pid`,`pname`,`star`,`comment`) VALUES('$wid','$pid','$serviceName','$star','$comment')"; 
if ($conn->query($insert_query) === TRUE) 
{
    echo "<script type='text/javascript'>alert(\"Thanks for the review!\")</script>";
    echo "<script type='text/javascript'>javascript:history.go(-2)</script>";
}
else
{
echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();  
}
}}
?>