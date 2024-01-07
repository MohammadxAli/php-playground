
<?php

$title = 'Create Note';
$config = require('config.php');
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $currentUserId = 2;

    $db->query('INSERT INTO notes(body, user_id) VALUES (:body, :user_id)', [
        'body' => $_POST['body'],
        'user_id' => $currentUserId,
    ]);
}

require 'views/note-create.view.php';
