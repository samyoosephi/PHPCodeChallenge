<?php

namespace Models;

use Exception;
use SQLite3;

class DatabaseSqlite extends SQLite3 implements DatabaseInterface
{
	const DBNAME = 'mydb';

    private static $singleton = null;

    private function __construct()
	{
        $this->open(self::DBNAME);
	}

    public function connection()
    {
        return $this;
    }

    public function execute($sql)
    {
        if ($this->exec($sql) !== TRUE)
            throw new Exception("Error: " . $this->error());        
    }

    public function select($sql)
    {
        return $this->query($sql);
    }

    public function fetch($result)
    {
        return $result->fetchArray(SQLITE3_ASSOC);
    }

    public function last_id()
    {
        return $this->lastInsertRowID();
    }

    public function num_rows($result)
    {
        return $this->num_rows;
    }

    public function error()
    {
        return $this->lastErrorMsg();
    }

    public static function getInstance()
    {
        if (is_null(self::$singleton))
			self::$singleton = new self();
		
		return self::$singleton;
    }
}