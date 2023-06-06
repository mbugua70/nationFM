<?php
require("connection.php");
$output=array();
$success=array();
$failure=array();
$profile_photo_path="pics/";

$re_name = mysqli_real_escape_string ($connect, $_POST['re_name']);
$re_phone = mysqli_real_escape_string($connect,$_POST['re_phone']);
$sql="INSERT INTO  exp_stasoft_registration (re_name,re_phone)
    VALUES ('$re_name','$re_phone')";

mysqli_query($connect,$sql) or die(mysqli_error($connect));

if (mysqli_affected_rows($connect)>0)
{
$output['response']="success";
}
else
{
$output['response']="fail";

}

$output['success']=$success;
$output['failure']=$failure;
$json = json_encode($output);
echo $json;
exit;

?>
