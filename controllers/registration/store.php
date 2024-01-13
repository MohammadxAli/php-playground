<?php
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Password should be at least 7 characters.';
}

if (!empty($errors)) {
    return view("registration/show", [
        'errors' => $errors
    ]);
}

header("location: /");
die();