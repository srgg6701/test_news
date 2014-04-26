<?php
$raw_url = mbsplit('/',$_SERVER['REQUEST_URI']);
// set root path
define('SITE_ROOT','http://' . $_SERVER['HTTP_HOST'].'/'.implode(array_slice($raw_url,1,3), '/'));
$location = array_slice($raw_url,4);
/*
 * получить имя текущего раздела.
 * Первый сегмент - условный тип юзера (default, user, admin)*/
$section = ($user_type = $location[0])? $user_type:"default";
// получить имя активного контроллера (defaultController, userController, adminController)
$controller_name=$section.ucfirst('controller');
// подключить классы контроллеров
require_once "controllers/controllers.php";
// проверить наличие контроллера (свериться с первым сегментом URL) и подключить
if(!class_exists($controller_name)){
    // если занесло не туда - предупредить :)
    require "views/404.php";
}else{
    /**
     * передать контроллерам сегменты URL, чтобы знали, к каким models/views обращаться дальше
     */
    $segments = array();
    foreach(range(1,3) as $index) // /site_name/segment1/segment2/segment3
        $segments[$index-1]   = (isset($location[$index]))? $location[$index]:NULL;
    // создать экземпляр активного контроллера и передать текущий action
    ob_start();
    $controller = new $controller_name($segments); //var_dump("<pre>",$controller,"<pre/>");
}