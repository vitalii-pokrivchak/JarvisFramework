<?php

namespace jarvis\commands;

use jarvis\config\Config;
use jarvis\core\ConfigurationManager;
use jarvis\storage\FileManager;
use jarvis\storage\Storage;

class Commander implements ICommand
{
    private string $app_folder;
    public function __construct()
    {
        new ConfigurationManager();
        $this->app_folder = Config::GetAppSettingByKey('root_folder');
    }
    /**
     * GetControllerTemplate
     *
     * @param  mixed $controller_name
     * @return string
     */
    public function GetControllerTemplate($controller_name): string
    {
        $namespace = Config::GetAppSettingByKey('root_namespace') . "controllers";
        return <<<PHP
        <?php 
        
        namespace $namespace;

        use jarvis\core\Bundle;
        use jarvis\controllers\Controller;

        class $controller_name extends Controller
        {
            private Bundle \$bundle;
            public function __construct()
            {
                \$this->bundle = new Bundle('MyApp', 'View');
            }
            public function index()
            {
                parent::render(\$this->bundle);
            }
        }
        PHP;
    }
    /**
     * GetModelTemplate
     *
     * @param  mixed $model_name
     * @return string
     */
    public function GetModelTemplate($model_name): string
    {
        $namespace = Config::GetAppSettingByKey('root_namespace') . "models";
        return <<<PHP
        <?php

        namespace $namespace;

        use jarvis\models\Model;
        use jarvis\models\ModelObject;

        class $model_name extends Model
        {
            public function get_all(): array
            {
                return array();
            }
            public function get(int \$id): ModelObject
            {
                return new ModelObject;
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
        PHP;
    }

    /**
     * CreateController
     *
     * @param  mixed $controller_name
     * @return void
     */
    public function CreateController($controller_name): bool
    {
        $file = $this->app_folder . "controllers/" . $controller_name . ".php";
        if (!file_exists($this->app_folder . "controllers/")) {
            if (mkdir($this->app_folder . "controllers/")) {
                if (touch($file)) {
                    $storage = new Storage($this->app_folder . "controllers/");
                    $created_file = $storage->GetFile($controller_name . ".php");
                    return FileManager::Write($created_file, $this->GetControllerTemplate($controller_name));
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            if (touch($file)) {
                $storage = new Storage($this->app_folder . "controllers/");
                $created_file = $storage->GetFile($controller_name . ".php");
                return FileManager::Write($created_file, $this->GetControllerTemplate($controller_name));
            } else {
                return false;
            }
        }
    }
    /**
     * CreateModel
     *
     * @param  mixed $model_name
     * @return void
     */
    public function CreateModel($model_name): bool
    {
        $file = $this->app_folder . "models/" . $model_name . ".php";
        if (!file_exists($this->app_folder . "models/")) {
            mkdir($this->app_folder . "models/");
            if (touch($file)) {
                $storage = new Storage($this->app_folder . "models/");
                $created_file = $storage->GetFile($model_name . ".php");
                return FileManager::Write($created_file, $this->GetModelTemplate($model_name));
            } else {
                return false;
            }
        } else {
            if (touch($file)) {
                $storage = new Storage($this->app_folder . "models/");
                $created_file = $storage->GetFile($model_name . ".php");
                return FileManager::Write($created_file, $this->GetModelTemplate($model_name));
            } else {
                return false;
            }
        }
    }

    public function GetAllCommands(): array
    {
        return array(
            'create:controller' => 'Create base Controller',
            'create:model' => 'Create base Model'
        );
    }
}
