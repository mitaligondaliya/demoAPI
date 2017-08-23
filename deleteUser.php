<?php

require 'connect.php';

$Id = $_REQUEST["Id"];

$response = array();

$res = mysqli_query($conn, "DELETE From users Where Id=$Id");


if ($res) {

    $response["success"] = 1;
    $response["message"] = "success";
    $response["Res"] = "User Deleted successfully";

} else {
    $response["success"] = 0;
    $response["message"] = "error";
    $response["Res"] = "Not User Deleted successfully";
}
echo json_encode(array("server_responce" => $response));
?>
