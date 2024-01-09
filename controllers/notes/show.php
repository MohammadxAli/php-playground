<?php

use Core\Database;

$config = require(base_path('config.php'));

$db = new Database($config['database']);

$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOneOrAbort();

authorize($note['user_id'] === $currentUserId);

view('notes/show', [
    'title' => 'Note',
    'note' => $note
]);
