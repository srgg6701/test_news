<?php
if(!$news=$this->content->single_news):?>
    <h4 class="color-grey">Новость не найдена. Matrix has you, Neo.</h4>
<?php else:
    ?>
    <p class="date">Новость от <?php echo $news['date'];?>
        &nbsp; | &nbsp;
        <?php
        $link_all_news='<a href="' . SITE_ROOT . '/admin">Все новости</a>';
        echo $link_all_news;?></p>

    <h4><?php echo $news['subject']?></h4>

    <article>
        <?php echo $news['text'];?>
    </article>
    <br>
    <hr/>
    <br>
<?php echo $link_all_news;
endif;

