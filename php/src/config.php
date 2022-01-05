<?php



$server_name ="db";
$db_username = "admin";
$db_password = "admin_1234";
$db_name = "db_sia";


$connection = mysqli_connect("$server_name","$db_username","$db_password");
$dbconfig = mysqli_select_db($connection,$db_name);

if($dbconfig)
{
}
else
{
 echo "Database Connection Error";
}

?>