<?php

namespace Jarvis\Storage;

final class JsonFileManager implements IFileManager
{
    public static function Write(File $file, $content, bool $append = false): bool
    {
        $data = json_encode($content, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
        if ($data != false) {
            if ($append) {
                $res = file_put_contents($file->GetAbsolutePath(), $data, FILE_APPEND);
            } else {
                $res = file_put_contents($file->GetAbsolutePath(), $data);
            }
            if ($res != false) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function Read(File $file)
    {
        return json_decode(file_get_contents($file->GetAbsolutePath()), true);
    }
}
