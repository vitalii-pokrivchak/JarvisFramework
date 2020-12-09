<?php

namespace app\models;

use jarvis\db\SQL;
use jarvis\models\Model;

class AuthorModel extends Model
{
    public function get_all(): array
    {
        return SQL::select('author',null,Author::class);
    }
    public function get(int $id): Author
    {
        return SQL::select('author',"id = $id",Author::class)[0];
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