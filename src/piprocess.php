<?php 

require("apiresult.php");

class PiProcess { 

    public $ProcessName = '';
    public $ProcessStatus = '';
    public $ProcessPID = '';
    public $ProcessPPID = '';
    public $ProcessCPU = '';
    public $ProcessMem = '';
    public $ProcessUser = '';
    public $ProcessUserGroup = '';
    public $ProcessArgs = '';
    
    
	function __construct($name)
	{
		$this->ProcessName = $name;
	}
	
	function get_infos()
	{
		$details = shell_exec("service kodi status");
		return $details;
	}
	
	
	function do_action($action)
	{
		$appDir = option()['root_dir'];
		$shellDirScript = $appDir."/shell-scripts/piprocessors-action.sh";
		
		$result = false;
		$details = "";
		switch($action)
		{
			case "on" : 
				$details .= exec("echo \"Starting process : ".$this->ProcessName." ... Result : OK\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$details .= exec($shellDirScript." ".$this->ProcessName." start");
				$result = true;
				break;
				
			case "off" : 
				$details .= exec("echo \"Stopping process : ".$this->ProcessName." ... Result : OK\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
				$details .= exec($shellDirScript." ".$this->ProcessName." stop");
				$result = true;
				break;
			
			default: 
				$details .= exec("echo \"Wrong action : ".$this->ProcessName." ... Result : Error\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
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

