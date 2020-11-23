<?php

namespace jarvis\models;

interface IModel
{
    public function get_all(): array;
    public function get(int $id): ModelObject;
    public function write();
    public function update();
    public function delete();
}
