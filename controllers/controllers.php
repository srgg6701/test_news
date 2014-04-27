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
        $this->content = new stdClass();
        $err = false;
        // просмотр всех новостей
        if(!$segment=$address[0]){ // /admin
            $this->content->cities = getCities();
            $this->content->news = getNews();
            $included_file='listing';
        }else{
            if($segment!='remove'&&$segment!='save'){ // /add или /[id_новости]
                /**
                 Если будем просматривать (и, возможно, здесь же и редактировать)
                 новость или загружаем раздел создания новости, нам нужны общие
                 блоки, формируемые во View: */
                $view = new View();
                $this->content->form_fields = $view->formFields();
                $this->content->cities_filter = $view->citiesList(getCities());
            }
            /**
            Если не загружаем страницу добавления новости */
            if($segment!='add'){
                /**
                Наличие первого сегмента уже проверено в начале метода.
                Поскольку мы здесь, это значит, что:
                - он (первый сегмент) есть и
                - он - НЕ 'add'. Т.е., делаем что-либо с существующей новостью -
                  - просматриваем (/id_новости)
                  - удаляем (/remove/id_новости)
                  - сохраняем (/save/id_новости)
                если id новости отсутствует, - 404*/
                //$removing = false;
                // Если удаляем или сохраняем новость
                if($segment=='remove'||$segment=='save'){
                    $news_id = $address[1]; // id новости
                    /**
                    удалить новость
                    или сохранить изменения в существующей
                    или сохранить новую ($news_id = new)
                    */
                    // будем загружать стр. со списком всех новостей
                    $included_file = 'listing';

                    echo "<h2>".$segment.'/'.$news_id."</h2>";
                    var_dump("<pre>",$_POST,"<pre/>");

                }else{ // /[id_новости] - просмотр
                    $news_id = $segment;
                    // будем загружать стр. с просмотром индивидуальной новости
                    $included_file = "single_news";
                }
                // Т.к. id новости необходим (см.выше), его отсутствие означает 404
                if($news_id != 'new' && !$this->content->single_news = getNews($news_id))
                    $err='news_id';
                /**
                 id новости найден, всё ОК - сформируем сообщение об удалении
                 или сохранении новости */
                elseif($segment=='remove'||$segment=='save'){
                    $this->content->result= ($segment=='remove') ?
                        "Новость удалена. Хотя... чёрт её знает..."
                        : "Новость сохранена!"; //header("location: ".SITE_ROOT."/admin"); //die();
                }
            }else{ // если сегмент == add, используем его имя в качестве подключаемого файла
                $included_file = $segment;
            }
        }
        // ? не попадаем сюда, если сохраняли или удаляли новость ?
        require_once ($err)? "views/404.php" : "views/admin/".$included_file.".php";
    }
}
