<?php
require("connection.php");
$output=array();
$success=array();
$failure=array();
$profile_photo_path="pics/";

$record_date = mysqli_real_escape_string ( $connect ,$_POST['record_date']);
$ba_name = mysqli_real_escape_string ( $connect ,$_POST['ba_name']);
$ba_phone = mysqli_real_escape_string ( $connect ,$_POST['ba_phone']);
$ba_region = mysqli_real_escape_string ( $connect ,$_POST['ba_region']);
$sales = mysqli_real_escape_string ( $connect ,$_POST['sales']);
$variant = mysqli_real_escape_string ( $connect ,$_POST['variant']);
$sku = mysqli_real_escape_string ( $connect ,$_POST['sku']);
$opening_stock = mysqli_real_escape_string ( $connect ,$_POST['opening_stock']);
$closing_stock = mysqli_real_escape_string ( $connect ,$_POST['closing_stock']);

    $sql="INSERT INTO  exp_stasoft_data (record_date, ba_name, ba_phone, ba_region, sku, opening_stock, closing_stock, sales,t_date,t_time,variant) 
    VALUES ('$record_date', '$ba_name', '$ba_phone', '$ba_region', '$sku', '$opening_stock', '$closing_stock', '$sales', '$date', '$time', '$variant')";

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