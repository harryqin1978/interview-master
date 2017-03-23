<?php

/**
 * 单例模式又称为职责模式，它用来在程序中创建一个单一功能的访问点，通俗地说就是实例化出来的对象是唯一的。
 * 所有的单例模式至少拥有以下三种公共元素：
 * 1. 它们必须拥有一个构造函数，并且必须被标记为private
 * 2. 它们拥有一个保存类的实例的静态成员变量
 * 3. 它们拥有一个访问这个实例的公共的静态方法
 * 单例类不能再其它类中直接实例化，只能被其自身实例化。它不会创建实例副本，而是会向单例类内部存储的实例返回一个引用。
 */

class User {
    //静态变量保存全局实例
    private static $_instance = null;
    //私有构造函数，防止外界实例化对象
    private function __construct() {
    }
    //私有克隆函数，防止外办克隆对象
    private function __clone() {
    }
    //静态方法，单例统一访问入口
    static public function getInstance() {
        if (is_null ( self::$_instance ) || isset ( self::$_instance )) {
            self::$_instance = new self ();
        }
        return self::$_instance;
    }
    public function getName() {
        echo 'hello world!';
    }
}

$user = User::getInstance();
echo $user->getName();