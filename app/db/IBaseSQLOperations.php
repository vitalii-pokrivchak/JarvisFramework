<?php

namespace app\db;
use app\models\ModelObject;

interface IBaseSQLOperations
{
    public static function select(string $table, string $condition = null, string $classname = null);
    public static function insert(string $table, ModelObject $model);
    public static function update(string $table, array $columns, array $values, string $condition);
    public static function delete(string $table, string $condition = null);
}
