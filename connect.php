<?php
//
//$conn = mysql_connect("localhost", "root", "") or die("Could not connect to database") . mysql_error();
//mysql_select_db("testdb") or die("Could not Select  database") . mysql_error();
//
?>

<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "testdb";
//$conn=null;
$conn = mysqli_connect($host, $user, $password, $database) or die("Could not connect to database");

//if(!$conn)
//{	
//	echo "connection failed";
//}

if (mysqli_connect_errno())
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>


<?php
//	define (DB_USER, "root");
//	define (DB_PASSWORD, "");
//	define (DB_DATABASE, "testdb");
//	define (DB_HOST, "localhost");
//	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
?>
