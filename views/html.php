<?php
class HTML{
    public static function setLink($text,$link=false){
        if($link):
            if($link===true) $link='';?>
        <a href="<?php echo SITE_ROOT;?>/admin/<?php echo $link;?>"><?php echo $text;?></a>
    <?php
        else:  echo $text;
        endif;
    }

    public static function Legend($order){
        $news = "Новости по городам";
        $add = "Добавить новость";
        $separator = '
                    &nbsp; | &nbsp;
        ';

        $link = "";
        $next = $add;
        if($order=="listing"){
            $first = $news;
            $link = "add";
        }elseif($order=="add"){
            $first = $add;
            $next = $news;
        }?>
        <legend>
            <div>
                <?php
        if($order=='both'||$order=='add'):
            self::setLink($news,true); // ссылка "Новости по городам"
        else: // listing
            self::setLink($news); // "текст Новости по городам"
        endif;
        echo $separator;
        if($order=='both'||$order=='listing'):
            self::setLink($add,'add');
        else:
            self::setLink($add);
        endif;
        /*?>
            <a href="<?php echo SITE_ROOT;?>/admin/<?php echo $link;?>"><?php echo $news?></a>
    <?  else:
            self::setLink($news,true);?>
                <?php echo $first;?>
    <?  endif;?>
                    &nbsp; | &nbsp;
                <a href="<?php echo SITE_ROOT;?>/admin/<?php echo $link;?>"><?php echo $next?></a>
        <?php   */?>
            </div>
        </legend><?php
    }

    public static function Menu(){
        ?><a href="<?php echo SITE_ROOT; ?>">Главная</a><?php
    }
}