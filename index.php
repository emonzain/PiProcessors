<?php

require_once 'lib/limonade.php';
require_once 'lib/limonade_extends.php';
require_once 'src/piprocess.php';
require_once 'src/piservice.php';
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
	  return json(array("layout" => layout()));
	}

dispatch('/', 'hellolimo');
	function hellolimo()
	{
	  return html('index.html.php');
	}

dispatch('/accueil', 'accueil');
	function accueil()
	{
		$processes = array("data" => "tadada");//ProcessController::ListOfServices();
	  	return render('accueil.html.php', layout(), layoutViewBag("Mes services :)", $processes));
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
	
dispatch('/service/:name', 'service_infos');
	function service_infos()
	{		
		$proc_name = params('name');
		
		$service = new PiService($proc_name);
		
		$json_object = array('item' => $service ,'action' => 'info', 'result' => $service != null );
		
		return json($json_object);
	}

	
dispatch('/process-list', 'ProcessController::ListOfProcess');
dispatch('/service-list', 'ProcessController::ListOfServices');
	
dispatch('/phplogs', 'PhpLogsReader::ShowPhpLogs');
	
dispatch('/debugview', 'DebugViewController::ShowActionLogs');


run();
