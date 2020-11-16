<?php

//* BookModel @vitalii-pokrivchak
namespace app\models;

use app\db\BaseSQLOperations;
use app\db\DbConnection;

//* Class BookModel extends of Model
class BookModel extends Model
{
    private DbConnection $connection;
    public function __construct(DbConnection $connection)
    {
        $this->connection = $connection;
    }

    /**
     ** @vitalii-pokrivchak
     ** get_all
     *
     * @return array
     */
    public function get_all(): array
    {
        return BaseSQLOperations::select($this->connection, "book", null, "Book");
    }
    /**
     ** @vitalii-pokrivchak
     ** get
     *
     * @param  mixed $id
     * @return Book
     */
    public function get(int $id): Book
    {
        return BaseSQLOperations::select($this->connection, "book", "id = $id", "Book");
    }
    /**
     ** @HrabV
     ** write
     *
     * @return void
     */
    public function write()
    {
    }
    /**
     ** @HrabV
     ** update
     *
     * @return void
     */
    public function update()
    {
    }
    /**
     ** @HrabV
     ** delete
     *
     * @return void
     */
    public function delete()
    {
    }
}
