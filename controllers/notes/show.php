<?php

use Core\Database;

$config = require(base_path('config.php'));

$db = new Database($config['database']);

$currentUserId = 2;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $note = $db->query('select * from notes where id = :id', ['id' => $id])->findOneOrAbort();

    authorize($note['user_id'] === $currentUserId);

    $db->query('delete from notes where id = :id', [
        'id' => $id,
    ]);

    header('location: /notes');
    exit();

} else {
    $note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOneOrAbort();

    authorize($note['user_id'] === $currentUserId);

    view('notes/show', [
        'title' => 'Note',
        'note' => $note
    ]);
}

