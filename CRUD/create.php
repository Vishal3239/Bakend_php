<?php
$conn = mysqli_connect("localhost", "root", "", "php_crud") 
        or die("Connection failed");

$name  = $_POST['name'];
$email = $_POST['email'];
$age   = $_POST['age'];

$fileName = $_FILES['photo']['name'];
$tempPath = $_FILES['photo']['tmp_name'];

// Photo uploads/ folder mein move karo
move_uploaded_file($tempPath, "uploads/" . $fileName);

// Database mein save karo
$sql = "INSERT INTO Students (`Name`, `Age`, `Email`, `Image`) 
        VALUES ('{$name}', '{$age}', '{$email}', '{$fileName}')";

$result = mysqli_query($conn, $sql) or die("Insert unsuccessful");

// Wapas list par bhejo
header("Location: index.php");
exit();
?>