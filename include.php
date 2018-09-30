<?php

spl_autoload_register(function ($class) {
    if(!file_exists($class.".php"))
        die("the class does not exist!");

    include $class . '.php';
});

function LoadView(string $view)
{
    $loadView = 'view/'.$view.'.php';
    if (is_file($loadView))
    {
        include $loadView;
    } else {
        die('View not found');
        // show 404 here
    }
}

?>