<?php

namespace app\controllers;

use app\core\Bundle;

abstract class Controller
{
    public abstract function index();
    public function render(Bundle $bundle)
    {
        $models = [];
        $data = [];
        extract([
            'title' => $bundle->getTitle(),
            'view' => $bundle->getView()
        ]);
        if ($bundle->getCollection() != null) {
            if ($bundle->getCollection()->getModels() != null) {
                foreach ($bundle->getCollection()->getModels() as $key => $model) {
                    $models[strtolower($key)] = $model;
                }
                extract($models);
            };
        }
        if ($bundle->getData() != null) {
            foreach ($bundle->getData() as $key => $d) {
                $data[strtolower($key)] = $d;
            }
            extract($data);
        }
        require_once VIEWS_PATH . DEFAULT_VIEW . ".php";
    }
}
