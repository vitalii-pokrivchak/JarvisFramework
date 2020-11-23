<?php

namespace jarvis\db;

class Database extends \PDO
{
    private array $errors;
    public function __construct(string $dbdriver, string $dbhost, string $dbname, int $port, string $dbuser = null, string $dbpass = null)
    {
        foreach (parent::getAvailableDrivers() as $driver) {
            if ($dbdriver != $driver) {
                $this->errors[] = "{$dbdriver} Driver maybe not installed";
            }
        }
        $dsn = "$dbdriver:host=$dbhost;port=$port;dbname=$dbname";
        parent::__construct($dsn, $dbuser, $dbpass);
    }
    public function GetErrors()
    {
        return $this->errors;
    }
}
