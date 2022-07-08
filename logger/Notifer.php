<?php

abstract class Notifer {
    protected $url, $append;

    public function __construct($url, $append = true)
    {
        $this->url = $url;    
        $this->append = $append;    
    }

    abstract function send($message);
}
