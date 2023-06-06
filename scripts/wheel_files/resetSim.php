<?php
header('Content-Type: application/json');
require("connection.php");

$res=mysqli_query($connect,"SELECT name as text, fillStyle  FROM commodities WHERE remaining_items>0 and category='SIM'") or die(mysqli_error($connect)); 

//$items=mysqli_num_rows($res);
if (mysqli_num_rows($res)>0) 
{

	$remaining_items;
 while($row=mysqli_fetch_array($res))
 {
     $remaining_items[] = array(
      
      'fillStyle' => $row['fillStyle'],
      'text' => $row['text']
   );
   
//	$remaining_items[]=$row; 	
 }

//echo json_encode($remaining_items);
$json= json_encode($remaining_items);



echo $json;
}
else
{
//	$result= -2;//user exists on the dbb
echo "Null";
}




