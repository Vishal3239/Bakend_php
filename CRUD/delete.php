<?php
$conn = mysqli_connect("localhost", "root", "", "php_crud")
    or die("Connection failed");
    $id=$_GET['id'];
$sql = "DELETE FROM `Students`
        WHERE `S_id`={$id}";
$result = mysqli_query($conn,$sql)or die("unsuccess");

header("Location: index.php");
exit();

?>
