<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Header: Access-Control-Allow-Header, Content-Type, Access-Control-Allow-Origin, Access-Control-Allow-Methods, Authorization, X-Request-With');

include 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

$id = $data['id'];

$query = "SELECT * FROM studentnew WHERE id = $id";

$result = mysqli_query($con, $query) or die('Query Failed');

if(mysqli_num_rows($result) > 0) {
    $output = json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    echo $output;
}else {
    echo json_encode(array("message" => 'No Record Found', "status" => false));
}   

mysqli_close($con);

?>
