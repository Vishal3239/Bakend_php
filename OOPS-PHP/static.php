<?php

    class A{

        public static $name="vishal";

        public static function fullName(){
            $first = self::$name;
            echo $first."Patel";
        }
        
        

    }

    $test = new A();
    $test->fullName();


?>