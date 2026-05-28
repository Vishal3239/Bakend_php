<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$Conn = mysqli_connect("localhost","root","","kashiit") or die("connection fails..");

$sql = "SELECT * FROM student";

$result = mysqli_query($Conn,$sql);

if(mysqli_num_rows($result) > 0){
    $output = mysqli_fetch_all($result);
    echo json_encode($output);
}
else {
    echo json_encode([
        "status" => false,
        "message" => "no record found"
    ]);
}






?>