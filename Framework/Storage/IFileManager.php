<?php

namespace Jarvis\Storage;

interface IFileManager
{
    public static function Write(File $file, $content, bool $append = false): bool;
    public static function Read(File $file);
}
