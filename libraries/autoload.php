<?php

spl_autoload_register(function($className)
{
    //require  = libraries/controllers/article.php;
    $className = str_replace("\\", "/", $className);

    require_once("libraries/$className.php");
});