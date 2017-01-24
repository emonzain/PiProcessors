<?php
class DebugViewController
{
  static public function ShowActionLogs()
  {    
    $html = "<h1>Logs Php</h1><br />";
    $html = $html.file_get_contents('/var/www/html/webcontrol-limo/actions_loging.txt');
    
    return $html;
  }
}
