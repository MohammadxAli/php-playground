<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$notes = $db->query('select * from notes where user_id = 2')->get();

view('notes/index', [
    'title' => 'Notes',
    'notes' => $notes
]);
