<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Request-With');

include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];


if ($name != '' || $age != '' || $city != '') {
    $query = "INSERT INTO studentnew (name, age, city) VALUE('$name', '$age', '$city')";

    if (mysqli_query($con, $query)) {
        echo json_encode(array("message" => 'Record are added Successfully', "status" => true));
    } else {
        echo json_encode(array("message" => 'Something Went wrong', "status" => false));
    }
} else {
    echo json_encode(array("message" => 'All Fileds Must Be Filled', "status" => false));
}




mysqli_close($con);
