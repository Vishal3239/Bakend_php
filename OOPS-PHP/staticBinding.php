<?php

    class A{
        protected static $name="vishal";
        public function sirName(){
            echo self::$name;
            echo static::$name;
        }
    }
    class B extends A{
        protected static $name = " patel";
    }
    $test = new B();
    $test->sirName();

?>