<?php
@session_start();
require("connection.php");
$number=$_POST['num'];
$prize=$_POST['prize'];
//$area=$_POST['area'];
//$bid=$_POST['bid'];

$number=str_replace(" ","",$number);
$result="";

if(!isset($_SESSION['area']))
{
    echo 4;
    exit;
}
else
{
 $bid=$_SESSION['bid'];
 $area=$_SESSION['area'];   
}


//update commodities
//echo $prize;
$res=mysqli_query($connect,"SELECT * FROM commodities_nai WHERE name='$prize' AND area='$area'") or die(mysqli_error($connect));
$row=mysqli_fetch_array($res);
$remaining_items=$row['remaining_items'];
if ($remaining_items>1) 
{
	
	$sql="UPDATE commodities_nai SET remaining_items=remaining_items-1 WHERE name='$prize' AND area='$area'";
	mysqli_query($connect,$sql); 
	$result=updateSTuff();
}
elseif ($remaining_items==1) 
{
	$result=updateSTuff();
	$sql="UPDATE commodities_nai SET remaining_items=remaining_items-1 WHERE name='$prize' AND area='$area'";
	mysqli_query($connect,$sql);
	$result= -4;	// last item has been picked
}
else if($remaining_items<1)
{
	$result= -5; // no more Items
}
	


echo $result;
function updateSTuff()
{
	global $connect,$time,$number,$prize,$date, $area,$bid;
	$res="";

	$res=mysqli_query($connect,"INSERT INTO  extreme_player (`number`, `date_registered`, `time_registered`, `prize`, `select_status`, `ba`, `area`)  VALUES('$number','$date','$time','$prize', '2','$bid','$area') ") or die(mysqli_error($connect));

	if (mysqli_affected_rows($connect)>0) 
	{
		return 1;
	}
	else
	{
		return 0;
	}
}



