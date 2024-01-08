<?php

$title = 'Note';

$config = require('config.php');

$db = new Database($config['database']);

$currentUserId = 2;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET['id']])->findOneOrAbort();

authorize($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';
