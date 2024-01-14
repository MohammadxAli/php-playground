<?php

namespace Core\Middleware;

class Guest
{
    public function handle($key)
    {
        if ($key === 'guest' && isset($_SESSION['user'])) {
            header("location: /");
            die();
        }
    }
}