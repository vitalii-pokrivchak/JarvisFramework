<?php

# BookModel @vitalii-pokrivchak
namespace app\models;

use App\Db\DbConnection;

class BookModel
{
    private DbConnection $connection;
    public function __construct(DbConnection $connection)
    {
        $this->connection = $connection;
    }
    public function read(): array
    {
        $query = "SELECT * FROM book";
        $result = $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
