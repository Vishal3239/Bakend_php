<?php

trait vishal
{
    public function show()
    {
        echo "hii";
    }
}
class A
{
    
    public function show()
    {
        echo "hellow";
    }
}

class B extends A
{
    use vishal;
    // public function show(){
    //     echo "hii vishal";
    // }
}

$b = new B();
$b->show();
