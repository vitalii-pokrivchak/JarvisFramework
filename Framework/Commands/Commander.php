<?php

namespace Jarvis\Commands;

use Jarvis\Config\Config;
use Jarvis\Core\ConfigurationManager;
use Jarvis\Storage\FileManager;
use Jarvis\Storage\Storage;

class Commander implements ICommand
{
    private string $app_folder;
    public function __construct()
    {
        new ConfigurationManager();
        $this->app_folder = Config::GetAppSettingByKey('Root_Folder');
    }
    /**
     * GetControllerTemplate
     *
     * @param  mixed $controller_name
     * @return string
     */
    public function GetControllerTemplate($controller_name): string
    {
        $namespace = Config::GetAppSettingByKey('Root_Namespace') . "Controllers";
        return <<<PHP
        <?php 
        
        namespace $namespace;

        use Jarvis\Core\Bundle;
        use Jarvis\Controllers\Controller;

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
    public function GetModelControllerTemplate($model_controller_name, $model_name): string
    {
        $namespace = Config::GetAppSettingByKey('Root_Namespace') . "Models";
        $table = strtolower($model_name);
        return <<<PHP
        <?php

        namespace $namespace;

        use Jarvis\Db\SQL;
        use Jarvis\Models\Model;

        class $model_controller_name extends Model
        {
            public function get_all(): array
            {
                return SQL::select('$table',null,$model_name::class);
            }
            public function get(int \$id): $model_name
            {
                return SQL::select('$table',"id = \$id",$model_name::class)[0];
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

    public function GetModelTemplate(string $model_name)
    {
        $namespace = Config::GetAppSettingByKey('Root_Namespace') . "Models";
        return <<<PHP
        <?php

        namespace $namespace;

        use Jarvis\Models\ModelObject;

        class $model_name extends ModelObject
        {
            
            public function GetAllData():array
            {
                return array();
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
        $file = $this->app_folder . "Controllers/" . $controller_name . ".php";
        if (!file_exists($this->app_folder . "Controllers/")) {
            if (mkdir($this->app_folder . "Controllers/")) {
                if (touch($file)) {
                    $storage = new Storage($this->app_folder . "Controllers/");
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
                $storage = new Storage($this->app_folder . "Controllers/");
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
        $model_controller_file = $this->app_folder . "Models/" . $model_name . "Model" . ".php";
        $model_file = $this->app_folder . "Models/" . $model_name . ".php";
        if (!file_exists($this->app_folder . "Models/")) {
            mkdir($this->app_folder . "Models/");
            if (touch($model_controller_file) && touch($model_file)) {
                $storage = new Storage($this->app_folder . "Models/");
                $created_model_controller_file = $storage->GetFile($model_name . "Model" . ".php");
                $created_model_file = $storage->GetFile($model_name . ".php");
                if ((FileManager::Write($created_model_controller_file, $this->GetModelControllerTemplate($model_name . "Model", $model_name))) && (FileManager::Write($created_model_file, $this->GetModelTemplate($model_name)))) {
                    return true;
                }
            } else {
                return false;
            }
        } else {
            if (touch($model_controller_file)) {
                $storage = new Storage($this->app_folder . "Models/");
                $created_model_controller_file = $storage->GetFile($model_name . "Model" . ".php");
                $created_model_file = $storage->GetFile($model_name . ".php");
                if ((FileManager::Write($created_model_controller_file, $this->GetModelControllerTemplate($model_name . "Model", $model_name))) && (FileManager::Write($created_model_file, $this->GetModelTemplate($model_name)))) {
                    return true;
                }
            } else {
                return false;
            }
        }
    }
}
