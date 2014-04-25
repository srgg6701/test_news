<?php
// будем получать данные
require_once "models/models.php";
// будем полечать HTML-фрагменты, общие для нескольких разделов
require_once "views/html.php";
// будем вызывать методы формирования представлений
require_once "views/views.php";

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
        echo "<div>Hello! I am the ".__CLASS__." constructor!</div>";
    }
}
class adminController{
    function __construct($action=NULL){
        //echo "<div>Hello! I am the ".__CLASS__." constructor!<hr>Action: $action</div>";
        $view = new View();
        $view->$action();
        require_once "views/".$action.".php";
    }
}
