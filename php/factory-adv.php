<?php

/**
 * 工厂模式：
 * 1. 抽象基类：类中定义抽象一些方法，用以在子类中实现
 * 2. 继承自抽象基类的子类：实现基类中的抽象方法
 * 3. 工厂类：用以实例化对象
 *
 * 一个工厂模式的运算类
 *
 * @link http://www.cnblogs.com/hongfei/archive/2012/07/07/2580776.html
 */

/**
 * 操作类
 * 因为包含有抽象方法，所以类必须声明为抽象类
 */
abstract class Operation {
    //抽象方法不能包含函数体
    abstract public function getValue($num1, $num2);//强烈要求子类必须实现该功能函数
}

/**
 * 加法类
 */
class OperationAdd extends Operation {
    public function getValue($num1, $num2) {
        return $num1 + $num2;
    }
}

/**
 * 减法类
 */
class OperationSub extends Operation {
    public function getValue($num1, $num2) {
        return $num1 - $num2;
    }
}

/**
 * 乘法类
 */
class OperationMul extends Operation {
    public function getValue($num1, $num2) {
        return $num1 * $num2;
    }
}

/**
 * 除法类
 */
class OperationDiv extends Operation {
    public function getValue($num1, $num2) {
        try {
            if ($num2 == 0) {
                throw new Exception("除数不能为0");
            } else {
                return $num1 / $num2;
            }
        } catch (Exception $e) {
            echo "错误信息：" . $e->getMessage();
        }
    }
}

/**
 * 工程类，主要用来创建对象
 * 功能：根据输入的运算符号，工厂就能实例化出合适的对象
 *
 */
class OperationFactory {
    public static function createObj($operate) {
        switch ($operate) {
            case '+':
                return new OperationAdd();
                break;
            case '-':
                return new OperationSub();
                break;
            case '*':
                return new OperationSub();
                break;
            case '/':
                return new OperationDiv();
                break;
        }
    }
}

/**
 * 测试结果
 */
$test = OperationFactory::createObj('/');
$result = $test->getValue(23, 0);
echo $result;