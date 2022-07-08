<?php



interface LoggerInterface {
	
	function emergency($message);

	function alert($message);

	function critical($message);

	function error($message);

	function warning($message);

	function notice($message);

	function info($message);

	function debug($message);

	function log($level, $message);
}