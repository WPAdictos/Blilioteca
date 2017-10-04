<?php

function __autoload($class_name)
{
  if(file_exists(('./classes/'.$class_name . '.php')))
    require_once ('./classes/'.$class_name . '.php');

  if(file_exists('./daos/'.$class_name . '.php'))
    require_once ('./daos/'.$class_name . '.php');
  if(file_exists('./util/'.$class_name . '.php'))
    require_once ('./util/'.$class_name . '.php');
}

