<?php

require 'connect.php';

$firstname = $_REQUEST["firstname"];
$lastname = $_REQUEST["lastname"];
$address = $_REQUEST["address"];
$contact = $_REQUEST["contact"];
$email = $_REQUEST["email"];
$std = $_REQUEST["std"];

$english = $_REQUEST['english'];
$gujarati = $_REQUEST['gujarati'];
$maths = $_REQUEST['maths'];
$science = $_REQUEST['science'];
$sid = $_REQUEST['sid'];

$response = array();
$response["student_array"] = array();
$response["marks_array"] = array();
//$sql="INSERT INTO `student`  SET 
//				`firstname`='$firstname',
//				`lastname`='$lastname',			 	
//			 	`address`='$address',
//                                 `contact`='$contact',
//                                  `email`='$email',
//                                 `std`='$std'; 
//                                     
//                                INSERT INTO `mark`  SET 
//				`english`='$english',
//				`gujarati`='$gujarati',			 	
//			 	`maths`='$maths',
//                                 `science`='$science',
//                                  `sid`='$sid'";

$sql = "INSERT INTO `student`  SET `firstname`='$firstname',`lastname`='$lastname',`address`='$address',`contact`='$contact',`email`='$email',`std`='$std';";
$sql .= "INSERT INTO `mark`  SET `english`='$english',`gujarati`='$gujarati',`maths`='$maths',`science`='$science',`sid`='$sid';";

$create = mysqli_multi_query($conn, $sql);

if ($create) {

    $response["success"] = 1;
    $response["message"] = "success";
    $response["Res"] = "Insert Student and Marks Successfully";
    
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
    $response["Res"] = "Student and Marks not Insert Successfully";
}
echo json_encode(array("server_responce" => $response));
//echo json_encode($response);

?>

