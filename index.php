<?php

require 'include.php';

$route = new Routes;
$routes = $route->GetRoutes();

// var_dump($routes);

$viewToLoad = '';
// load view depending upon routes
if (empty($routes))
    LoadView('home');
else {
    switch ($routes[0]) {
        case 'index':
            LoadView('home');
        break;

        case 'home':
            LoadView('home');
        break;

        case 'about':
            LoadView('about');
        break;

        case 'sign-up':
            LoadView('register');
        break;

        default:
        // BOOM!
        // its 404
    }
}

?>