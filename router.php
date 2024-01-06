<?php

$route = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
];


function routeToController($route, $routes)
{
    if (key_exists($route, $routes)) {
        require $routes[$route];
        return;
    }

    abort();
}

function abort($code = 404)
{
    http_response_code($code);

    require "views/{$code}.view.php";

    die();
}


routeToController($route, $routes);
