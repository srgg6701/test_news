<?php
class HTML{
    /**
     * Ссылки в подменю
     */
    public static function setLink($text,$link=false){
        if($link):
            if($link===true) $link='';?>
        <a href="<?php echo SITE_ROOT;?>/admin/<?php echo $link;?>"><?php echo $text;?></a>
    <?php
        else:  echo $text;
        endif;
    }
    /**
     * Подменю админа
     */
    public static function Legend($order){
        $news = "Новости по городам";
        $add = "Добавить новость";
        $separator = '
                    &nbsp; | &nbsp;
        ';
        ?>
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
        endif;?>
            </div>
        </legend>
    <?php
    }
    /**
     * Ссылка на главную
     */
    public static function Menu(){
        ?><a href="<?php echo SITE_ROOT; ?>">Главная</a><?php
    }
    /**
     * Вывести сообщение
     */
    public static function showMessage(){
        if($_SESSION['content_result']){?>
            <div class="mess_result" title="Закрыть"><?php echo $_SESSION['content_result'];
                unset($_SESSION['content_result']); ?>
            </div>
        <?php
        }
    }
}