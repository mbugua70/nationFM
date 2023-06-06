<?php
@session_start();
require("connection.php");
$code=$_GET['code'];
$username=$_GET['username'];


//$number=str_replace(" ","",$number);
$result=0;

$res=mysqli_query($connect,"SELECT * FROM extreme_ba WHERE username='$username' AND code='$code'") or die(mysqli_error($connect)); 
$count=mysqli_num_rows($res);

if($count>0)
{
	$row=mysqli_fetch_array($res);	
	$_SESSION['username']=$row['username'];
	$_SESSION['area']=$row['area'];
		$_SESSION['bid']=$row['id'];
	$_SESSION['LOGGED']=true;
	$result=1;
}
else
{
	$result=0;
	$_SESSION['LOGGED']=false;
}
echo $result;
