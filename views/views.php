<?php

class View{

    private $cities="";

    function buildCitiesList($cities){
        foreach($cities as $i=>$city){
            $this->cities.= "<option value='$i'>$city</option>";
        }
    }

    function getCities(){
        return $this->cities;
    }

    function add(){

    }

    function listing(){

    }
}