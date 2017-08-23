<?php
require 'connect.php';

//$sid=$_REQUEST['sid'];

$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$address = $_REQUEST["address"];
$contact = $_REQUEST["contact"];
$email = $_REQUEST["email"];
$std = $_REQUEST["std"];

$mid=$_REQUEST['mid'];
$english = $_REQUEST['english'];
$gujarati = $_REQUEST['gujarati'];
$maths = $_REQUEST['maths'];
$science = $_REQUEST['science'];
$sid = $_REQUEST['sid'];

$response = array();
$response["student_array"] = array();
$response["marks_array"] = array();

$sql = "Update `student`  SET `firstname`='$firstname',`lastname`='$lastname',`address`='$address',`contact`='$contact',`email`='$email',`std`='$std' where sid=$sid;";
$sql .= "Update `mark`  SET `english`='$english',`gujarati`='$gujarati',`maths`='$maths',`science`='$science',`sid`='$sid' where mid=$mid;";

$create = mysqli_multi_query($conn, $sql);

if ($create) {

    $response["success"] = 1;
    $response["message"] = "success";
    $response["Res"] = "Update Student and Marks Successfully";
    
    array_push($response['student_array'], array(
        "firstname" => $firstname,
        "lastname" => $lastname,
        "address" => $address,
        "contact" => $contact,
        "email" => $email,
        "std" => $std));
    
    array_push($response['marks_array'], array(
        "english" => $english,
        "maths" => $maths,
        "gujarati" => $gujarati,
        "science" => $science,
        "sid" => $sid));
} else {
    $response["success"] = 0;
    $response["message"] = "error";
    $response["Res"] = "Student and Marks not Update Successfully";
}
echo json_encode(array("server_responce" => $response));
?>