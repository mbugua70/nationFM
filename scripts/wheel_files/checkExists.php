<?php
require("connection.php");
$number=$_POST['num'];
$age=$_POST['age'];
$sku=$_POST['sku'];
$gender=$_POST['gender'];
$ba=$_POST['ba'];
$loc=$_POST['loc'];
$number=str_replace(" ","",$number);
$result="";
$res="";


	$res=mysqli_query($connect,"SELECT * FROM player WHERE number='$number' AND area='$area'") or die(mysqli_error($connect)); 


$count=mysqli_num_rows($res);

 if ($count>0) 
{
	$result= 1;//user doesnt exist and may naot have participated
}
else if($count>0)
{
	$row=mysqli_fetch_array($res);
	$select_status=$row['select_status'];
	if ($select_status==2) {
		$result= 1;//user exists on the dbb and has already collected present
		$prize=$row['prize'];
	}
	else
	{
		$result=1;//okay..proceed
	}
	

}
echo $result;