<?php

require 'connect.php';

$sid = $_REQUEST["sid"];

$response = array();

$sql = "DELETE From student Where sid=$sid";

$res = mysqli_query($conn, $sql);

if ($res) {

    $response["success"] = 1;
    $response["message"] = "success";
    $response["Res"] = "Student Deleted successfully";
} else {
    $response["success"] = 0;
    $response["message"] = "error";
    $response["Res"] = "Not Student Deleted successfully";
}
echo json_encode(array("server_responce" => $response));
?>