<?php
// будем получать данные
require_once "models/models.php";
// будем полечать HTML-фрагменты, общие для нескольких разделов
require_once "views/html.php";
// будем вызывать методы формирования представлений
require_once "views/views.php";

function getView($action,$section){
    $view = new View();
    if(!method_exists($view,$action))
        require_once "views/404.php";
    else {
        $view->$action();
        require_once "views/".$section."/".$action.".php";
    }
}

class defaultController{
    function __construct($action=NULL){
        $view = new View();
        $view->buildCitiesList(getCities());
        $this->citiesList = $view->getCities();
        require_once "views/default.php";
    }
}
class userController{
    function __construct($action=NULL){
        getView($action,'user');
        /*$view = new View();
        if(!method_exists($view,$action))
            require_once "views/404.php";
        else {
            $view->$action();
            require_once "views/user/".$action.".php";
        }*/
    }
}
class adminController{
    function __construct($action=NULL){
        if(!$action) $action = "listing";
        getView($action,'admin');
        /*$view = new View();
        if(!method_exists($view,$action))
            require_once "views/404.php";
        else {
            $view->$action();
            require_once "views/admin/".$action.".php";
        }*/
    }
}
