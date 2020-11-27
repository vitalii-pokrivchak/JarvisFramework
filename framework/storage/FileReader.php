<?php

namespace jarvis\storage;

use Exception;

class FileReader
{

    public static function Read(File $file)
    {
        if ($file->GetExtension() === 'json') {
            return json_decode(file_get_contents($file->GetAbsolutePath()), true);
        } else if ($file->GetExtension() === 'csv') {
            return str_getcsv(file_get_contents($file->GetAbsolutePath()));
        } else {
            return file_get_contents($file->GetAbsolutePath());
        }
    }
}
