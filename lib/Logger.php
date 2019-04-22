<?php

class Logger
{
	private $logObj;
	private $logFileName;
	private $handle;

	function __construct(){
		$this->logFileName = "Log.txt";
		if(!file_exists($this->logFileName)){
			$this->handle = fopen($this->logFileName, 'a') or die('Cannot open file:  '.$this->logFileName);
		}else{
			$this->handle = fopen($this->logFileName, 'a') or die('Cannot open file:  '.$this->logFileName);
		}
		
	}

	public function WriteLog($msg){
		fwrite($this->handle, $msg."\n");
	}
}