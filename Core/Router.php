<?php

namespace Core;

use Core\Response;

class Router
{
    protected $routes = [];

    protected function add($method, $uri, $controller)
    {
        $this->routes[] = [
            "method" => $method,
            "uri" => $uri,
            "controller" => $controller,
            'middleware' => NULL
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                if ($route['middleware'] ?? false) {

                    if ($route['middleware'] === 'guest' && isset($_SESSION['user'])) {
                        header("location: /");
                        die();
                    }

                    if ($route['middleware'] === 'auth' && !isset($_SESSION['user'])) {
                        header("location: /");
                        die();
                    }

                }

                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }


    protected function abort($code = Response::NOT_FOUND)
    {
        http_response_code($code);

        require view("{$code}");

        die();
    }

}
