<?php

class View{
    // данные для шаблона (<options>)
    private $citiesList="";
    // ...для новостей
    private $newsList="";

    function buildCitiesList($cities){
        foreach($cities as $i=>$city){
            $this->citiesList.= "<option value='$i'>$city</option>";
        }
    }

    function getCitiesList(){
        return $this->citiesList;
    }

    //function listing(){}

    //function news(){}

}