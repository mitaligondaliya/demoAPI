<?php

//include_once('connect.php');
//if ($_SERVER['REQUEST_METHOD'] == "GET") {
//    
//    $name = isset($_REQUEST['name']) ? mysql_real_escape_string($_REQUEST['name']) : "";
//    $email = isset($_REQUEST['email']) ? mysql_real_escape_string($_REQUEST['email']) : "";
//    $password = isset($_REQUEST['pwd']) ? mysql_real_escape_string($_REQUEST['pwd']) : "";
//    $status = isset($_REQUEST['sts']) ? mysql_real_escape_string($_REQUEST['sts']) : "";
//
//    
//    $sql = "INSERT INTO `testdb`.`users` (`ID`, `Name`, `Email`, `Password`, `Status`) VALUES (NULL, '$name', '$email', '$password', '$status');";
//    $query = mysql_query($sql);
//
//    if ($query) 
//    {
//        $json = array("status" => 1, 
//            "msg" => "Done User added!",
//            "name" => $name,
//             "email"=>$email,
//            "pwd"=>$password,
//            "sts"=>$status);
//    } else {
//        $json = array("status" => 0, "msg" => "Error adding user!");
//    }
//} else 
//  {
//    $json = array("status" => 0, "msg" => "Request method not accepted");
//  }
//
//@mysql_close($conn);
//
//header('Content-type: application/json');
//echo json_encode($json);



require 'connect.php';

$Name = $_REQUEST["Name"];
$Email = $_REQUEST["Email"];
$Password = $_REQUEST["Password"];
$Status = $_REQUEST["Status"];

$response = array();
$response["user_array"] = array();

$create = mysqli_query($conn, "INSERT INTO `users`  SET 
				`Name`='$Name',
				`Email`='$Email',			 	
			 	`Password`='$Password',
                                 `Status`='$Status'");


if ($create) {

    $response["success"] = 1;
    $response["message"] = "success";
    $response["Res"] = "Insert User successfully";
    
    
     array_push($response['user_array'],array(
             
             "Name"=>$Name,
             "Email"=>$Email,
             "Password"=>$Password,
             "Status"=>$Status));
    
    
} else {
    $response["success"] = 0;
    $response["message"] = "error";
    $response["Res"] = "Not User Insert successfully";
}
echo json_encode(array("server_responce" => $response));
?>