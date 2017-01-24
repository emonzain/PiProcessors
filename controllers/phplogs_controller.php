<?php
class PhpLogsReader
{
  static public function ShowPhpLogs()
  {
    $logs = explode("\n", trim(shell_exec('cat /var/log/php5-fpm.log')));
    
    $html = "";
		foreach($logs AS $line)
		{
      $html = $html.$line."</br>";
    }
    
    return $html;
  }
}
