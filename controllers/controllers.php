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
        /**
          * getCities() - получает данные (список городов) из модели*/
        $view->buildCitiesList(getCities());
        /**
         * сохраняет данные (content) для извлечения
          на странице с шаблоном текущего представления */
        $this->content = $view->getCitiesList();
        require_once "views/default.php";
    }
}
class userController{
    //private $content = array();
    function __construct($address = array(NULL,NULL,NULL)){
        $section = $address[0]; // user/news
        $city_id = $address[1]; // user/news/[city_id]
        $news_id = $address[2]; // user/news/[city_id]/[news_id]
        $err=false;
        if($section!=='news') // указана остутствующая секция (первый сегмент)
            $err = 'section';
        else { // секция правильная
            // представление по умолчанию
            $view_name = "news";
            $this->content = new stdClass(); // создать объект для сохранения данных
           /**
            * user не может смотреть новости, не выбрав регион. Sorry, Dude...
            * и, кстати, нельзя смотреть новости несуществующего города... Или можно? :)*/
            if(!$city_id||!$this->content->city = getCities($city_id)){
                //echo "<div>NO city_id OR city</div>"; die();
                $err ='city';
            }else{ //echo "<div>city: ".$this->content->city."</div>";
                $this->content->city_id = $city_id;
                /**
                 * Получить либо одну новость по её id,
                либо все (/все по выбранному региону) */
                if($news_id) { // получили семент с id новости
                    $this->content->single_news = getNews($news_id);
                    $view_name = "single_news";
                }else{ //echo "<div>getCities:</div>"; var_dump("<pre>",getCities($city_id),"<pre/>");
                    $this->content->feed = getNewsByCity($city_id);
                }
            }
        }
        // момент истины :)
        require_once ($err)?  "views/404.php" : "views/user/".$view_name.".php";
    }
}
class adminController{
    function __construct($address = array(NULL)){
        if(!$address[0]){
            $page = "listing";
        }
        else{
            $view = new View();
            if(!method_exists($view,$action))
                require_once "views/404.php";
            else {
                $view->$action();
                require_once "views/admin/".$page.".php";
            }
        }
    }
}
