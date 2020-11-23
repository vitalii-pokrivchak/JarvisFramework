<?php

namespace jarvis\core;

use app\models\Model;
use jarvis\models\ModelObject;

class BundleCollection
{
    private array $models;
    public function __construct(ModelObject $model = null)
    {
        if ($model != null) {
            $classname = new \ReflectionClass($model);
            $this->models[$classname->getShortName()] = $model;
        } else {
            $this->models = array();
        }
    }
    public function getModels(): array
    {
        return $this->models;
    }
    public function addModel(ModelObject $model)
    {
        if (!array_key_exists(get_class($model), $this->models)) {
            $classname = new \ReflectionClass($model);
            $this->models[$classname->getShortName()] = $model;
        }
    }
}
