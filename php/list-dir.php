<?php

function list_dir($dir) {
    $d = dir($dir);

    while (false !== ($entry = $d->read())) {
       echo $entry . PHP_EOL;
    }
    $d->close();
}

list_dir(__DIR__);