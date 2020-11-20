<?php

namespace app\models;

class ModelObject
{
    public function get_all()
    {
        return array();
    }

    public function getName()
    {
        $path = explode('\\', __CLASS__);
        return array_pop($path);
    }
}
