<?php
class PhpLogsReader
{
  static public function ShowPhpLogs()
  {
    $html = file_get_contents('/var/log/httpd/php5-fpm.log');
    
    return $html;
  }
}
