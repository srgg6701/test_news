<?php
// будем получать данные
require_once "models/models.php";
// будем полечать HTML-фрагменты, общие для нескольких разделов
require_once "views/html.php";
// будем вызывать методы формирования представлений
require_once "views/views.php";

class defaultController{
    function __construct($address = array()){
        $view = new View();
        $view->buildCitiesList(); // get from models
        $this->content = $view->getCities();
        require_once "views/default.php";
    }
}
class userController{
    function __construct($address = array(NULL,NULL,NULL)){
        $action  = $address[0];
        $city_id = $address[1];
        $news_id = $address[2];
        $view = new View();
        if(!method_exists($view,$action))
            require_once "views/404.php";
        else {
            /**  вызывает метод по умолчанию - news() -
            извлечь и сохранить во view все новости.
            Если получили id конкретной новости (см. ниже)
            вызов метода пропускается, т.к. все новости
            в этом случае нам не нужны. Единственная новость
            извлекается дальше, методом getNws() с передачей
            id. Если он равен NULL - извлекаем ранее
            сохранённые новости из view */
            if(!$news_id)
                $view->$action();
            if($city_id) // если $news_id == NULL, будем извлекать все новости, иначе - только конкретную по её id
                $this->content = $view->getNews($news_id);
            require_once "views/user/".$action.".php";
        }
    }
}
class adminController{
    function __construct($address = array(NULL)){
        $action=$address[0];
        if(!$action) $action = "listing";
        $view = new View();
        if(!method_exists($view,$action))
            require_once "views/404.php";
        else {
            $view->$action();
            require_once "views/admin/".$action.".php";
        }
    }
}
