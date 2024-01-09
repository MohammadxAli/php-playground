<?php
use Core\Response;

$routes = require(base_path('routes.php'));

function routeToController($route, $routes)
{
    if (key_exists($route, $routes)) {
        require base_path($routes[$route]);
        return;
    }

    abort();
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);

    require view("{$code}");

    die();
}


$route = parse_url($_SERVER['REQUEST_URI'])['path'];

routeToController($route, $routes);
