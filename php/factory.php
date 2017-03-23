<?php

/**
 * 工厂类是指包含一个专门用来创建其他对象的方法的类，工厂类在多态性编程实践中是至关重要的，它允许动态的替换类，修改配置，通常会使应用程序更加灵活，熟练掌握工厂模式高级PHP开发人员是很重要的。
 * 工厂模式通常用来返回符合类似接口的不同的类，工厂的一种常见用法就是创建多态的提供者，从而允许我们基于应用程序逻辑或者配置设置来决定应实例化哪一个类，例如，可以使用这样的提供者来扩展一个类，而不需要重构应用程序的其他部分，从而使用新的扩展后的名称 。
 * 通常，工厂模式有一个关键的构造，根据一般原则命名为Factory的静态方法，然而这只是一种原则，工厂方法可以任意命名，这个静态还可以接受任意数据的参数，必须返回一个对象。
 * @link http://www.cnblogs.com/ScriptZhang/archive/2010/05/17/1737719.html
 */

class MyObject {
    public function getName() {
        echo 'hello world!';
    }
}

class MyFactory {
    public static function factory() {
        return new MyObject();
   }
}

$instance = MyFactory::factory();
echo $instance->getName();