<?php

require "wmo_connection.php";
 
$response=array();  
   
    
	$file_path = "../../uploads/";
	
	$userid = $_REQUEST["user_id"];
	
	
	$extension= strtolower(strrchr($_FILES["uploaded_file"]["name"],"."));
	$target_file = $userid.date('YmdHis').rand().$extension;
     
   	$file_path = $file_path.$target_file;
   	 
    	if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path))
	{
			$response["success"] = 1;
			$response["message"]="success";
			
        		
					 $qu=mysqli_query($con,"UPDATE `users` SET `userimage`='$host$target_file' WHERE `user_id`='$userid'");
					
					 if($qu)
					 {
												
						$response["success"]=1;
						$response["message"]="success";
						$response["message1"]="Uploaded Image Successfully";					
			
					 }
					 else
					 {
					 	$response["success"] = 0;
					 	$response["message"]="error";
						$response["message1"]="Not Uploaded Image Successfully";
						
					 }
		
		
   	 } 
	else
	{
		$response["success"] = 0;
        $response["message"]="Error";        	
    }
	echo json_encode(array("server_responce"=>$response));
 ?>
  
