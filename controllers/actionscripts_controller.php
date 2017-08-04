<?php

require_once 'src/piactionscript.php';

class ActionScriptController
{
	static public function ListOfActions()
	{
		$actionsList = array();
			
		$newProcess = new PiActionScript("Reboot", "action_reboot.sh", "toober");
		array_push($actionsList, $newProcess);
			
			
		$newProcess = new PiActionScript("Open Door", "action_opendoor.sh", "opd");
		array_push($actionsList, $newProcess);
		
		return $actionsList;
	}
	
	
	
	static public function ListOfActionsJson()
	{
		return json(ActionScriptController::ListOfActions());
	}
}

