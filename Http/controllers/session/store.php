<?php
use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password.';
}

if (!empty($errors)) {
    return view("session/create", [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query('SELECT * from users where email = :email', [
    'email' => $email,
])->findOne();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('location: /');
        exit();
    }
}

return view("session/create", [
    'errors' => [
        'email' => 'The entered credentials are incorrect.',
        'password' => 'The entered credentials are incorrect.',
    ]
]);