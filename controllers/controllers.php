<?php

echo "<hr>called controller: ".$controller."<hr>";

class userController{
    function __construct(){
        echo "<div>Hello! I am the ".__CLASS__." constructor!</div>";
    }
}
class adminController{
    function __construct(){
        echo "<div>Hello! I am the ".__CLASS__." constructor!</div>";
    }
}
