<?php

require './connect.php';

$response = array();


$file_path = './uploads/';

//$userId = $_REQUEST["userId"];

$extension = strtolower(strrchr($_FILES["uploaded_file"]["name"], "."));
//$target_file = $userId .date('YmdHis') . rand() . $extension;
$target_file = date('YmdHis') . rand() . $extension;

$file_path = $file_path . $target_file;

if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {

    $response["success"] = 1;
    $response["message"] = "success";


    $query = mysqli_query($conn, "Insert into  `user_img` SET `userImage`='$target_file'");

    //$qu = mysqli_query($conn, "UPDATE `user_img` SET `userImage`='$target_file' WHERE `userId`='$userId'");

    if ($query) {
        $response["success"] = 1;
        $response["message"] = "success";
        $response["message1"] = "Uploaded Image Successfully";
    } else {
        $response["success"] = 0;
        $response["message"] = "error";
        $response["message1"] = "Not Uploaded Image Successfully";
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Error";
}
echo json_encode(array("server_responce" => $response));
?>