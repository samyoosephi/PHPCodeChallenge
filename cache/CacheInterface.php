<?php


interface CacheInterface {
	public function connect(string $host, string $port);
	public function get(string $key);
	public function set(string $key, string $value, string $is_compressed=null, string $ttl=null);
	public function lpush(string $key, string $value);
}