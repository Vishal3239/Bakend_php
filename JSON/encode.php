<?php

$conn = mysqli_connect("localhost","root","","college-project") or die("connection faild");

$sql = "SELECT * FROM `inter`";

$result = mysqli_query($conn,$sql) or die("query faild");

$output = mysqli_fetch_all($result,MYSQLI_ASSOC);

// echo "<pre>";
// print_r($output);
// echo "</pre>";

echo json_encode($output);






?>