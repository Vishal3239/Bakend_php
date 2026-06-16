<?php

    interface vishal{
        function firstName();
    }
    interface patel{
        function lastName();
    }

    class fullName implements vishal,patel{
        public function firstName()
        {
            echo " vishal ";
        }
        public function lastName()
        {
            echo " patel";
        }
    }

    $test = new fullName();
    $test->firstName();
    $test->lastName();

?>