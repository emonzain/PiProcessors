<?php

require_once 'src/piactionscript.php';

class ActionScriptController
{
	static public function ListOfActions()
	{
		$it = 0;
		
		$actionsList = array();
		foreach($ps AS $process)
		{
			$it++;			
			$newProcess = new PiActionScript($it);
			
			array_push($actionsList, $newProcess);
		}
			
		return json($actionsList);
	}
	
	
	
	static public function ListOfActions()
	{
		return json(ProcessController::ListOfServices());
	}
}

