<?php

class NotifierApi extends Notifer {
    private $curl;

    public function __construct($url, $append = true)
    {
        parent::__construct($url, $append);
        $this->curl = curl_init($url);
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    public function send($message)
    {
        curl_setopt($this->curl, CURLOPT_POST, true);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, 
            http_build_query(
                ['message' => $message]
            )
        );
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        
        $response = curl_exec($this->curl);
    }

}
