<?php

$conn = mysqli_connect("localhost","root","","college-project") or die("connection faild");

$sql = "SELECT * FROM `inter`";

$result = mysqli_query($conn,$sql) or die("query faild");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

$json_data = json_encode($output);

$file_name = "my-". date("d-m-Y").".json";
if(file_put_contents("json/{$file_name}",$json_data)){
    echo  $file_name."file created";
}else{
    echo "file can not create";
}


?>