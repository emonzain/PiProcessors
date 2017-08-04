<?php 

require_once("apiresult.php");

class PiActionScript { 

    public $ActionName = '';
    public $ActionUser = '';
    public $ActionUserGroup = '';
    public $ActionArgs = '';
    public $ScriptFile = '';
    
    
	function __construct($name, $script)
	{
		$this->ActionName = $name;
		$this->ScriptFile = $script;
	}
	
	
	function do_action($action, $args)
	{
		$appDir = option()['root_dir'];
		$shellDirScript = $appDir."/shell-scripts/actionscript/".$this->ScriptFile;
		
    $execLine = $shellDirScript;
    foreach($arg as $args)
    {
      $shellDirScript = $shellDirScript." ".$arg;
    }
    
		$result = false;
		$details = "";
    
		$details .= exec("echo \"Starting action script : ".$this->ActionName." / ".$this->ScriptFile." ... Result : OK\" | tee -a /var/www/html/webcontrol-limo/actions_loging.txt");
	  $details .= exec($shellDirScript." ".$this->ProcessName." start");
		$result = true;
		
		
		$apiResult = new ApiResult();
		$apiResult->Result = $result;
		$apiResult->Item = $result;
		$apiResult->Details = $details;
		
		
		return $apiResult;
		
	}
} 

