<?php

namespace Jarvis\DB\Exceptions;

use Illuminate\Support\Facades\Log;
use Jarvis\JLE\Logger;
use Jarvis\JLE\LogLevel;

class ConnectionException extends \Exception
{
    protected $message;
    protected $code;
    protected $date;
    protected $previous;
    protected $log_level;
    private Logger $logger;

    public function __construct($message, $code, $log_level, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = $message;
        $this->code = $code;
        $this->log_level = $log_level;
        $this->date = new \DateTime();
        $this->previous = $previous;
        $this->logger = new Logger();
        $this->Log();
    }
    public function GetExceptionMessage(): string
    {
        return $this->message;
    }
    public function GetExceptionCode(): int
    {
        return $this->code;
    }
    public function GetExceptionDate(): \DateTime
    {
        return $this->date;
    }
    public function GetFragment(): string
    {
        return __CLASS__;
    }
    public function Log()
    {
        $this->logger->LogTo($this->message, $this->code, __CLASS__, LogLevel::ERROR);
    }
}
