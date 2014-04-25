<?php

class View{

    private $cities="";
    private $news="";

    function buildCitiesList(){
        foreach(getCities() as $i=>$city){
            $this->cities.= "<option value='$i'>$city</option>";
        }
    }

    function getCities(){
        return $this->cities;
    }

    function add(){return $this->cities;

    }

    function listing(){

    }

    function news(){
        $this->news=getNews(); // gets it from model
    }

    function getNews($news_id){
        if($news_id)
            $this->news=getNews($news_id);
        return $this->news;
    }
}