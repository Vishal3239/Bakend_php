<?php
$conn = mysqli_connect("localhost", "root", "", "php_crud")
        or die("Connection failed");

    $sql="SELECT * FROM Students";
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0) {
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    }


?>