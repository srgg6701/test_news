<?php
$raw_url = mbsplit('/',$_SERVER['REQUEST_URI']);
// set root path
$root = 'http://' . $_SERVER['HTTP_HOST'].'/'.implode(array_slice($raw_url,1,3), '/');
$location = array_slice($raw_url,4);
$user_type = $location[0];
$controller=$user_type.ucfirst('controller');

require_once "controllers/controllers.php";

if( $user_type && !class_exists($controller)){
    //var_dump("<pre>LOCATION:",$location,"<pre/>");
    ob_start();
    require "404.php";
}else{
    if (!$user_type)
        require_once "views/default.php";
    else
        require $user_type.".php";
}