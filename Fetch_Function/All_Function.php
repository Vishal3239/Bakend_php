<?php
$conn = mysqli_connect("localhost", "root", "", "college-project") or die("connection feild");
$sql = "SELECT * FROM `gender`";
$result = mysqli_query($conn, $sql);

// echo "<h1> assoc Function </h1>";
// while ($assoc = mysqli_fetch_assoc($result)) {
    
//     echo "<pre>";
//     print_r($assoc);
//     echo "</pre>";
// }

// echo "<h1> Array Function </h1>";
// while($row = mysqli_fetch_array($result)) {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";    
//     // echo $row[0];
// }

// echo "<h1> Row Function </h1>";
// while($row = mysqli_fetch_row($result)) {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";    
// }

// echo "<h1> All Function </h1>";
// while($row = mysqli_fetch_all($result)) {
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";    
// }

echo "<h1> field Function </h1>";
while($row = mysqli_fetch_field($result)) {
    echo "<pre>";
    print_r($row);
    echo "</pre>";    
}




?>
