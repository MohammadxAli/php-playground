<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 2;

$id = $_POST['id'];

$note = $db->query('select * from notes where id = :id', ['id' => $id])->findOneOrAbort();

authorize($note['user_id'] === $currentUserId);

$db->query('delete from notes where id = :id', [
    'id' => $id,
]);

header('location: /notes');

exit();