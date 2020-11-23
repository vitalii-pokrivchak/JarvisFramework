<?php

//* BaseSQLOperation @vitalii-pokrivchak,@HrabV

//TODO: Make insert,update,delete method`s @HrabV

namespace jarvis\db;

use jarvis\models\ModelObject;

class SQL implements ISQL
{
    public static function select(string $table, string $condition = null, string $classname = null): ?array
    {
        $connection = new Database(DB_DRIVER, DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASSWORD);
        $query = $condition ? "SELECT * FROM $table WHERE $condition" : "SELECT * FROM $table";
        $connection->beginTransaction();
        $sql = $connection->query($query);
        $connection->commit();
        $result = $classname ? $sql->fetchAll(Database::FETCH_CLASS, $classname) : $sql->fetchAll(Database::FETCH_ASSOC);
        $connection = null;
        return $result;
    }


    public static function insert(string $table, ModelObject $model)
    {
        $connection = new Database(DB_DRIVER, DB_HOST, DB_NAME, DB_PORT, DB_USER, DB_PASSWORD);
        $values = $model->GetAllData();
        $sqlQuery = sprintf(
            'INSERT INTO ' . $table . ' (%s) VALUES ("%s")',
            implode(',', array_keys($values)),
            implode('","', array_values($values))
        );
        $connection->beginTransaction();
        $connection->query($sqlQuery);
        $connection->commit();
        $connection = null;
    }


    public static function update(string $table, ModelObject $model, string $condition)
    {
    }


    public static function delete(string $table, string $condition = null)
    {
    }
}
