<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf4369d9948550786a0e040ef5d04cf77
{
    public static $prefixLengthsPsr4 = array (
        'j' => 
        array (
            'jarvis\\' => 7,
        ),
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'jarvis\\' => 
        array (
            0 => __DIR__ . '/../..' . '/framework',
        ),
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf4369d9948550786a0e040ef5d04cf77::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf4369d9948550786a0e040ef5d04cf77::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf4369d9948550786a0e040ef5d04cf77::$classMap;

        }, null, ClassLoader::class);
    }
}
