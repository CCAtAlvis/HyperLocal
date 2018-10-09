<?php

spl_autoload_register(function ($class) {
    if(!file_exists($class.".php"))
        die("the class does not exist!");

    include $class . '.php';
});

// pass in the name of view to load, 
// name must be same as that of the generated view without extension
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

// pass in the name of API endoint to load, 
// name must be same as that of the API without extension
function LoadAPI(string $API)
{
    $loadAPI = 'controller/'.$API.'.php';
    if (is_file($loadAPI)) {
        include $loadAPI;
    } else {
        die("API not found $loadAPI");
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
            // echo $html;
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
            $html .= "<script src='$loadScript'></script>";
            // echo $html;
        } else {
            die("Script not found: $loadScript");
            // show 404 here
        }
    }

    return $html;
}

?>