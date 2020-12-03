<?php

namespace jarvis\storage;

class FileManager implements IFileManager
{

    public static function Read(File $file)
    {
        if ($file->GetExtension() === 'json') {
            return JsonFileManager::Read($file);
        } else if ($file->GetExtension() === 'csv') {
            return CsvFileManager::Read($file);
        } else {
            return file_get_contents($file->GetAbsolutePath());
        }
    }
    public static function Write(File $file, $content, bool $append = false): bool
    {
        if ($file->GetExtension() === 'json') {
            return JsonFileManager::Write($file, $content, $append);
        } else if ($file->GetExtension() == 'csv') {
            return CsvFileManager::Write($file, $content, $append);
        } else {
            if ($append)
                $res = file_put_contents($file->GetAbsolutePath(), $content, FILE_APPEND);
            $res = file_put_contents($file->GetAbsolutePath(), $content, FILE_APPEND);
            if ($res === false) {
                return false;
            } else {
                return true;
            }
        }
    }
}
