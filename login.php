<?php

require 'connect.php';

$Email = $_REQUEST["Email"];
$Password = $_REQUEST["Password"];

$response = array();

$login = mysqli_query($conn, "SELECT * From `users` Where 
				`Email`='$Email' AND			 	
			 	`Password`='$Password'");

$result = mysqli_num_rows($login);


if ($result > 0) 
{
    //echo '-----login--------';
    $response["success"] = 1;
    $response["message"] = "sucesss";
    $response["Res"] = "User Login successfully";
    
    while ($row = mysqli_fetch_array($login)) 
    {
        $user_type=$row['UserType'];
        
        if($user_type == "Admin")
        {
            $response["success"] = 1;
            $response["message"] = "success";
            $response["Res"] = "Admin Login";
        }
        else if($user_type == "User")
        {
            $response["success"] = 1;
            $response["message"] = "success";
            $response["Res"] = "User Login";
        }
        else
        {
            $response["success"] = 0;
            $response["message"] = "error";
            $response["Res"] = "Not Login";
        }
    }
} 
else 
{
    //echo '-----loginsadad--------';
    $response["success"] = 0;
    $response["message"] = "error";
    $response["Res"] = "User Not Login successfully";
}
echo json_encode(array("server_responce" => $response));
?>