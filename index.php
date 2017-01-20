<?php

require_once 'lib/limonade.php';


function configure()
{
  option('pages_dir', file_path(option('root_dir'), 'pages'));
}

dispatch('/', 'hellolimo');

function hellolimo()
{
  return html('index.html.php');
}

run();