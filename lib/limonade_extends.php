<?php
function layoutViewBag($title, $model)
{
  set('Title', $title);
  set('Model', $model);
  
  return array('Title' => $title, 'Model' => $model );
}
