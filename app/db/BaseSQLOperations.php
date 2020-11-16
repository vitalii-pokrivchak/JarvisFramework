<?php

//* BaseSQLOperation @vitalii-pokrivchak,@HrabV

//TODO: Make insert,update,delete method`s @HrabV

namespace app\db;

class BaseSQLOperations implements IBaseSQLOperations
{
    public static function select(DbConnection $connection, string $table, string $condition = null, string $classname = null)
    {
        $query = $condition ? "SELECT * FROM $table WHERE $condition" : "SELECT * FROM $table";
        $data = $connection->query($query)->fetch_all(MYSQLI_ASSOC);
        if ($classname != null) {
            $classname = "app\\models\\" . $classname;
            if (count($data) === 1) {
                return new $classname($data[0]);
            } else {
                foreach ($data as $d) {
                    $result[] = new $classname($d);
                }
                return $result;
            }
        }
        return $data;
    }
    public static function insert(DbConnection $connection, string $table, array $values, array $columns = null)
    {
    }
    public static function update(DbConnection $connection, string $table, array $columns, array $values, string $condition)
    {
    }
    public static function delete(DbConnection $connection, string $table, string $condition = null)
    {
    }
}
