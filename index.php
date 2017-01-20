<?php

require_once 'lib/limonade.php';
require_once 'src/piprocess.php';


function configure()
{
  option('pages_dir', file_path(option('root_dir'), 'pages'));
}

dispatch('/', 'hellolimo');
	function hellolimo()
	{
	  return html('index.html.php');
	}
	
dispatch('/process/:name/:action', 'actionprocess');
	function actionprocess()
	{		
		$proc_name = params('name');
		$do_action = params('action');
		
		$process = new PiProcess($proc_name);
		
		$json_object = array('item' => $process ,'action' => "$do_action", 'result' => $do_action);
		
		return json($process);
	}

run();