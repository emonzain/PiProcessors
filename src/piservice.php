<?php

require_once("apiresult.php");

class PiService
{  
    public $ServiceName = '';
    public $ServiceStatus = '';    
    public $ServiceDesc = '';
    public $IsActive = false;
    public $IsRunning = false;
    public $IsLoaded = false;
    
    
    function __construct($name)
    {
      $this->ServiceName = $name;
      
      $details = $this->get_infos();
      
      $data = explode("\n", trim($details));
      $this->ServiceDesc = trim($data[0]);
      //$this->IsLoaded = substr(substr(trim($data[1]), strlen("Loaded:")), 0, strlen("loaded")) === "loaded";
      //$this->IsActive = substr(substr(trim($data[2]), strlen("Active:")), 0, strlen("active")) === "active";
      //$this->IsRunning = !strpos($data[2], "(running)") > 0;
	    
      $this->IsLoaded = substr(trim(substr(trim($data[1]), strlen("Loaded:"))), 0, strlen("loaded")) === "loaded";
      $this->IsActive = substr(trim(substr(trim($data[2]), strlen("Active:"))), 0, strlen("active")) === "active";
      $this->IsRunning = strpos($data[2], "(running)") > 0;
    }
	
    function get_infos()
    {
      $details = shell_exec("service ".$this->ServiceName." status");
      
      return $details;
    }
    
	
	function do_action($action)
	{
		$appDir = option()['root_dir'];
		$shellDirScript = $appDir."/shell-scripts/piservices-action.sh";
		
		$result = false;
		$details = "";
		switch($action)
		{
			case "on" : 
				$details .= exec("echo \"Starting process : ".$this->ServiceName." ... Result : OK\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$details .= exec($shellDirScript." ".$this->ServiceName." start");
				$result = true;
				break;
				
			case "off" : 
				$details .= exec("echo \"Stopping process : ".$this->ServiceName." ... Result : OK\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$details .= exec($shellDirScript." ".$this->ServiceName." stop");
				$result = true;
				break;
			
			default: 
				$details .= exec("echo \"Wrong action : ".$this->ServiceName." ... Result : Error\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$result = false;
				break;
		}
		
		
		$apiResult = new ApiResult();
		$apiResult->Result = $result;
		$apiResult->Item = new PiService($this->ServiceName);
		$apiResult->Details = $details;
		
		
		return $apiResult;
		
	}
    
}
