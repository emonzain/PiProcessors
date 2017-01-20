<?php 

class PiProcess { 
    public $ProcessName = ''; 
    public $ProcessStatus = ''; 
    
    
	function __construct($name)
	{
		$this->ProcessName = $name;
	}
	
	function do_action($action)
	{
		$result = false;
		switch($action)
		{
			case "on" : 
				exec("sed 'Starting process : ".$this->ProcessName." ... Result : OK !' /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = true;
				break;
				
			case "off" : 
				exec("sed 'Stopping process : ".$this->ProcessName." ... Result : OK !' /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = true;
				break;
			
			default: 
				exec("sed 'Wrong action : ".$this->ProcessName." ... Result : Error' /var/www/html/webcontrol-limo/actions_loging.txt");
				break;
		}
		
		return $result;
	}
} 

