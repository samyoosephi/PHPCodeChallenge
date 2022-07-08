<?php

class Logger implements LoggerInterface {
	private $dateFormat; 
    private $logFormat;
    private $threshold;
    private Notifer $notifier;

	public function __construct(Notifer $notifier, $options)
    {
        date_default_timezone_set('Asia/Tehran');
        extract($options);

        if (!in_array($threshold, ['EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG', 'ALL']))
            throw new LogException("");

        $this->notifier = $notifier;
        $this->dateFormat = $dateFormat ?? 'Y-m-d H';
        $this->logFormat = $logFormat ?? '[{date}]-[{level}]-{message}';
        $this->threshold = $threshold ?? 'ALL';
    }

	public function emergency($message)
    {
        return $this->log('EMERGENCY', $message);
    }

	public function alert($message)
    {
        return $this->log('ALERT', $message);
    }

	public function critical($message)
    {
        return $this->log('CRITICAL', $message);
    }

	public function error($message)
    {
        return $this->log('ERROR', $message);
    }

	public function warning($message)
    {
        return $this->log('WARNING', $message);
    }

	public function notice($message)
    {
        return $this->log('NOTICE', $message);
    }

	public function info($message)
    {
        return $this->log('INFO', $message);
    }

	public function debug($message)
    {
        return $this->log('DEBUG', $message);
    }

	public function log($level, $message)
    {
        if (($this->threshold != 'ALL') and ($this->threshold != $level))
            return;

        if (!in_array($level, ['ALL', 'EMERGENCY', 'ALERT', 'CRITICAL', 'ERROR', 'WARNING', 'NOTICE', 'INFO', 'DEBUG']))
            throw new LogException('This level is not supported by logger');

        $date = date($this->dateFormat);
        $text = $this->logFormat;

        $text = str_replace('{date}', $date, $text);
        $text = str_replace('{level}', $level, $text);
        $text = str_replace('{message}', $message, $text);
        $text .= "\n";

        $this->notifier->send($text);
    }
}
