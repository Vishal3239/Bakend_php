<?php

class A{
    private $data=["name"=>"vishal","age"=>20,"Address"=>"sonpurwan Anei Varanasi"];
    public function __get($key)
    {
        if(array_key_exists($key,$this->data)){
            return $this->data[$key];
        }else{
            return "this key ! ($key) is not define";
        }
    }
}

$obj = new A();
echo $obj->name;

?>