<?php

namespace Jarvis\DB;

use Jarvis\DB\Exceptions\ConnectionException;
use Jarvis\JLE\LogLevel;

class Connection extends \PDO
{
    /** @var string */
    private $dsn;

    /** @var string */
    private $provider;

    /** @var string */
    private $db;

    /** @var string */
    private $host;

    /** @var string */
    private $user;

    /** @var int */
    private $port;

    /** @var string */
    private $password;

    public function __construct(array $connection)
    {
        $this->db = $connection['Db'];
        $this->provider = $connection['Provider'];
        $this->host = $connection['Host'];
        $this->user = $connection['User'];
        $this->port = $connection['Port'];
        $this->password = $connection['Password'];

        $this->dsn = "{$this->provider}:host={$this->host};dbname={$this->db};port={$this->port};";

        try {
            parent::__construct($this->dsn, $this->user, $this->password);
        } catch (\PDOException $e) {
            throw new ConnectionException($e->getMessage(), $e->getCode(), LogLevel::ERROR, $e->getPrevious());
        }
    }

    /**
     * Get Connection String
     *
     * @return void
     */
    public function GetDSN()
    {
        return $this->dsn;
    }
    /**
     * Get Provider(Driver.Example:mysql,pgsql)
     *
     * @return void
     */
    public function GetProvider()
    {
        return $this->provider;
    }
    /**
     * Get Database Name
     *
     * @return void
     */
    public function GetDb()
    {
        return $this->db;
    }
    /**
     * Get Database Server Address
     *
     * @return void
     */
    public function GetHost()
    {
        return $this->host;
    }
    /**
     * Get Database Server Port
     *
     * @return void
     */
    public function GetPort()
    {
        return $this->port;
    }
    /**
     * Get Database User
     *
     * @return void
     */
    public function GetUser()
    {
        return $this->user;
    }
    /**
     * Get Database Password
     *
     * @return void
     */
    public function GetPassword()
    {
        return $this->password;
    }
}
