<?php

    class A{
        public function __construct(){
            echo " this is construct"."<br>";
            
        }
        public function show(){
            echo " this is not auto call "."<br>";
            
        }
        public function __destruct(){
            echo " work successfully done"."<br>";
            
        }
    }
    $obj = new A();
    $obj->show();
    ?>