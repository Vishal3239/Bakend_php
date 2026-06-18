<?php

trait vishal{
    public function firstName(){
        echo "vishal";
    }
    public function lastName(){
        echo "patel";
    }
    
}
trait patel{
    public function about(){
        echo "my name is vishal patel i am studing in master of computer application in kashi institute os technology varanasi.";
    }
}

class A{
    use vishal,patel;
}
// class B{
//     use patel;
// }

$test1 = new A();
// $test2 = new B();

$test1 -> firstName();
echo " ";
$test1 -> lastName();
echo "<br>";
$test1 -> about();


?>