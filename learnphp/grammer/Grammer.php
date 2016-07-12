<?php
/**
 * 测试总结的文稿
 */

abstract class Person{
    abstract   function say();
}

//测试构造函数和析构函数的调用
class ParentClass extends Person{
    
    protected $name = "";   
    public function __construct() {
        echo "fathor  construct\n";
    }
    
    public function who(){
        return new static;
    }
    
    public function who2(){
        return new self;
    }

    public function foo(){
        static::who();
    }
    
    public function __destruct() {
        echo "fathor  destruct\n";
    }
    public function say(){
        echo "fathor\n";
    }
    
}

class Son extends ParentClass{
    
    /*
    public function __construct() {
        echo "son construct\n";
    }*/
    
    public function __destruct() {
        echo "son  destruct\n";
    }
    public function say(){
        echo "son\n";
    }
}

class Sister extends ParentClass{
    public function say(){
        echo "Sister\n";
    }
}

function sayIt(ParentClass $obj){
    $obj->say();
}


$obj  = new Son();
//后期静态绑定
$obj2 = $obj->who();
$obj3 = $obj->who2();
var_dump($obj2);
var_dump($obj3);
//多态
$i_son = new Son();
$i_sister = new Sister();
sayIt($i_sister);

// 测试反射
$oReflectionClass = new ReflectionClass('Son'); 
print_r($oReflectionClass);

echo time();



















