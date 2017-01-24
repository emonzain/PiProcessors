<?php
class DebugViewController
{
  static public function ShowActionLogs()
  {    
    $html = "<h1>Logs Php</h1><br />";
    
    
		$data = explode("\n", file_get_contents('/var/www/html/webcontrol-limo/actions_loging.txt'));
		foreach($data AS $line)
		{
			$html = $html.$line."<br />";
		}   
    
    return $html;
  }
}
