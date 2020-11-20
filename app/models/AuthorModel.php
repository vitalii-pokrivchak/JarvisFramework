<?php

namespace app\models;

use app\db\BaseSQLOperations;

class AuthorModel extends Model
{
    public function get_all(): array
    {
        $result = BaseSQLOperations::select("author", null, "Author");
        if ($result) {
            return $result;
        }
        return false;
    }
    public function get(int $id): Author
    {
        $result = BaseSQLOperations::select("author", "id = $id", "Author");
        if ($result) {
            return $result;
        }
        return false;
    }
    public function write()
    {
    }
    public function update()
    {
    }
    public function delete()
    {
    }
}
