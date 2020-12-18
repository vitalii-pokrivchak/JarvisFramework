<?php

namespace Jarvis\Controllers;

use Jarvis\Config\Config;
use Jarvis\Core\Application;
use Jarvis\Core\Bundle;
use Jenssegers\Blade\Blade;

abstract class Controller
{
    /**
     * Blade
     *
     * @var Blade
     */
    private Blade $blade;

    public function render(Bundle $bundle = null)
    {
        $this->blade = new Blade(
            Config::GetAppSettingByKey('Views_Path'),
            Config::GetAppSettingByKey('Cache_Path')
        );
        if ($bundle != null) {
            $models = [];
            $data = [];
            if ($bundle->getCollection() != null) {
                if ($bundle->getCollection()->getModels() != null) {
                    foreach ($bundle->getCollection()->getModels() as $key => $model) {
                        $models[strtolower($key)] = $model;
                    }
                };
            }
            if ($bundle->getData() != null) {
                foreach ($bundle->getData() as $key => $d) {
                    $data[strtolower($key)] = $d;
                }
            }
            echo $this->blade->make(Config::GetAppSettingByKey('Default_View'), [
                $models, $data,
                'title' => $bundle->getTitle(),
                'view' => $bundle->getView()
            ])->render();
        }
    }
}
