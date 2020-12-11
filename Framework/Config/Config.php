<?php

namespace Jarvis\Config;

class Config
{
    private static array $configuration;

    public static function SetConfiguration(array $config)
    {
        self::$configuration = $config;
    }
    public static function GetAppSettings()
    {
        if (array_key_exists("Settings", self::$configuration)) {
            return self::$configuration["Settings"];
        }
    }
    public static function GetAppSettingByKey(string $key)
    {
        if (array_key_exists("Settings", self::$configuration)) {
            if (array_key_exists($key, self::$configuration["Settings"])) {
                return self::$configuration["Settings"][$key];
            }
        }
    }
    public static function GetDatabaseSettings()
    {
        if (array_key_exists("Database", self::$configuration)) {
            return self::$configuration["Database"];
        }
    }
    public static function GetDatabaseSettingByKey(string $key)
    {
        if (array_key_exists("Database", self::$configuration)) {
            if (array_key_exists($key, self::$configuration["Database"])) {
                return self::$configuration["Database"][$key];
            }
        }
    }
    public static function GetSettings(string $key)
    {
        if (array_key_exists($key, self::$configuration)) {
            return self::$configuration[$key];
        }
    }
    public static function GetSettingByKey(string $key, string $subkey)
    {
        if (array_key_exists($key, self::$configuration)) {
            if (array_key_exists($subkey, self::$configuration[$key])) {
                return self::$configuration[$key][$subkey];
            }
        }
    }
}
