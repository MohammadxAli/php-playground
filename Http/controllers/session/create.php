<?php

use Core\Session;

view("session/create", [
    'title' => 'Login',
    'errors' => Session::get('errors'),
]);