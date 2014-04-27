<?php

class View{
    // данные для шаблона (<options>)
    private $citiesList="";
    // ...для новостей
    private $newsList="";

    public function buildCitiesList($cities){
        foreach($cities as $i=>$city){
            $this->citiesList.= "<option value='$i'>$city</option>";
        }
    }

    public function getCitiesList(){
        return $this->citiesList;
    }

    public static function formFields(){
        return '<div role="form_elements" class="floatLeft">
            <input name="subject" type="text" placeholder="Заголовок новости">
            <textarea name="news_text" placeholder="Текст новости..."></textarea>
        </div>';
    }

    public static function createCitiesList($cities){
        $cList='';
        foreach($cities as $city_id => $city):
            $cList.='
                <label>
                    <input type="checkbox" value="' . $city_id . '"  name="city['.$city_id.']" checked>
                    '.$city. '
                </label>';
        endforeach;
        return $cList;
    }

    public static function citiesList($cities){
        $cList = '<div role="cities_list" class="floatLeft">
            <label class="width100">
                <input type="checkbox" id="all_boxes"> Все города</label>
                <div role="boxes_box">';
        $cList.= self::createCitiesList($cities);
        $cList.='
            </div>
        </div>';
        return $cList;
    }
}