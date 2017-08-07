<?php

require_once 'lib/limonade.php';
require_once 'lib/limonade_extends.php';
require_once 'src/piprocess.php';
require_once 'src/piservice.php';
require_once 'src/fontchar.php';
require_once 'controllers/process_controller.php';
require_once 'controllers/debugview_controller.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

function configure()
{
	layout('_default_layout.php');
  	option('pages_dir', file_path(option('root_dir'), 'pages'));
}

dispatch('/mylayout', 'mylayout');
	function mylayout()
	{
	  return json(layoutViewBag("Mes services :)", $processes));
	}

dispatch('/', 'hellolimo');
	function hellolimo()
	{
	  return html('index.html.php');
	}

dispatch('/accueil', 'accueil');
	function accueil()
	{
		$processes = ProcessController::ListOfServices();
		$actionscript = ActionScriptController::ListOfActions();
		
		$accueilModel = array('services' => $processes, 'actions' => $actionscript);
		
	  	return render('accueil.html.php', layout(), layoutViewBag("Mes services :)", $accueilModel));
	}
	
dispatch('/process/:name/:action', 'actionprocess');
	function actionprocess()
	{		
		$proc_name = params('name');
		$do_action = params('action');
		
		$process = new PiProcess($proc_name);
		$result = $process->do_action($do_action);
		
		$json_object = array('item' => $process ,'action' => "$do_action", 'result' => $result);
		
		return json($json_object);
	}
	
	
dispatch('/actionscript/:code/:args', 'actionscript');
	function actionscript()
	{		
		$actioncode = params('code');
		$actionargs = params('args');
		
		$actionscript = ActionScriptController::GetActionScript($actioncode);
		$result = $actionscript->do_action($actionargs);
		
		$json_object = array('item' => $actionscript, 'result' => $result);
		
		return json($json_object);
	}
	
dispatch('/actions/:code', 'actionsdetails');
	function actionsdetails()
	{		
		$actioncode = params('code');
		
		$actionscript = ActionScriptController::GetActionScript($actioncode);
		
		
	  	return render('actiondetail.html.php', layout(), layoutViewBag($actionscript->ActionName, $actionscript));
	}

dispatch('/service/:name', 'service_infos');
	function service_infos()
	{		
		$proc_name = params('name');
		
		$service = new PiService($proc_name);
		
				
		$object = new ApiResult();
		$object->Result = $service != null;
		$object->Details = "infos";
		$object->Item = $service;
		
		return json($object);
	}
	
dispatch('/service/:name/:action', 'actionservice');
	function actionservice()
	{		
		$proc_name = params('name');
		$do_action = params('action');
		
		$service = new PiService($proc_name);
		$json_object = $service->do_action($do_action);
		
		// = array('item' => $result ,'action' => 'info', 'result' => $result != null );
		
		return json($json_object);
	}

	
dispatch('/process-list', 'ProcessController::ListOfProcess');
dispatch('/service-list', 'ProcessController::ListOfServicesJson');
dispatch('/action-list', 'ActionScriptController::ListOfActionsJson');
	
dispatch('/phplogs', 'PhpLogsReader::ShowPhpLogs');
	
dispatch('/debugview', 'DebugViewController::ShowActionLogs');


run();
