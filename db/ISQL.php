<?php

namespace jarvis\db;

use jarvis\models\ModelObject;

interface ISQL
{
    public static function select(string $table, string $condition = null, string $classname = null): ?array;
    public static function insert(string $table, ModelObject $model);
    public static function update(string $table, ModelObject $model, string $condition);
    public static function delete(string $table, string $condition = null);
}
