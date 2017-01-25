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
      $this->IsLoaded = substr(substr(trim($data[1]), strlen("Loaded:")), 0, strlen("loaded")) === "loaded";
      $this->IsActive = substr(substr(trim($data[2]), strlen("Active:")), 0, strlen("active")) === "active";
      $this->IsRunning = !strpos($data[2], "(running)") > 0;
    }
	
    function get_infos()
    {
      $details = shell_exec("service ".$this->ServiceName." status");
      
      return $details;
    }
    
    
}
