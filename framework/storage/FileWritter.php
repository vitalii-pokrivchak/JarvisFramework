<?php

namespace jarvis\storage;

use Exception;

class FileWritter
{

    public static function Write($file, $content, bool $append = false)
    {
        if (!is_bool($file) && $file instanceof File) {
            if ($file->GetExtension() === 'json') {
                $data = json_encode($content, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
                file_put_contents($file->GetAbsolutePath(), $data);
            } else if ($file->GetExtension() == 'csv') {
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
                    } else {
                        fclose($file);
                        return false;
                    }
                }
            }
        } else {
            return false;
        }
    }
}
