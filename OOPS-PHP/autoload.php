<?php

// function __autoload($class){
//     require "students/".$class.".php";
// }

spl_autoload_register(function($class){
    require "students/".$class.".php";
});
$obj = new Vishal();
$obj2 = new Vikas();
$obj3 = new Soni();
$obj4 = new Aman();




?>