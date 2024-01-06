<?php

$dsn = "mysql:host=host.docker.internal;port=3306;dbname=demo;charset=utf8mb4";
$pdo = new PDO($dsn, 'root', 'root');

$statement = $pdo->prepare('select * from posts');
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
