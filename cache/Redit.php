<?php


class Redis implements CacheInterface {
    public function connect(string $host, string $port) {
      //connect logic
    }
    
    public function get(string $key){
      //get
    }
    
    public function set(string $key, string $value, string $is_compressed=null, string $ttl=null) {
      //set
    }
    
    public function lpush(string $key, string $value) {
      // lpush
    }
}