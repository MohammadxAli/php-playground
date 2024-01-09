<?php

$config = require(base_path('config.php'));

$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 2')->get();

view('notes/index', [
    'title' => 'Notes',
    'notes' => $notes
]);
