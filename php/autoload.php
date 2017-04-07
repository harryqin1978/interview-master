<?php

// 单层的
spl_autoload_register(function ($class_name) {
    require_once $class_name . '.php';
});

// 带namespace的
spl_autoload_register(function ($class) {
    if ($class) {
        $file = str_replace('\\', '/', $class);
        $file .= '.class.php';
        if (file_exists($file)) {
            include $file;
        }
    }
});

use DB\MySql; // include 'DB/MySql.class.php'
$mysql = new MySql();