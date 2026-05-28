<?php

$s_data = [
    'id'            =>      $_POST['id'],
    'age'           =>      (int)$_POST['age'],
    'studentName'   =>      $_POST['student_name']
];

$sjson = json_encode($s_data,JSON_PRETTY_PRINT);

if(file_put_contents("json/student.json",$sjson)){
    echo "JSON create successfully ";
}else{
    echo " JSON not create..";
}

?>