<?php

spl_autoload_register(function ($class) {
    if(!file_exists($class.".php"))
        die("the class does not exist!");

    include $class . '.php';
});

?>