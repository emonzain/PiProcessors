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
			
			$data = preg_replace('!\s+!', ' ', $process);
			echo "$data".json_encode($data)."<br />";
            preg_match_all('/\S+/', $data, $serviceData);
			echo "$data".json_encode($serviceData)."<br />";
			list($brack1, $status, $brack2, $serviceName) =  $serviceData[0];
			
			echo $serviceName."<br />";
			
			if(option("filter") == null)
				option("filter", array("kodi", "php5-fpm"));
			
			echo json_encode(option("filter"));
			
			if(!$filter || in_array($serviceName, option("filter")))
			{	
				echo "=>2".$serviceName."<br />";
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
