<?php
require("connection.php");
$output=array();
$success=array();
$failure=array();
$profile_photo_path="pics/";
$count=0;
$fail=0;
$record_date = mysqli_real_escape_string ( $connect ,$_POST['record_date']);
$ba_name = mysqli_real_escape_string ( $connect ,$_POST['ba_name']);
$ba_phone = mysqli_real_escape_string ( $connect ,$_POST['ba_phone']);
$ba_region = mysqli_real_escape_string ( $connect ,$_POST['ba_region']);
$batch_number=$ba_phone."_".uniqid();
//$sales = mysqli_real_escape_string ( $connect ,$_POST['sales']);

$variant_key=['Stasoft Ultra Concentrate Lavender Dream','Stasoft Ultra Concentrate Ocean Fresh','Stasoft Aromatherapy','Stasoft Dilute Range'];
$sku_key=['1L','500ML','2L'];

$len=count($variant_key);
for($i=1; $i<=4; $i++)
{
    $num=1;
    $variant = $_POST["v".$i];
    $sku =$_POST["v".$i."_sku".$num];
    $opening_stock =$_POST["v".$i."_sku".$num."_sk_opening"];
    $closing_stock = $_POST["v".$i."_sku".$num."_sk_closing"];
    $sales = $_POST["v".$i."_sku".$num."_sk_sales"];

    $sql="INSERT INTO  exp_stasoft_data (record_date, ba_name, ba_phone, ba_region, sku, opening_stock, closing_stock, sales,t_date,t_time,variant,batch_number) 
    VALUES ('$record_date', '$ba_name', '$ba_phone', '$ba_region', '$sku', '$opening_stock', '$closing_stock', '$sales', '$date', '$time', '$variant','$batch_number')";
    mysqli_query($connect,$sql) or die(mysqli_error($connect));
if (mysqli_affected_rows($connect)>0) 
        {
        $count++; 
        }
        else
        {
        $fail++;
        
        }

   // echo "SKU1 ".$sql."<BR>";

    if($i<3)
{
    $num=2;
    $variant = $_POST["v".$i];
    $sku =$_POST["v".$i."_sku".$num];
    $opening_stock =$_POST["v".$i."_sku".$num."_sk_opening"];
    $closing_stock = $_POST["v".$i."_sku".$num."_sk_closing"];
    $sales = $_POST["v".$i."_sku".$num."_sk_sales"];

    $sql="INSERT INTO  exp_stasoft_data (record_date, ba_name, ba_phone, ba_region, sku, opening_stock, closing_stock, sales,t_date,t_time,variant,batch_number) 
    VALUES ('$record_date', '$ba_name', '$ba_phone', '$ba_region', '$sku', '$opening_stock', '$closing_stock', '$sales', '$date', '$time', '$variant', '$batch_number')";
    mysqli_query($connect,$sql) or die(mysqli_error($connect));
if (mysqli_affected_rows($connect)>0) 
        {
        $count++; 
        }
        else
        {
        $fail++; 
        }

  //  echo "SKU2 ".$sql."<BR>";
}

}
if ($count>0) 
        {
        $output['response']="success"; 
        $sql="INSERT INTO `exp_stasoft_batch_sales`( `s_date`, `s_time`, `batch_id`, `ba_name`, `ba_phone`, `ba_region`)
    VALUES ('$record_date', '$time', '$batch_number', '$ba_name', '$ba_phone', '$ba_region')";
    mysqli_query($connect,$sql) or die(mysqli_error($connect)); 
        }
        else
        {
        $output['response']="fail";
        
        }

        

$output['success']=$count;
$output['failure']=$fail;
$json = json_encode($output);
echo $json;
exit;







?>