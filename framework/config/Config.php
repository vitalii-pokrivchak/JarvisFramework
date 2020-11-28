<?php

namespace jarvis\config;

class Config
{
    private static array $configuration;

    public static function SetConfiguration(array $config)
    {
        self::$configuration = $config;
    }
    public static function GetAppSettings()
    {
        if (array_key_exists("app_settings", self::$configuration)) {
            return self::$configuration["app_settings"];
        }
    }
    public static function GetAppSettingByKey(string $key)
    {
        if (array_key_exists("app_settings", self::$configuration)) {
            if (array_key_exists($key, self::$configuration["app_settings"])) {
                return self::$configuration["app_settings"][$key];
            }
        }
    }
    public static function GetDatabaseSettings()
    {
        if (array_key_exists("database", self::$configuration)) {
            return self::$configuration["database"];
        }
    }
    public static function GetDatabaseSettingByKey(string $key)
    {
        if (array_key_exists("database", self::$configuration)) {
            if (array_key_exists($key, self::$configuration["database"])) {
                return self::$configuration["database"][$key];
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
