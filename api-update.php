<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Request-With');

include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$city = $data['scity'];

$query = "UPDATE studentnew SET name='$name', age='$age', city='$city' WHERE id = $id";

if(mysqli_query($con, $query)) {
    echo json_encode(array("message" => 'Record are Updated Successfully', "status" => true));
}else {
    echo json_encode(array("message" => 'Something Went wrong', "status" => false));
}

mysqli_close($con);

?>
