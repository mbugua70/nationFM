<?php 
require("connection.php");
$query="SELECT * FROM exp_merch_stasoft  ORDER BY name ASC";
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