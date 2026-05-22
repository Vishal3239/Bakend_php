<?php
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";

    $fileName = $_FILES['file']['name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $tempPath = $_FILES['file']['tmp_name'];
    $error = $_FILES['file']['error'];

    // 1. check error
    if($error !== 0){
        echo "Error finding file not uploading..";
        exit();
    }

    // 2. safe image allow
    $allowType = ["image/jpeg","image/png","image/gif"];
    if(!in_array($fileType,$allowType)){
        echo " only jpg,png,gif allows...";
        exit();
    }

    // 3. size check..
    if($fileSize > 2*1024*1024){
        echo "file allow less 2 mb ";
        exit();
    }
    $savePath = "upload/".$fileName;
    if(move_uploaded_file($tempPath,$savePath)){
        echo " file upload successly uploaded..";
    }else{
        echo "file upload faild...";
    }




?>