<?php
if(!$news=$this->content->single_news):?>
    <h4 class="color-grey">Новость не найдена... Замуровали, демоны!</h4>
<?php else:
    $link_all_news=SITE_ROOT . "/user/news/" .
        $this->content->city_id;
    ?>
<p class="date">Новость от <?php echo $news['date'];?>
    &nbsp; | &nbsp;
    <a href="<?php echo $link_all_news;?>">Все новости региона</a></p>

    <h4 class="singleH4"><?php echo $news['subject']?></h4>

    <article>
        <?php echo $news['text'];?>
    </article>
    <a class="link_all_news" href="<?php   echo $link_all_news;?>">Все новости региона</a>
<?php endif;
