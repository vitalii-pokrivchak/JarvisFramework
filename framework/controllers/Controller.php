<?php

namespace jarvis\controllers;

use jarvis\config\Config;
use jarvis\core\Bundle;

abstract class Controller
{
    public abstract function index();
    public function render(Bundle $bundle = null)
    {
        if ($bundle != null) {
            $models = [];
            $data = [];
            extract([
                'title' => $bundle->getTitle(),
                'view' => $bundle->getView(),
                "views_path" => Config::GetAppSettingByKey("views_path")
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
        }
        require_once Config::GetAppSettingByKey("views_path") . Config::GetAppSettingByKey("default_view") . ".php";
    }
}
