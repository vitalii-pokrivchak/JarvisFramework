<?php

namespace jarvis\commands;

use jarvis\config\Config;
use jarvis\core\ConfigurationManager;
use jarvis\storage\FileWritter;
use jarvis\storage\Storage;

class Commander implements ICommand
{
    private string $app_folder;
    public function __construct()
    {
        new ConfigurationManager();
        $this->app_folder = Config::GetAppSettingByKey('root_folder');
    }
    public function GetControllerTemplate($controller_name): string
    {
        $namespace = Config::GetAppSettingByKey('root_namespace') . "controllers";
        return "<?php\n\nnamespace $namespace;\n\nuse jarvis\core\Bundle;\nuse jarvis\controllers\Controller;\n\nclass $controller_name extends Controller\n{\n\tprivate Bundle \$bundle;\n\tpublic function __construct()\n\t{\n\t\t\$this->bundle = new Bundle('MyApp', 'View');\n\t}\n\tpublic function index()\n\t{\n\t\tparent::render(\$this->bundle);\n\t}\n}";
    }
    public function GetModelTemplate($model_name): string
    {
        $namespace = Config::GetAppSettingByKey('root_namespace') . "models";
        return "<?php\n\nnamespace $namespace;\n\nuse jarvis\models\Model;\nuse jarvis\models\ModelObject;\n\nclass $model_name extends Model\n{\n\tpublic function get_all(): array\n\t{\n\t\treturn array();\n\t}\n\tpublic function get(int \$id): ModelObject\n\t{\n\t\treturn new ModelObject;\n\t}\n\tpublic function write()\n\t{\n\t}\n\tpublic function update()\n\t{\n\t}\n\tpublic function delete()\n\t{\n\t}\n}";
    }

    public function CreateController($controller_name)
    {
        $file = $this->app_folder . "controllers/" . $controller_name . ".php";
        if (!file_exists($this->app_folder . "controllers/")) {
            if (mkdir($this->app_folder . "controllers/")) {
                if (touch($file)) {
                    $storage = new Storage($this->app_folder . "controllers/");
                    $created_file = $storage->GetFile($controller_name . ".php");
                    FileWritter::Write($created_file, $this->GetControllerTemplate($controller_name));
                } else {
                    echo "error while creating controller";
                }
            } else {
                echo "Cannot create folder";
            }
        } else {
            if (touch($file)) {
                $storage = new Storage($this->app_folder . "controllers/");
                $created_file = $storage->GetFile($controller_name . ".php");
                FileWritter::Write($created_file, $this->GetControllerTemplate($controller_name));
            } else {
                echo "error while creating controller";
            }
        }
    }
    public function CreateModel($model_name)
    {
        $file = $this->app_folder . "models/" . $model_name . ".php";
        if (!file_exists($this->app_folder . "models/")) {
            mkdir($this->app_folder . "models/");
            if (touch($file)) {
                $storage = new Storage($this->app_folder . "models/");
                $created_file = $storage->GetFile($model_name . ".php");
                FileWritter::Write($created_file, $this->GetModelTemplate($model_name));
            } else {
                echo "error while creating model";
            }
        } else {
            if (touch($file)) {
                $storage = new Storage($this->app_folder . "models/");
                $created_file = $storage->GetFile($model_name . ".php");
                FileWritter::Write($created_file, $this->GetModelTemplate($model_name));
            } else {
                echo "error while creating model";
            }
        }
    }
}
