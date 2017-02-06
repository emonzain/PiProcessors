<?php
class PhpLogsReader
{
  static public function ShowPhpLogs()
  {   

    $html = "<h1>Logs Php</h1><br />";
    
    
		$data = explode("\n", file_get_contents('/var/www/html/webcontrol-limo/PiProcessors/php5-fpm.log'));
		foreach(array_reverse($data) AS $line)
		{
			$html = $html.$line."<br />";
		}   
    
    return $html;    
  }
}
