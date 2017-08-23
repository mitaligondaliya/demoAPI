<?php

//require "wmo_connection.php";


require './wmo_notification_functions.php';

$db = new DB_Functions();

$user_id=$_REQUEST["user_id"];
$friend_id=$_REQUEST["friend_id"];

$response=array();

$exist_email=mysqli_query($con,"SELECT * FROM `work_block_user` WHERE `user_id`='$user_id' AND `friend_id`='$friend_id'");

$exist_email_NumRow=mysqli_num_rows($exist_email);

	if($exist_email_NumRow>0)
	{
		$response["success"] = 0;
		$response["message"] = "error";
		$response["message1"] = "Already Block User";
				
		$result=mysqli_query($con,"DELETE FROM `work_block_user` WHERE `user_id`='$user_id' AND `friend_id`='$friend_id'");
		
		if($result)
		{
			
			$response["success"] = 1;
			$response["message"] = "success";
			$response["message1"] = "UnBlock User successfully";
			
					
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "error";
			$response["message1"] = "Not UnBlock User successfully";
			
		} 
	}
	else
	{
	
		$response["success"] = 1;
		$response["message"] = "success";
		
		
		$result=mysqli_query($con,"INSERT INTO `work_block_user`  SET 
				`user_id`='$user_id',
				`friend_id`='$friend_id',			 	
			 	`work_date_time`='$current_date_time'
			 	");
		
		if($result)
		{
			$response["success"] = 1;
			$response["message"] = "success";
			$response["message1"] = "Block user successfully";
			
		}
		else
		{
			$response["success"] = 0;
			$response["message"] = "error";
			$response["message1"] = "Not Block user successfully";
			
		}
	}	





echo json_encode(array("server_responce"=>$response));

?>
