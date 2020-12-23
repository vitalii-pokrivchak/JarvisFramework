<?php

namespace Jarvis\DB;

use Jarvis\Config\Config;

class SQL implements ISQL
{
    public static function Select($model, $condition = null)
    {
        $connection = self::Connect();
        $table_name = self::GetTableName($model);
        $query = $condition ? "SELECT * FROM $table_name $condition" : "SELECT * FROM $table_name";
        $statement = self::ExecuteQuery($query, $connection);
        $result = "";
        if ($statement != false) {
            $result = $statement->fetchAll(Connection::FETCH_CLASS, $model);
        } else {
            $result = false;
        }
        return $result;
    }
    public static function Insert($model): bool
    {
        $connection = self::Connect();
        $data = self::GetModelProperties($model);
        $table_name = self::GetTableName($model);
        unset($data["id"]);
        $sqlQuery = sprintf(
            'INSERT INTO ' . $table_name . ' (%s) VALUES (\'%s\')',
            implode(',', array_keys($data)),
            implode('\',\'', array_values($data))
        );
        return self::Execute($sqlQuery, $connection);
    }
    public static function Update($id, $model): bool
    {
        $connection = self::Connect();
        $table_name = self::GetTableName($model);
        $reflection = new \ReflectionClass($model);
        $record = SQL::Select($reflection->getName(), "WHERE id = $id");
        $data = self::GetModelProperties($model);
        unset($data["id"]);
        $updates = [];
        foreach ($data as $key => $value) {
            if ($value !== $record[0]->$key) {
                $updates[$key] = $value;
            }
        }
        $combined = [];
        foreach ($updates as $key => $value) {
            $combined[] = sprintf('%s = \'%s\'', $key, $value);
        }
        $imploded = implode(',', $combined);
        $sqlQuery = <<<SQL
        UPDATE {$table_name}
        SET $imploded
        WHERE id = $id;
        SQL;
        return self::Execute($sqlQuery, $connection);
    }
    public static function Delete($id, $model)
    {
        $connection = self::Connect();
        $table_name = self::GetTableName($model);
        $sqlQuery = <<<SQL
        DELETE FROM {$table_name} WHERE id = {$id};
        SQL;
        return self::Execute($sqlQuery, $connection);
    }
    private static function GetModelName($model)
    {
        $reflection = new \ReflectionClass($model);
        return $reflection->getShortName();
    }
    private static function GetTableName($model)
    {
        $modelName = self::GetModelName($model);
        return strtolower($modelName) . 's';
    }
    private static function Connect(): Connection
    {
        $config = Config::GetDatabaseSettings();
        return new Connection($config);
    }
    private static function GetModelProperties($model): array
    {
        $reflection = new \ReflectionClass($model);
        $properties = $reflection->getProperties();
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $data[$property->getName()] = $property->getValue($model);
        }
        return $data;
    }
    /**
     * Execute
     *
     * @param string $query
     * @param Connection $connection
     * @return bool
     */
    private static function Execute(string $query, Connection $connection): bool
    {
        $connection->beginTransaction();
        $connection->exec($query);
        $result = $connection->commit();
        $connection = null;
        return $result;
    }
    /**
     * ExecuteQuery
     *
     * @param string $query
     * @param Connection $connection
     * @return \PDOStatement|false
     */
    private static function ExecuteQuery(string $query, Connection $connection)
    {
        $connection->beginTransaction();
        $result = $connection->query($query);
        $connection->commit();
        $connection = null;
        return $result;
    }
}
