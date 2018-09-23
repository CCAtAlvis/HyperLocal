<?php
     
    function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';

        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));

        if (strstr($uri, '?'))
            $uri = substr($uri, 0, strpos($uri, '?'));

        $uri = "/" . trim($uri, '/');
        return explode('/', $uri);
    }

    $base_url = getCurrentUri();

    $routes = array();
    foreach($base_url as $route)
    {
        if(trim($route) != '')
            array_push($routes, $route);
    }

    var_dump($routes);	
?>