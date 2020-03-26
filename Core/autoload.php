<?php

function autoload($rawclass)
{
    
    $class = str_replace("\\", "/", $rawclass) . ".php";
    
    if (file_exists($class))
    {
        require_once $class;
    }
    elseif(file_exists("src/$class"))
    {
        require_once "src/$class";
    }
    else
    {
        die;
    }
}
spl_autoload_register("autoload");