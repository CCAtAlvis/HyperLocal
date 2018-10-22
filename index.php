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

        case 'sign-in':
            LoadView('login');
        break;

        case 'forgot-password':
            // LoadView('forgot');
        break;

        case 'sign-out':
            // var_dump($_SESSION);

            $time = time() - (60*60*24*30*365);
            setcookie("login", "", $time, "/");
            setcookie("user_id", "", $time, "/");

            session_unset();
            // var_dump($_SESSION);
            header("Location: ./home");
        break;

        default:
        // BOOM!
        // its 404
    }
}

?>
