<?php
$raw_url = mbsplit('/',$_SERVER['REQUEST_URI']);
// set root path
define('SITE_ROOT','http://' . $_SERVER['HTTP_HOST'].'/'.implode(array_slice($raw_url,1,3), '/'));
$location = array_slice($raw_url,4);
// получить имя текущего раздела
$section = ($user_type = $location[0])? $user_type:"default";
// получить имя активного контроллера
$controller_name=$section.ucfirst('controller');
// подключить классы контроллеров
require_once "controllers/controllers.php";
ob_start();
// если занесло не туда - предупредить :)
if(!class_exists($controller_name)){
    require "views/404.php";
}else{
    $action = (isset($location[1]))? $location[1]:NULL;
    // создать экземпляр активного контроллера и передать текущий action
    $controller = new $controller_name($action); //var_dump("<pre>",$controller,"<pre/>");
}