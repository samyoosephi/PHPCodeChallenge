<?php

class NotifierFile extends Notifer {
    private $file;

    public function __construct($url, $append = true)
    {
        parent::__construct($url, $append);
        $this->file = fopen($url, $append ? 'a' : 'w');
    }

    public function __destruct()
    {
        fclose($this->file);
    }

    public function send($message)
    {
        fwrite($this->file, $message);
    }

}
