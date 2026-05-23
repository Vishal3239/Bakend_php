<?php

$conn = mysqli_connect("localhost", "root", "", "college-project") or die("connection feild");
$sql = "SELECT * FROM `gender`";
$result = mysqli_query($conn, $sql);

if(!$result){
    echo mysqli_errno($conn);
}





?>