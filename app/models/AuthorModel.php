<?php

namespace app\models;

use app\db\BaseSQLOperations;

class AuthorModel extends Model
{
    public function get_all(): array
    {
        return BaseSQLOperations::select("author", null, "Author");
    }
    public function get(int $id): Author
    {
        return BaseSQLOperations::select("author", "id = $id", "Author");
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
