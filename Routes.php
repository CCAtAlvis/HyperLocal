<?php

class Routes
{
    private $baseURI;

    public function __construct()
    {
        $this->baseURI = $this->GetCurrentURI();
    }

    private function GetCurrentURI() : string
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';

        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));

        if (strstr($uri, '?'))
            $uri = substr($uri, 0, strpos($uri, '?'));

        $uri = "/" . trim($uri, '/');
        return $uri;
    }

    public function GetRoutes() : array
    {
        $routes = array();
        foreach(explode('/', $this->baseURI) as $route)
        {
            if(trim($route) != '')
                array_push($routes, strtolower($route));
        }

        return $routes;
    }
}

?>
