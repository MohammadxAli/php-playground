<?php

namespace Core\Middleware;

class Auth
{
    public function handle($key)
    {
        if ($key === 'auth' && !isset($_SESSION['user'])) {
            header("location: /");
            die();
        }
    }
}