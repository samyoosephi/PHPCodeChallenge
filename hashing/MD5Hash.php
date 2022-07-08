<?php

class MD5Hash implements HashStrategy
{
	private static $singleton = null;
	
	private function __construct()
	{
	}

    public function hash($data)
    {
        return md5($data);
    }

    public static function getInstance()
    {
        if (is_null(self::$singleton))
			self::$singleton = new self();
		
		return self::$singleton;
    }
}
