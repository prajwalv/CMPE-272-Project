<?php
function cookie($arg){
	$filtered=array_filter(explode(";",$_COOKIE[$arg]));
	$count=count($filtered);
	$length=sizeof($filtered);
	$filtered=array_reverse($filtered);
	$unique_array=array_unique($filtered);
	$most_rec=array_slice(array_values($unique_array),0,5,true);
	$arr=array();
	foreach ($most_rec as $mkey => $mvalue) 
	{
		array_push($arr,$mvalue);
	}
	return $arr;
}
$arr1=cookie('service');
$arr2=cookie('timestamp');
$cookie_array = array_combine($arr1 ,$arr2);
echo json_encode($cookie_array);
?>
