<?php

require 'connection.php';

$response = array();

$sql = "SELECT * FROM  `table 1`";

$query = mysqli_query($conn, $sql);

$result = mysqli_num_rows($query);

if ($result > 0) {
    // $response["success"] = 1;
    //$response["message"] = "success";


    $response["exam_array"] = array();
//    $response["options"]=array();
//    $response["correct_answers"]=array();



    while ($row = mysqli_fetch_array($query)) {

        //$response1 = array();
        //$response2 = array();
        $no = $row["uni_id"];

        $result_detail = mysqli_query($conn, "SELECT *FROM `table 1` WHERE uni_id = $no");

        while ($row_detail = mysqli_fetch_array($result_detail)) {

            $response1 = array(
                $row_detail['a'],
                $row_detail['b'],
                $row_detail['c'],
                $row_detail['d'],
                $row_detail['e']);
            $response2 = array(
                $row_detail['correct_ans']);
        }

        array_push($response["exam_array"], array(
            
            "id" => $row['no'],
            "question" => $row['que'],
            "explanation" => $row['explanation'],
            "options" => $response1,
            "question_type" => $row['question_type'],
            "option_type" => $row['option_type'],
            "correct_answers" => $response2,
            "reference" => $row['reference']
        ));
    }
} else {
    $response["success"] = 0;
    $response["message"] = "error";
}
echo json_encode(array("server_responce" => $response));
//echo json_encode($response);
?>
