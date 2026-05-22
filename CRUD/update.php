<?php
$conn = mysqli_connect("localhost", "root", "", "php_crud")
        or die("Connection failed");

// Form se data lo
$id    = $_POST['id'];
$naam  = $_POST['naam'];
$email = $_POST['email'];
$age   = $_POST['age'];

// Photo check karo — nayi aayi ya nahi?
if ($_FILES['photo']['name'] != '') {

    // Nayi photo aayi — upload karo
    $photo    = $_FILES['photo']['name'];
    $tempPath = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tempPath, "uploads/" . $photo);

} else {

    // Nayi photo nahi aayi — purani rakho
    $photo = $_POST['old_photo'];

}

// UPDATE query
$sql = "UPDATE `Students` SET 
            `Name`  = '{$naam}', 
            `Email` = '{$email}', 
            `Age`   = '{$age}', 
            `Image` = '{$photo}' 
        WHERE `S_id` = {$id}";

$result = mysqli_query($conn, $sql) or die("Update unsuccessful: " . mysqli_error($conn));

// Wapas list par bhejo
header("Location: index.php");
exit();
?>