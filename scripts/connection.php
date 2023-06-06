 <?php
  //error_reporting(0);
$host_name = 'localhost';
$database = 'exp_stasoft_';
$user_name = 'root';   
$password   = "";
 
 
    date_default_timezone_set('Africa/Nairobi');
               $date = date('Y-m-d');
               $time = date('H:i a');             
                $finalTime=$date."<br>".$time;
    $connect = mysqli_connect($host_name, $user_name, $password, $database);
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
 ?>
