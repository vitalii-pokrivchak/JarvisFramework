<?php

namespace jarvis\storage;

class Storage
{
    private array $files;
    public function __construct(string $path)
    {
        $directory = new \RecursiveDirectoryIterator($path);
        $iterator = new \RecursiveIteratorIterator($directory);
        foreach ($iterator as $info) {
            if ($info->getFilename() != '.' && $info->getFilename() != '..')
                $this->files[] = new File($info->getFilename(), $info->getATime(), $info->getRealPath(), $info->getPath(), $info->getExtension(), $info->getSize());
        }
    }
    public function GetFiles(): array
    {
        return $this->files;
    }
    public function GetFile(string $filename)
    {
        foreach ($this->files as $file) {
            if ($file->GetFileName() === $filename) {
                return $file;
            }
        }
        return false;
    }
}
