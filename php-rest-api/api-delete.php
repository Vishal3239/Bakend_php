<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST,DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data= json_decode(file_get_contents("php://input"),true);

$id = $data['sid'];

$Conn = mysqli_connect("localhost","root","","kashiit") or die("connection fails..");

$sql = "DELETE FROM student WHERE id = {$id}";

mysqli_query($Conn,$sql);

if(mysqli_affected_rows($Conn) > 0){
    echo json_encode([
        "status" => True,
        "message" => "Record Delete Successfully.."
    ]);
}
else {
    echo json_encode([
        "status" => false,
        "message" => "Wrong ID, Record Not Found.."
    ]);
}






?>