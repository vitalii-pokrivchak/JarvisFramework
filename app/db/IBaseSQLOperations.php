<?php

namespace app\db;

interface IBaseSQLOperations
{
    public static function select(DbConnection $connection, string $table, string $condition = null, string $classname = null);
    public static function insert(DbConnection $connection, string $table, array $values, array $columns = null);
    public static function update(DbConnection $connection, string $table, array $columns, array $values, string $condition);
    public static function delete(DbConnection $connection, string $table, string $condition = null);
}
