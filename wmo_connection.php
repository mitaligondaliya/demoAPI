<?php
$username="wkoutdom_sammad";
$password="13Arid649";
$servername="31.220.17.249";
$db_name="wkoutdom_myworkoutappdb";
$con=null;
$con = mysqli_connect($servername,$username,$password,$db_name);

date_default_timezone_set("UTC");
$current_date_time=date('Y-m-d H:i:s');
$current_time=date("H:i:s"); 
$host = "http://www.wkoutdomain.com/uploads/";

if(!$con)
{	
	echo "connection failed";
}
?>