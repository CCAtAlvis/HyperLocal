<?php

require 'include.php';

$route = new Routes();
$routes = $route->GetRoutes();
// var_dump($routes);

if (empty($routes))
    // throw error
    die();
else {
    // swiching on route[1] as route[0] is 'api'
    switch ($routes[1]) {
        case 'register':
            LoadAPI('register');
            break;

        case 'login':
            LoadAPI('login');
            break;

        default:
            // throw some random error
    }
}

?>
