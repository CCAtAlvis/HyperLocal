<?php

spl_autoload_register(function ($class) {
    if(!file_exists($class.".php"))
        die("the class does not exist!");

    include $class . '.php';
});

function LoadView(string $view)
{
    $loadView = 'view/generated/'.$view.'.php';
    if (is_file($loadView)) {
        include $loadView;
    } else {
        die("View not found $loadView");
        // show 404 here
    }
}

// pass in the array of stylesheets, 
// name must be same as that of stylesheet without extension
function LoadStyling(array $styles) : string
{
    $html = '';
    foreach($styles as $style) {
        $loadStyle = 'view/static/css/'.$style.'.css';
        if (is_file($loadStyle)) {
            $html .= "<link rel='stylesheet' media='screen' href='$loadStyle' />";
            echo $html;
        } else {
            die("Stylesheet not found: $loadStyle");
            // show 404 here
        }
    }

    return $html;
}

// pass in the array of scripts to load, 
// name must be same as that of script without extension
function LoadScripts(array $scripts) : string
{
    $html = '';
    foreach($scripts as $script) {
        $loadScript = 'view/static/js/'.$script.'.js';
        if (is_file($loadScript)) {
            $html .= "<link rel='stylesheet' media='screen' href='$loadScript' />";
            echo $html;
        } else {
            die("Script not found: $loadScript");
            // show 404 here
        }
    }

    return $html;
}

?>