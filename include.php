<?php

// set some defining functions
session_start();
date_default_timezone_set("Asia/Kolkata");

// check whether the user is already logged in
// set global define() for login and user_id
$login = $_SESSION["login"] ?? $_COOKIE["login"] ?? false;
$user_id = $_SESSION["user_id"] ?? $_COOKIE["user_id"] ?? false;

if ($login === "LOGIN" && $user_id) {
    // set user login
    SetUserLogin($user_id);
}

spl_autoload_register(function ($class) {
    if(!file_exists($class.".php"))
        die("the class does not exist!");

    include $class . '.php';
});

// universal function to login user
function SetUserLogin(string $_id)
{
    $_SESSION["login"] = "LOGIN";
    $_SESSION["user_id"] = $_id;

    // set user cookies
    $cookie = [];
    $cookie["time"] = time() + (60*60*24*30*365);

    // set cookie for login
    $cookie["name"] = "login";
    $cookie["value"] = "LOGIN";
    setcookie($cookie["name"], $cookie["value"], $cookie["time"], "/");

    // set cookie for user details
    $cookie["name"] = "user_id";
    $cookie["value"] = $_id;
    setcookie($cookie["name"], $cookie["value"], $cookie["time"], "/");
}

// pass in the name of view to load, 
// name must be same as that of the generated view without extension
function LoadView(string $view)
{
    global $login;
    global $user_id;
    $loadView = 'view/generated/'.$view.'.php';
    if (is_file($loadView)) {
        include_once $loadView;
    } else {
        die("View not found $loadView");
        // show 404 here
    }
}

// pass in the name of API endoint to load, 
// name must be same as that of the API without extension
function LoadAPI(string $API)
{
    global $login;
    global $user_id;
    $loadAPI = 'controller/'.$API.'.php';
    if (is_file($loadAPI)) {
        include_once $loadAPI;
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