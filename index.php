<?php

require_once 'lib/limonade.php';


function configure()
{
  option('pages_dir', file_path(option('root_dir'), 'pages'));
}

dispatch('/', 'hello-limo');

function hello-limo()
{
  return html('index.html.php');
}