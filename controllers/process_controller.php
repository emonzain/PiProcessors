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
	
	
	static public function ListOfServices()
	{
		$ps = explode("\n", trim(shell_exec('service --status-all')));
		$it = 0;
		
		$processList = array();
		foreach($ps AS $process)
		{
			$it++;
			
			array_push($processList, $process);
		}
			
		return json($processList);
	}
}
