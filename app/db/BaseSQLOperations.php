<?php

//* BaseSQLOperation @vitalii-pokrivchak,@HrabV

//TODO: Make insert,update,delete method`s @HrabV

namespace app\db;

class BaseSQLOperations implements IBaseSQLOperations
{
    public static function select(DbConnection $connection, string $table, string $condition = null, string $classname = null)
    {
        
        if (!$connection) {
            $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            //die("Connection failed: " . mysqli_connect_error());
          }

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
        $connection->close();
        return $data;
    }
    public static function insert(DbConnection $connection, string $table, array $values, array $columns = null)
    {
        if (!$connection) {
            $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            //die("Connection failed: " . mysqli_connect_error());
          }

             //TODO

          $connection->close();
    }
    public static function update(DbConnection $connection, string $table, array $columns, array $values, string $condition)
    {

        if (!$connection) {
            $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            //die("Connection failed: " . mysqli_connect_error());
          }

            //TODO


          $connection->close();
    }
    public static function delete(DbConnection $connection, string $table, string $condition = null)
    {

        if (!$connection) {
            $connection = new DbConnection(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
            //die("Connection failed: " . mysqli_connect_error());
          }

   //TODO


          $connection->close();
    }
}
