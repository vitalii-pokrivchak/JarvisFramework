<?php

namespace app\models;

interface IModel
{
    public function get_all();
    public function get(int $id);
    public function write();
    public function update();
    public function delete();
}
