<?php
use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if ($form->validate($email, $password)) {
    if ((new Authenticator)->attempt($email, $password)) {
        redirect('/');
    }

    $message = 'The entered credentials are incorrect.';
    $form->error('email', $message);
    $form->error('password', $message);
}

return view("session/create", [
    'errors' => $form->errors(),
]);