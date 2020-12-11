<?php

namespace Jarvis\Core;

use Jarvis\Storage\Storage;
use Jarvis\Config\Config;
use Jarvis\Storage\FileManager;

class ConfigurationManager
{
    private string $config_path = "./App/Config/";
    private string $config = "App.json";
    public function __construct(string $config = null)
    {
        $file = $config ?? $this->GetConfigurationFile() ?? $this->GetConfigurationFile($config);
        if ($file) {
            Config::SetConfiguration(FileManager::Read($file));
        }
    }
    private function GetConfigurationFile(string $config = null)
    {
        $storage = new Storage($this->config_path);
        $file = $config ?? $storage->GetFile($this->config) ?? $storage->GetFile($config);
        return $file;
    }
}
