<?php

namespace jarvis\storage;

final class CsvFileManager implements IFileManager
{
    public static function Write(File $file, $content, bool $append = false): bool
    {
        if ($append) {
            $file = fopen($file->GetAbsolutePath(), 'a+');
            $writted = false;
            if (is_array($content)) {
                foreach ($content as $c) {
                    if (is_array($c)) {
                        fputcsv($file, $c);
                        $writted = true;
                    } else {
                        $writted = false;
                        break;
                    }
                }
                if (!$writted) {
                    fputcsv($file, $content);
                }
                fclose($file);
                return true;
            } else {
                fclose($file);
                return false;
            }
        } else {
            $file = fopen($file->GetAbsolutePath(), 'w');
            $writted = false;
            if (is_array($content)) {
                foreach ($content as $c) {
                    if (is_array($c)) {
                        fputcsv($file, $c);
                        $writted = true;
                    } else {
                        $writted = false;
                        break;
                    }
                }
                if (!$writted) {
                    fputcsv($file, $content);
                }
                fclose($file);
                return true;
            } else {
                fclose($file);
                return false;
            }
        }
    }
    public static function Read(File $file)
    {
        return str_getcsv(file_get_contents($file->GetAbsolutePath()));
    }
}
