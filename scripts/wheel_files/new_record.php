<?php
require("connection.php");
$ba=mysqli_real_escape_string($connect,$_POST['c_name']);
$json=$_POST['json'];
$area=mysqli_real_escape_string($connect,$_POST['c_location']);
$json_arr=json_decode($json,true);
$response_arr= array();
$j_len=count($json_arr);

for ($i=0; $i < $j_len; $i++) { 
	$sku=$json_arr[$i]['sku'];
	$phone=$json_arr[$i]['phone'];
	$gender=$json_arr[$i]['gender'];
	$age=$json_arr[$i]['age'];
	$prize=$json_arr[$i]['prize'];
	$current_id=$json_arr[$i]['current_id'];

	$proceed=checkRecord($current_id,$sku,$gender,$age,$prize,$phone);
	
	if (!$proceed) {
	mysqli_query($connect,"INSERT INTO `wheel_player_exp`(`phone`, `date_registered`, `time_registered`, `prize`, `ba`, `area`, `sku`, `age`, `gender`, `tid`) VALUES('$phone','$date','$time', '$prize',  '$ba', '$area',  '$sku','$age','$gender','$current_id')") or die(mysqli_error($connect));
}
$response_arr[]=$current_id;


}

//print_r($response_arr);

$output['response']="success";

$json = json_encode(array("response" => $output,"ids" => json_encode($response_arr)));
echo $json;

function checkRecord($current_id,$sku,$gender,$age,$prize,$phone)
{
	global $connect;
	$res=mysqli_query($connect,"SELECT * FROM wheel_player_exp WHERE tid='$current_id' and phone='$phone' ");
if (mysqli_num_rows($res)>0) {
	return true;
}
else
{
	return false;
}
}