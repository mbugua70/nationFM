<?php
require("connection.php");
$ba=mysqli_real_escape_string($connect,$_POST['c_name']);
$age=mysqli_real_escape_string($connect,$_POST['age']);
$gender=mysqli_real_escape_string($connect,$_POST['gender']);
$phone=mysqli_real_escape_string($connect,$_POST['phone']);
$sku=mysqli_real_escape_string($connect,$_POST['sku']);
$prize=mysqli_real_escape_string($connect,$_POST['prize']);
$current_id=mysqli_real_escape_string($connect,$_POST['current_id']);
$area=mysqli_real_escape_string($connect,$_POST['c_location']);


	$proceed=checkRecord($current_id,$sku,$gender,$age,$prize,$phone);
	
	if (!$proceed) {
	mysqli_query($connect,"INSERT INTO `wheel_player_exp`(`phone`, `date_registered`, `time_registered`, `prize`, `ba`, `area`,  `tid`) VALUES('$phone','$date','$time', '$prize',  '$ba', '$area','$current_id')") or die(mysqli_error($connect));
}
//$response_arr[]=$current_id;




//print_r($response_arr);

$output['response']="success";

$json = json_encode(array("response" => $output));
echo $json;

function checkRecord($current_id,$sku,$gender,$age,$prize,$phone)
{
	global $connect;
	$res=mysqli_query($connect,"SELECT * FROM wheel_player_exp WHERE tid='$current_id' and phone='$phone'");
if (mysqli_num_rows($res)>0) {
	return true;
}
else
{
	return false;
}
}