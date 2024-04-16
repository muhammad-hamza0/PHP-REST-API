<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Request-With');

include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

$query = "DELETE FROM studentnew WHERE id = $id";

if(mysqli_query($con, $query)) {
    echo json_encode(array("message" => 'Record Deleted Successfully', "status" => true));
}else {
    echo json_encode(array("message" => 'Something Went wrong', "status" => false));
}

mysqli_close($con);

?>
