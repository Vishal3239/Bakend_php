<?php

    class A{
        public function first(){
            echo " this is first"."<br>";
            return $this;
        }
        public function second(){
            echo " this is second"."<br>";
            return $this;
        }
        public function third(){
            echo " this is third"."<br>";
            return $this;
        }
        public function fourth(){
            echo " this is fourth"."<br>";
        }
    }

    $obj = new A();
    $obj->first()->second()->third()->fourth();
?>