<?php

$foo = 2;
$foo += 5;
echo $Foo + 1;  // 1, php变量名大小写敏感，类和函数名大小写不敏感，所以$foo和$Foo是两个变量。

class A {
    public $z;
    function __construct($z = 5) {
        $this->z = $z;
    }
}

$a = new A(13);
$b = $a;
$b->z = 0;
echo $a->z; // 0，$a和$b指向同一个对象。



