<?php

namespace jarvis\storage;


class File
{
    private string $filename;
    private string $modified_date;
    private string $absolute_path;
    private string $short_path;
    private string $extension;
    private int $size;
    public function __construct(string $filename, string $modified_date, string $absolute_path, string $short_path, string $extension, int $size)
    {
        $this->filename = $filename;
        $this->modified_date = $modified_date;
        $this->absolute_path = $absolute_path;
        $this->short_path = $short_path;
        $this->extension = $extension;
        $this->size = $size;
    }

    public function GetFileName()
    {
        return $this->filename;
    }
    public function GetModifiedDate()
    {
        return $this->modified_date;
    }
    public function GetAbsolutePath()
    {
        return $this->absolute_path;
    }
    public function GetShortPath()
    {
        return $this->short_path;
    }
    public function GetExtension()
    {
        return $this->extension;
    }
    public function GetSize()
    {
        return $this->size;
    }
}
