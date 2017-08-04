<?php 

require_once("apiresult.php");

class PiActionScript { 

    public $ActionName = '';
    public $ActionCode = '';
    public $ActionUser = '';
    public $ActionUserGroup = '';
    public $ActionArgs = '';
    public $ScriptFile = '';
    
    
	function __construct($name, $script, $code)
	{
		$this->ActionName = $name;
		$this->ScriptFile = $script;
		$this->ActionCode = $code;
	}
	
	
	function do_action($action, $args)
	{
		$appDir = option()['root_dir'];
		$shellDirScript = $appDir."/shell-scripts/actionscript/".$this->ScriptFile;
		
   		$execLine = $shellDirScript;
    		foreach($args as $arg)
    		{
     			$execLine = $execLine." ".$arg;
    		}
    
		$result = false;
		$details = "";
    
		$details .= exec("echo \"Starting action script : ".$this->ActionName." / ".$this->ScriptFile." ... Result : OK\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
	  	$details .= exec($execLine);
		$result = true;
		
		
		$apiResult = new ApiResult();
		$apiResult->Result = $result;
		$apiResult->Item = $result;
		$apiResult->Details = $details;
		
		
		return $apiResult;
		
	}
} 

