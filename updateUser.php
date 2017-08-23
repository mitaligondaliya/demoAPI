<?php

require 'connect.php';

$Id = $_REQUEST["Id"];
$Name = $_REQUEST["Name"];
$Email = $_REQUEST["Email"];
$Password = $_REQUEST["Password"];
$Status = $_REQUEST["Status"];

$response = array();
$response["user_array"] = array();

$res = mysqli_query($conn, "Update `users`  SET 
				`Name`='$Name',
				`Email`='$Email',			 	
			 	`Password`='$Password',
                                 `Status`='$Status' where Id=$Id");
if ($res) {

    $response["success"] = 1;
    $response["message"] = "success";
    $response["Res"] = "Update User successfully";
   array_push($response['user_array'],array(
             
             "Name"=>$Name,
             "Email"=>$Email,
             "Password"=>$Password,
             "Status"=>$Status));
} else {
    $response["success"] = 0;
    $response["message"] = "error";
    $response["Res"] = "Not User Update successfully";
}
echo json_encode(array("server_responce" => $response));
?>
