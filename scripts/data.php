<?php
require("connection.php");
$output=array();
$success=array();
$failure=array();
$profile_photo_path="pics/";

$record_date = mysqli_real_escape_string ($connect, $_POST['record_date']);
$da_name = mysqli_real_escape_string($connect,$_POST['da_name']);
$da_phone = mysqli_real_escape_string($connect,$_POST['da_phone']);
$da_tvsection = mysqli_real_escape_string($connect,$_POST['da_tvsection']);

$sql="INSERT INTO  exp_stasoft_data (record_date,da_name,da_phone,da_tvsection)
VALUES ('$record_date','$da_name','$da_phone','$da_tvsection')";

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
