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
// $merch = mysqli_real_escape_string ( $connect ,$_POST['merch']);
// $merch_org = mysqli_real_escape_string ( $connect ,$_POST['merch_org']);


// $merch_bits=explode(",", $merch);
// $merch_org_bits=explode(",", $merch_org);
$added=0;
// $num=count($merch_bits);
// for ($i=0; $i < $num; $i++) {

// }

$merch_bits = 0;
if ($merch_bits === 0) {
     $sql="INSERT INTO  exp_stasoft_merch (record_date)
VALUES ('$record_date')";
mysqli_query($connect,$sql) or die(mysqli_error($connect));
if (mysqli_affected_rows($connect)>0)
   {
   $added++;
   }
}

//echo $added;


        if ($added>0)
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
