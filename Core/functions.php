<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}


function urlIs($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);

    require view("{$code}");

    die();
}

function authorize($condition)
{
    if (!$condition) {
        abort(Response::FORBIDDEN);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($name, $attributes = [])
{
    extract($attributes);
    require base_path('/views/' . $name . '.view.php');
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}