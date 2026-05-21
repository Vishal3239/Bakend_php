<?php
session_start();
    if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in']!==true){
        header("Locatio: login.html");
        exit();
    }

    $user = $_SESSION['user'];
    echo " Welcome ". $user . " !";
    echo "<br><a href='login.html'>Logout</a>";
?>