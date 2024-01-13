<?php
use Core\App;
use Core\Database;
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

$db = App::resolve(Database::class);

$user = $db->query('SELECT * from users where email = :email', [
    'email' => $email,
])->findOne();

if ($user) {
    header('location: /');
    die();
} else {
    $db->query('INSERT INTO users(email, password) values (:email, :password)', [
        'email' => $email,
        'password' => $password,
    ]);

    $_SESSION['user'] = [
        'email' => $email,
    ];

    header("location: /");
    die();
}


