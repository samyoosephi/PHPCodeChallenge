<?php

class CacheManager
{
    private $cache;
	
	public function __construct(CacheInterface $cache) {
		$this->cache = $cache;
	}
	
    public function connect(string $host, string $port){
        $this->cache->connect($host,$port);
    }

    public function get(string $key){
        return $this->cache->get($key);
    }
	
	public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) {
		$this->cache->set($key,$value,$is_compressed, $ttl);
	}
	
	public function lpush(string $key, string $value) {
		$this->cache->lpush($key,$value);
	}
}