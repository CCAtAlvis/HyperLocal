<?php

require 'include.php';

$route = new Routes;
$routes = $route->GetRoutes();

var_dump($routes);

if(empty($routes))
    LoadView('home');


?>