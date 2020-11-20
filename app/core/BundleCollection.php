<?php

namespace app\core;

use app\models\ModelObject;

class BundleCollection
{
    private array $models;
    public function __construct(ModelObject $model = null)
    {
        if ($model != null) {
            $this->models[$model->getName()] = $model;
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
            $this->models[$model->getName()] = $model;
        }
    }
}
