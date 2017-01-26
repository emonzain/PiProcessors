<?php

require_once 'src/piprocess.php';

class ProcessController
{
	static public function ListOfProcess()
	{
		$ps = explode("\n", trim(shell_exec('ps axo pid,ppid,%cpu,pmem,user,group,args --sort %cpu')));
		$it = 0;
		
		$processList = array();
		foreach($ps AS $process)
		{
			$it++;
			$processes=preg_split('@\s+@', trim($process), 7 );
			
			$newProcess = new PiProcess($it);
			$newProcess->ProcessPID = $processes[0];
			$newProcess->ProcessPPID = $processes[1];
			$newProcess->ProcessCPU = $processes[2];
			$newProcess->ProcessMem = $processes[3];			
			$newProcess->ProcessUser = $processes[4];			
			$newProcess->ProcessUserGroup = $processes[5];	
			$newProcess->ProcessCommand = $processes[6];	
			
			array_push($processList, $newProcess);
		}
			
		return json($processList);
	}
	
	
	static public function ListOfServices($filter = true)
	{
		$ps = explode("\n", trim(shell_exec('service --status-all')));
		$it = 0;
		
		$processList = array();
		foreach($ps AS $process)
		{
			$it++;
			list($brack1, $status, $brack2, $serviceName) =  $process;
			
			echo $process;
			
			if(option("filter") == null)
				option("filter", array("kodi", "php5-fpm"));
			
			if(!$filter || in_array($process, option("filter")))
			{	
				array_push($processList, new PiService($serviceName));
			}
		}
			
		return $processList;
	}
	
	
	static public function ListOfServicesJson()
	{
		return json(ProcessController::ListOfServices());
	}
}
