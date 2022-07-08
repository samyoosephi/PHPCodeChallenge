<?php

class SHA1Hash implements HashStrategy
{
	private static $singleton = null;
	
	private function __construct()
	{
	}
	
    public function hash($data)
    {
        return sha1($data);
    }

    public static function getInstance()
    {
        if (is_null(self::$singleton))
			self::$singleton = new self();
		
		return self::$singleton;
    }
}