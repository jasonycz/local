<?php

/**
* 
*/
date_default_timezone_set('PRC');
ini_set('date.timezone','Asia/Shanghai');

class Log
{

	public function createLog($data,$log_path = ''){
		if(empty($log_path)){
			$filename = '../log'.'/'.date("Ym").'.log';
		}else{
			$filename = $log_path.date("Ym").'.log';
		}
		
		$data = "[" .date('Y-m-d H:i:s'). "]" .$data;
		file_put_contents($filename, $data."\r\n", FILE_APPEND);
	}

}