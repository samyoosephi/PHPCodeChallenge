<?php

namespace Models;

use Exception;
use mysqli;

class DatabaseMysql implements DatabaseInterface
{
    const SERVER = 'localhost';
	const USERNAME = 'root';
	const PASSWORD = '';
	const DBNAME = 'mydb';

    private static $singleton = null;
    private $conn;

    private function __construct()
	{
        $this->conn = new mysqli(self::SERVER, self::USERNAME, self::PASSWORD, self::DBNAME);
    
        if ($this->conn->connect_error) {
            throw new Exception("Connection failed: " . $this->error());
        }
	}
    	
	public function __destruct() 
	{
		$this->conn->close();
	}

    public function connection()
    {
        return $this->conn;
    }

    public function execute($sql)
    {
        if ($this->connection()->query($sql) !== TRUE)
            throw new Exception("Error: " . $this->connection()->error);        
    }

    public function select($sql)
    {
        return $this->connection()->query($sql);
    }

    public function fetch($result)
    {
        return $result->fetch_assoc();
    }

    public function last_id()
    {
        return $this->connection()->insert_id;
    }

    public function num_rows($result)
    {
        return $result->num_rows;
    }

    public function error()
    {
        return $this->connection()->error;
    }

    public static function getInstance()
    {
        if (is_null(self::$singleton))
			self::$singleton = new self();
		
		return self::$singleton;
    }
}