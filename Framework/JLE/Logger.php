<?php

namespace Jarvis\JLE;

use Jarvis\Config\Config;

class Logger
{
    private $folder;
    private $current_year;
    private $current_month;
    private $current_day;
    private $base_path;
    private $current_file;
    public function __construct($folder = null)
    {
        $datetime = new \DateTime();
        $this->folder = $folder != null ? Config::GetAppSettingByKey('Root_Folder') . $folder . '/' : Config::GetAppSettingByKey('Root_Folder') . 'Logs/';
        $this->current_year = $datetime->format('Y');
        $this->current_month = $datetime->format('F');
        $this->current_day = $datetime->format('d');
        $this->base_path = $this->folder . $this->current_year . '/' . $this->current_month;
        $this->current_file = $this->base_path . '/' . $this->current_day . '.log';
    }

    public function LogTo($message, $code, $fragment, $log_level)
    {
        $this->CreateRootFolder();
        $this->CreateMonthFolder();
        $this->CreateLogFile();
        $date = new \DateTime();

        $log = <<<LOG
        [{$log_level}][{$date->format('H:i:s')}][{$code}] : {$message}  [{$fragment}]

        LOG;

        file_put_contents($this->current_file, $log, FILE_APPEND);
    }

    private function CreateRootFolder()
    {
        if (!file_exists($this->folder)) {
            mkdir($this->folder);
            if (!$this->CheckRootFolder()) {
                mkdir($this->folder . $this->current_year);
            }
        } else {
            if (!$this->CheckRootFolder()) {
                mkdir($this->folder . $this->current_year);
            }
        }
    }
    private function CreateMonthFolder()
    {
        if (!$this->CheckMonthFolder()) {
            mkdir($this->base_path);
        }
    }
    private function CreateLogFile()
    {
        if (!$this->CheckLogFile()) {
            touch($this->current_file);
        }
    }
    private function CheckRootFolder()
    {
        if (file_exists($this->folder . $this->current_year))
            return true;
        return false;
    }
    private function CheckMonthFolder()
    {
        if (file_exists($this->base_path))
            return true;
        return false;
    }
    private function CheckLogFile()
    {
        if (file_exists($this->current_file))
            return true;
        return false;
    }
}
