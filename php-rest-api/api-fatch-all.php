<?php



header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = mysqli_connect("localhost","root","","kashiit")
        or die("Connection Failed");

$sql = "SELECT * FROM student";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) > 0){

    $output = mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo json_encode($output);

}else{

    echo json_encode([
        "status" => false,
        "message" => "No Record Found"
    ]);
}





?>