<?php
class PhpLogsReader
{
  static public function ShowPhpLogs()
  {    
    $html = "<h1>Logs Php</h1><br />";
    $html = $html.file_get_contents('/var/log/httpd/php5-fpm.log');
    
    return $html;
  }
}
