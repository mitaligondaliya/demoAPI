<?php

require 'connect.php';

$response = array();
$response["user_array"] = array();

$Name = $_REQUEST['Name'];
$Email = $_REQUEST['Email'];
$Password = $_REQUEST['Password'];
$Status = $_REQUEST['Status'];

//$query="insert into `users` set  `Name`='$Name',`Email`='$Email',`Password`='$Password',`Status`='$Status'";
$email_exist = "Select * from users where Email='$Email'";
//$res= mysqli_query($conn, $query);
$res = mysqli_query($conn, $email_exist);

$emailNumRow = mysqli_num_rows($res);

if ($emailNumRow > 0) {
    $response['success'] = 0;
    $response['message'] = "error";
    $response['res'] = "Email Already Exist";
} else {
    $response['success'] = 1;
    $response['message'] = "success";
    $response['res'] = "Email not exist";

    $insert = "insert into `users` set  `Name`='$Name',`Email`='$Email',`Password`='$Password',`Status`='$Status'";
    
    $result = mysqli_query($conn, $insert);

    if ($result) {
        $response['success'] = 1;
        $response['message'] = "success";
        $response['res'] = 'User added successfully';
        
        array_push($response['user_array'],array(
             "Name"=>$Name,
             "Email"=>$Email,
             "Password"=>$Password,
             "Status"=>$Status));
    } else {

        $response['success'] = 0;
        $response['message'] = "Failed";
        $response['res'] = 'User not added successfully';
    }
}
echo json_encode(array('server_response' => $response));
?>
