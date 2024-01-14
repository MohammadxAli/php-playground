<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOneOrAbort();

authorize($note['user_id'] === $currentUserId);

view('notes/edit', [
    'title' => 'Edit Note',
    'note' => $note
]);

