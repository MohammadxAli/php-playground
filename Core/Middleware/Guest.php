<?php

namespace Core\Middleware;

class Guest
{
    public function handle()
    {
        if (isset($_SESSION['user']) ?? false) {
            header("location: /");
            die();
        }
    }
}