<?php
class HTML{
    static function Legend($order="listing"){
        $news = "Новости по городам";
        $add = "Добавить новость";
        if($order=="listing"){
            $first = $news;
            $next = $add;
            $link = "add";
        }else{
            $first = $add;
            $next = $news;
            $link = "listing";
        }?>
        <legend>
            <div><?php echo $first;?>
                &nbsp; | &nbsp;
            <a href="<?php echo SITE_ROOT;?>/admin/<?php echo $link;?>"><?php echo $next?></a></div>
        </legend><?php
    }
}?>