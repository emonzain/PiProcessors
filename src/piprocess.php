<?php 

require("apiresult.inc");

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
		$details = "";
		switch($action)
		{
			case "on" : 
				$details = exec("sudo echo \"Starting process : ".$this->ProcessName." ... Result : OK\" | sudo tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = true;
				break;
				
			case "off" : 
				$details = exec("sudo echo \"Stopping process : ".$this->ProcessName." ... Result : OK\" | sudo tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = true;
				break;
			
			default: 
				$details = exec("sudo echo \"Wrong action : ".$this->ProcessName." ... Result : Error\" | sudo tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = false;
				break;
		}
		
		
		$apiResult = new ApiResult();
		$apiResult->Result = $result;
		$apiResult->Item = $result;
		$apiResult->Details = $details;
		
		
		return $apiResult;
		
	}
} 

