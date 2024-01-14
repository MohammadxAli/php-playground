<?php
use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if (!$form->validate($email, $password)) {

    return view("session/create", [
        'errors' => $form->errors(),
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