<?php
class A
{
    private function vishal()
    {
        echo "my name is vishal";
    }
    public function __call($name, $arguments)
    {
        echo "you are access privet method ! ($name)";
    }

}
$obj = new A();
$obj->vishal();
