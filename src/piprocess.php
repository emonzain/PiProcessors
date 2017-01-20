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
				exec("sudo echo -e \"Starting process : ".$this->ProcessName." ... Result : OK !\" >> /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = true;
				break;
				
			case "off" : 
				exec("sudo echo -e \"Stopping process : ".$this->ProcessName." ... Result : OK !\" >> /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = true;
				break;
			
			default: 
				exec("sudo echo -e \"Wrong action : ".$this->ProcessName." ... Result : Error\" >> /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = false;
				break;
		}
		
		return $result;
	}
} 

