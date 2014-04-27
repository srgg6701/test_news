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
        if(isset($_SESSION['news_subject'])){
            $subject = $_SESSION['news_subject'];
            unset($_SESSION['news_subject']);
        }else
            $subject = '';
        if(isset($_SESSION['news_text'])){
            $text = $_SESSION['news_text'];
            unset($_SESSION['news_text']);
        }else
            $text = '';


        $html = '<div role="form_elements" class="floatLeft">
            <input name="subject" type="text" placeholder="Заголовок новости" value="'.$subject.'">
            <textarea name="news_text" placeholder="Текст новости...">'.$text.'</textarea>
        </div>';
        return $html;
    }

    public static function createCitiesList($cities,$filter=NULL){
        $apply_filter = ($filter&&!empty($filter))? true:false;
        $cList='';
        foreach($cities as $city_id => $city):
            $cList.='
                <label>
                    <input type="checkbox" value="' . $city_id . '"  name="city['.$city_id.']"';
            if($apply_filter && in_array($city_id, $filter))
                $cList.=' checked';
            $cList.='>'.$city. '
                </label>';
        endforeach;
        return $cList;
    }

    public static function citiesList($cities,$filter=null){
        $cList = '<div role="cities_list" class="floatLeft">
            <label class="width100">
                <input type="checkbox" id="all_boxes"> Все города</label>
                <div role="boxes_box">';
        $cList.= self::createCitiesList($cities,$filter);
        $cList.='
            </div>
        </div>';
        return $cList;
    }
}