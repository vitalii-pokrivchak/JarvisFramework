<?php

namespace Jarvis\Controllers;

use Jarvis\Config\Config;
use Jarvis\Core\Bundle;

abstract class Controller
{
    public function render(Bundle $bundle = null)
    {
        if ($bundle != null) {
            $models = [];
            $data = [];
            extract([
                'title' => $bundle->getTitle(),
                'view' => $bundle->getView(),
                "views_path" => Config::GetAppSettingByKey("Views_Path")
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
        require_once Config::GetAppSettingByKey("Views_Path") . Config::GetAppSettingByKey("Default_View") . ".php";
    }
}
