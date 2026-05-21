<?php
    session_start();
    $userName = $_POST['username'];
    $password = $_POST['password'];

    if($userName == "vishal" && $password == "12345"){
        $_SESSION['user']=$userName;
        $_SESSION['logged_in']=true;
        header("Location: dashboard.php");
        exit();
    }else{
        echo "wrong username and password";
    }
    

?>