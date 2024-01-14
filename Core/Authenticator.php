<?php

namespace Core;

use Core\App;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = (App::resolve(Database::class))->query('SELECT * from users where email = :email', [
            'email' => $email,
        ])->findOne();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login($user);
                return true;
            }
        }

        return false;

    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];

        session_regenerate_id(true);
    }

    public function logout()
    {
        $_SESSION = [];

        session_destroy();

        $params = session_get_cookie_params();

        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }
}


