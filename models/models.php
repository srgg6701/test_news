<?php
/**
 * Получить список городов
 */
function getCities($city_id=NULL){
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare("SELECT `id`, `city_name` FROM cities ORDER BY `id`");
    $sth->execute();
    $cities = array();
    foreach($sth->fetchAll() as $i => $data){
        $cities[$data['id']]=$data['city_name'];
    }

    if($city_id)
        return (array_key_exists($city_id, $cities))? $cities[$city_id] : false;
    return $cities;
}
/**
 * Получить новости
 */
function getNews($news_id=NULL,$limit=false, $filter=false){
    $Db=new Db();
    $connect=$Db->getConnect();
    $where = "";
    if($news_id) $sub_text = "`text`";
    else{
        if (!$limit) $limit = 120;
        $sub_text = "LEFT (`text`, ".$limit.") AS 'text'";
        if($filter&&$cts=getCitiesSettings()){

            $where = 'WHERE cities_id_id REGEXP "(^|,)(' .
                implode('|',$cts). ')(,|$)"';
        }
    }
    $query = "SELECT `id`,
                      DATE_FORMAT(`datetime`, '%d.%m.%Y') AS 'datetime',
                     `subject`, $sub_text, `cities_id_id`
                FROM news $where ORDER BY `id` DESC";
    $sth = $connect->prepare($query);
    $sth->execute();
    $news = array();
    foreach($sth->fetchAll(PDO::FETCH_ASSOC) as $i => $data){
        $newsid = $data['id'];
        unset($data['id']);
        $news[$newsid]=$data;
    }
    //echo "\n*******************\n";var_dump("<pre>",$news,"<pre/>");die();
    //
    if($news_id){
        if(array_key_exists($news_id, $news)) {
            return array('id'       =>$news_id,
                         'date'     =>$news[$news_id]['datetime'],
                         'subject'  =>$news[$news_id]['subject'],
                         'text'     =>$news[$news_id]['text'],
                         'cities'   =>$news[$news_id]['cities_id_id'],
                    );// array_unshift($news[$news_id],$news_id); ?!!!
        }else{
            return false;
        }
    }
    else return $news;
}
/**
 *
 */
function getNewsByCity($city_id){
    $city_news=array();
    $city_id = (string)$city_id;
    foreach(getNews(NULL,300) as $i=>$news){
        if(in_array($city_id, explode(',', $news['cities_id_id'])))
            $city_news[$i]=$news;
    }
    return $city_news;
}
/**
 * Извлечь настройки городов админа
 * */
function getCitiesSettings(){
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare("SELECT filters FROM settings LIMIT 1");
    $sth->execute();
    return explode(',',$sth->fetchColumn());
}
/**
 * Получить список городов существующей новости
 */
function getNewsCities($news_id){
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare("SELECT cities_id_id FROM news WHERE id = $news_id");
    $sth->execute();
    return explode(',',$sth->fetchColumn());
}
/**
 * Установить фильтр новостей по городам для админа
 */
function saveAdminNewsFilter($post){
    $Db=new Db();
    $connect=$Db->getConnect();
    $cities_filter = implode(',',$post['city']);
    $checkFilters = function($connect){
        $query = "SELECT count(*) FROM settings";
        $sth = $connect->prepare($query);
        $sth->execute();
        return $sth->fetchColumn();
    };
    $result = $checkFilters($connect);
    // ещё ничего не добавляли:
    if($result==0){
        $query = "INSERT INTO settings ( filters ) VALUES ('". $cities_filter ."')";
    }else{
        $query = "UPDATE settings SET filters = '" . $cities_filter ."'";
    }
    $sth = $connect->prepare($query);
    $sth->execute();
    return $post['city'];
}
/**
 * Сохранить новую новость
 */
function storeNews($post){
    if(!$post['city']) return -1;
    else $cities = implode(',',$post['city']);
    $query = "INSERT INTO news
        (datetime, subject, text, cities_id_id) VALUES
        ( '".date('Y-m-d H:i:s')."', '".
            $post['subject']."', '".
            nl2br($post['news_text']) ."', '". $cities ."' )";
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare($query);
    return $sth->execute();
}
/**
 * Сохранить изменения новости
 */
function saveNews($news_id, $post){
    if(!$post['city']) return -1;
    $query = "UPDATE news SET `datetime` = '". date('Y-m-d H:i:s')."'";
    if($post['subject'])
        $query.= ", `subject` = '".$post['subject']."'";
    if($post['text'])
        $query.= ", `text` = '".nl2br($post['text'])."'";
    $query.= ", `cities_id_id` = '".implode(',', $post['city'])."' WHERE id = $news_id";
    echo "<div>$query</div>"; die();
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare($query);
    return $sth->execute();
}
/**
 * Удалить новость
 */
function removeNews($news_id){
    $query = "DELETE FROM news WHERE id = $news_id";
    $Db=new Db();
    $connect=$Db->getConnect();
    $sth = $connect->prepare($query);
    return $sth->execute();
}
