<?php


header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');

$data= json_decode(file_get_contents("php://input"),true);

$id = $data['sid'];
$name = $data['sname'];
$age = $data['sage'];
$course = $data['scourse'];
$city = $data['scity'];


$Conn = mysqli_connect("localhost","root","","kashiit") or die("connection fails..");

$sql = "UPDATE student SET Name = '{$name}' , Age = '{$age}', Course = '{$course}', City = '{$city}' 
WHERE id = {$id} ";

if(mysqli_query($Conn,$sql)){
    echo json_encode([
        "status" => True,
        "message" => "Record Added Successfully.."
    ]);
}
else {
    echo json_encode([
        "status" => false,
        "message" => "Record Not Added . "
    ]);
}






?>