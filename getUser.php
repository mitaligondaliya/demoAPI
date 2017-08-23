<?php

require 'connect.php';

//$Name = $_REQUEST["Name"];
//$Email = $_REQUEST["Email"];
//$Password = $_REQUEST["Password"];
//$Status = $_REQUEST["Status"];
//$Id=$_REQUEST["Id"];


$response = array();


//$result = mysqli_query($conn, "SELECT * From users");
//$sql = "SELECT * FROM users where Id=$Id";
//$sql2="SELECT * FROM  `users`";


$res = mysqli_query($conn, "SELECT * FROM  `users`");

//$sql2_result=mysqli_query($conn,$sql2);

$sql2_NumRow = mysqli_num_rows($res);

if ($sql2_NumRow > 0) {
    $response["success"] = 1;
    $response["message"] = "success";


    $response["user_array"] = array();

    while ($row = mysqli_fetch_array($res)) {
        array_push($response["user_array"], array(
            "Id" => $row['Id'],
            "Name" => $row['Name'],
            "Email" => $row['Email'],
            "Password" => $row['Password'],
            "Status" => $row['Status']));
    }
} else {
    $response["success"] = 0;
    $response["message"] = "error";
}
echo json_encode(array("server_responce" => $response));
//echo json_encode($response);
// Check if there are results
//if ($result = mysqli_query($conn, $sql2))
//{
// If so, then create a results array and a temporary one
// to hold the data
//	$resultArray = array();
//	$tempArray = array();
// Loop through each row in the result set
//	while($row = $result->fetch_object())
//	{
// Add each row into our results array
//		$tempArray = $row;
//	    array_push($resultArray, $tempArray);
//	}
// Finally, encode the array to JSON and output the results
//	echo json_encode($resultArray);
//}
// Close connections
//mysqli_close($conn);
//if ($result) {
//    $response["success"] = 1;
//    $response["message"] = "success";
//    $response["Res"] = "Successfully selected";
//    $response["Name"] = $Name;
//    $response["Email"] = $Email;
//    $response["Password"] = $Password;
//    $response["Status"] = $Status;
//} else {
//    $response["success"] = 0;
//    $response["message"] = "error";
//    $response["Res"] = "Failed";
//}
//echo json_encode(array("server_responce" => $response));
?>
