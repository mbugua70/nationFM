<?php
require("connection.php");
$output=array();
$success=array();
$failure=array();
$profile_photo_path="pics/";

$record_date = mysqli_real_escape_string ( $connect ,$_POST['record_date']);
// $ba_name = mysqli_real_escape_string ( $connect ,$_POST['ba_name']);
// $ba_phone = mysqli_real_escape_string ( $connect ,$_POST['ba_phone']);
// $ba_region = mysqli_real_escape_string ( $connect ,$_POST['ba_region']);
$engagement = mysqli_real_escape_string ( $connect ,$_POST['engagement']);

    $sql="INSERT INTO  exp_stasoft_engagements (record_date,engagement)
    VALUES ('$record_date','$engagement')";

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
