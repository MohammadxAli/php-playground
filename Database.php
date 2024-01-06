
<?php

class Database
{

    private $connection;

    public function __construct()
    {
        $dsn = "mysql:host=host.docker.internal;port=3306;dbname=demo;charset=utf8mb4";
        $this->connection = new PDO($dsn, 'root', 'root');
    }

    public function query($query)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement;
    }
}

$db = new Database();

$posts = $db->query('select * from posts')->fetchAll(PDO::FETCH_ASSOC);


foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
