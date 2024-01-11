<?php

use Core\Database;

$config = require(base_path('config.php'));

$db = new Database($config['database']);

$currentUserId = 2;

$id = $_POST['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOneOrAbort();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $id,
]);

header('location: /notes');

exit();