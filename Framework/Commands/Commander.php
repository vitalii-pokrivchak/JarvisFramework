<?php

namespace Jarvis\Commands;

use Jarvis\Config\Config;
use Jarvis\Core\ConfigurationManager;
use Jarvis\FS\FileManager;
use Jarvis\FS\Storage;

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
        $namespace = Config::GetAppSettingByKey('Root_Namespace') . "Models\Controllers";
        $model_namespace = Config::GetAppSettingByKey('Models_Namespace') . $model_name;
        return <<<PHP
        <?php

        namespace $namespace;

        use Jarvis\DB\SQL;
        use $model_namespace;

        class $model_controller_name
        {
            public static function All()
            {
                return SQL::Select(User::class);
            }
            public static function Get(\$id)
            {
                return SQL::Select(User::class, "WHERE id = \$id");
            }
            public static function Add(User \$user)
            {
                return SQL::Insert(\$user);
            }
            public static function Update(\$id, User \$user)
            {
                return SQL::Update(\$id, User::class);
            }
            public static function Delete(User \$user)
            {
                return SQL::Delete(\$user->id, User::class);
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

        class $model_name
        {
            public int \$id;
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
        $model_file = $this->app_folder . "Models/" . $model_name . ".php";
        if ($this->CreateFolder($this->app_folder . "Models")) {
            if ($this->CreateFile($model_file)) {
                if ($this->WriteContent(
                    $this->app_folder . "Models/",
                    $model_name . ".php",
                    $this->GetModelTemplate($model_name)
                )) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            if ($this->CreateFile($model_file)) {
                if ($this->WriteContent(
                    $this->app_folder . "Models/",
                    $model_name . ".php",
                    $this->GetModelTemplate($model_name)
                )) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public function CreateModelController($model_name): bool
    {
        $model_controller_file = $this->app_folder . "Models/Controllers/" . $model_name . "Controller" . ".php";
        if ($this->CreateFolder($this->app_folder . "Models/Controllers")) {
            if ($this->CreateFile($model_controller_file)) {
                if ($this->WriteContent(
                    $this->app_folder . "Models/Controllers/",
                    $model_name . "Controller" .  ".php",
                    $this->GetModelControllerTemplate($model_name . "Controller", $model_name)
                )) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            if ($this->CreateFile($model_controller_file)) {
                if ($this->WriteContent(
                    $this->app_folder . "Models/Controllers",
                    $model_name . "Controller" . ".php",
                    $this->GetModelControllerTemplate($model_name . "Controller", $model_name)
                )) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    private function CreateFolder($path)
    {
        if (!file_exists($path)) {
            mkdir($path);
            return true;
        } else {
            return false;
        }
    }
    private function CreateFile($path)
    {
        if (!file_exists($path)) {
            touch($path);
            return true;
        } else {
            return false;
        }
    }
    private function GetAllFilesFromDirectory($path)
    {
        $storage = new Storage($path);
        return $storage->GetFiles();
    }
    private function GetFileFromDirectory($path, $filename)
    {
        $storage = new Storage($path);
        return $storage->GetFile($filename);
    }
    private function WriteContent($path, $filename, $content)
    {
        $file = $this->GetFileFromDirectory($path, $filename);
        if ($file != false) {
            return FileManager::Write($file, $content);
        }
    }
}
