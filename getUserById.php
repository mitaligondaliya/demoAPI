<?php

 require 'connect.php';
 
 $Id=$_REQUEST["Id"];
 
 $response=array();
 
 $sql="select * from users where Id=$Id";
 
 $query= mysqli_query($conn, $sql);
 $res= mysqli_num_rows($query);
 
 if($res>0)
 {
     $response['success']=1;
     $response['message']="success";
     
     $response['user_array']=array();
     
     while($row= mysqli_fetch_array($query))
     {
         array_push($response['user_array'],array(
             "Id"=>$row["Id"],
             "Name"=>$row["Name"],
             "Email"=>$row["Email"],
             "Password"=>$row["Password"],
             "Status"=>$row["Status"]));
     }
 }
 else
 {
     $response["success"]=0;
     $response["message"]="error";
     
 }
 echo json_encode(array('server_response'=>$response));
?>
