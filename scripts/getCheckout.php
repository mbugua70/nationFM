<?php 
require("connection.php");
$ba_name = mysqli_real_escape_string ( $connect ,$_POST['ba_name']);
$ba_phone = mysqli_real_escape_string ( $connect ,$_POST['ba_phone']);
$ba_region = mysqli_real_escape_string ( $connect ,$_POST['ba_region']);
$query="SELECT * FROM exp_stasoft_check_out  WHERE ba_name='$ba_name' AND ba_phone='$ba_phone' AND ba_region='$ba_region' AND record_date='$date' ";
$arr=array();
$res=mysqli_query($connect,$query) or die (mysqli_error($connect));
 while($row2=mysqli_fetch_array($res))
            {
				$arr[] = $row2;
            }
            $output['items']=$arr;
         //   $output['response']=$arr;
$json = json_encode( $output);
echo $json;
exit;
                            ?>