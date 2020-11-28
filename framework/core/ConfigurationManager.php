<?php

namespace jarvis\core;

use jarvis\storage\FileReader;
use jarvis\storage\Storage;
use jarvis\config\Config;

class ConfigurationManager
{
    private string $config_path = "./app/config/";
    private string $config = "app.config.json";
    public function __construct(string $config = null)
    {
        if ($config != null) {
            $storage = new Storage($this->config_path);
            $file = $storage->GetFile($config);
            Config::SetConfiguration(FileReader::Read($file));
        } else {
            $storage = new Storage($this->config_path);
            $file = $storage->GetFile($this->config);
            Config::SetConfiguration(FileReader::Read($file));
        }
    }
}
