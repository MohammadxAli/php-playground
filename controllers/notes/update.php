<?php

use Core\Database;
use Core\Validator;
use Core\App;

$db = App::resolve(Database::class);

$errors = [];

$currentUserId = 2;

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

$note = $db->query('select * from notes where id = :id', ['id' => $_POST['id']])->findOneOrAbort();

authorize($note['user_id'] === $currentUserId);

if (!empty($errors)) {
    return view('notes/edit', [
        'title' => 'Edit Note',
        'errors' => $errors
    ]);
}

$db->query('UPDATE notes SET body=:body WHERE id=:id', [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

header('location: /notes');
exit();

