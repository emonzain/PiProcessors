<?php

require("../src/piprocess.php");

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
			$processes[]=preg_split('@\s+@', trim($process), 7 );
			
			$newProcess = new PiProcess($processes[0]);
			$newProcess->ProcessPID = $processes[1];
			$newProcess->ProcessPPID = $processes[2];
			$newProcess->ProcessStatus = $processes[3];
			$newProcess->ProcessCPU = $processes[3];
			$newProcess->ProcessMem = $processes[4];			
			$newProcess->ProcessUser = $processes[5];			
			$newProcess->ProcessUserGroup = $processes[6];			
			$newProcess->ProcessArgs = $processes[7];
			
			$processList = array_push($processes, $newProcess);
		}
			
		return json($processList);
	}
}