
<?php

class Database
{

    private $connection;

    public function __construct()
    {
        $this->connection = new PDO($dsn, 'root', 'root', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
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
