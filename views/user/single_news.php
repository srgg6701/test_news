<?php
if(!$news=$this->content->single_news):?>
    <h4 class="color-grey">Новость не найдена... Замуровали, демоны!</h4>
<?php else:
    $link_all_news="<a href=". SITE_ROOT . "/user/news/" .
        $this->content->city_id. ">Все новости региона</a>";
    ?>
<p class="date">Новость от <?php echo $news['date'];?>
    &nbsp; | &nbsp;
    <?php echo $link_all_news;?></p>

    <h4><?php echo $news['subject']?></h4>

    <article>
        <?php echo $news['text'];?>
    </article>
    <br>
    <hr/>
    <br>
<?php   echo $link_all_news;

endif;
