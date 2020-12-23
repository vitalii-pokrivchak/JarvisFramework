<?php

namespace Jarvis\DB;

interface ISQL
{
    /**
     * Select
     *
     * @param \stdClass $model
     * @param string $condition
     * @return array|false
     */
    public static function Select($model, $condition = null);

    /**
     * Insert
     *
     * @param \stdClass $model
     * @return bool
     */
    public static function Insert($model): bool;

    /**
     * Update
     *
     * @param int $id
     * @param \stdClass $model
     * @return bool
     */
    public static function Update($id, $model): bool;

    /**
     * Delete
     *
     * @param int $id
     * @param \stdClass $model
     * @return bool
     */
    public static function Delete($id, $model);
}
