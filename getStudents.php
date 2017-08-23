<?php

require 'connect.php';

$response = array();

$sql = "select * from student";

$query = mysqli_query($conn, $sql);

$res = mysqli_num_rows($query);

if ($res > 0) {

    $response['success'] = 1;
    $response['message'] = 'success';

    $response['Student'] = array();

    while ($row = mysqli_fetch_array($query)) {
        $response1 = array();

        $sid = $row["sid"];

        $result_detail = mysqli_query($conn, "SELECT *FROM student WHERE sid = $sid");

        while ($row_detail = mysqli_fetch_array($result_detail)) {

            $response2 = array();

            $result_marks = mysqli_query($conn, "SELECT *FROM mark WHERE sid = $sid");

            while ($row_mark = mysqli_fetch_array($result_marks)) {

                array_push($response2, array(
                    "english" => $row_mark['english'],
                    "maths" => $row_mark['maths'],
                    "gujarati" => $row_mark['gujarati'],
                    "science" => $row_mark['science']
                ));
            }

            array_push($response1, array(
                "address" => $row_detail['address'],
                "contact" => $row_detail['contact'],
                "email" => $row_detail['email'],
                "Marks" => $response2
            ));
        }
        array_push($response['Student'], array(
            "sid" => $row['sid'],
            "firstname" => $row['firstname'],
            "lastname" => $row['lastname'],
            "std" => $row['std'],
            "PersonalDetail" => $response1
        ));
    }
} else {
    $response["success"] = 0;
    $response["message"] = "error";
}
//echo json_encode(array("server_response" => $response));
echo json_encode($response);
?>

