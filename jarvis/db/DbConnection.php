<?php

namespace jarvis\db;

class DbConnection extends \mysqli
{
    public function __construct($host, $user, $password, $db_name, $port)
    {
        parent::__construct($host, $user, $password, $db_name, $port);
        if ($this->connect_error) {
            echo "Connection Error : " . $this->connect_errno . $this->connect_error;
        }
    }
    public function close()
    {
        parent::close();
    }
}
