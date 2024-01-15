<?php
use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$isLoggedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

if (!$isLoggedIn) {
    $message = 'The entered credentials are incorrect.';

    $form->error('email', $message)->error('password', $message)->throw();

    redirect('/login');
}

redirect('/');

