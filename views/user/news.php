<h3>Новости в регионе <?php echo $this->content->city;?></h3>
<?php
if(!$this-> content->feed):?>
    <br>
    <h5 class="color-grey">Здесь новостей нет. Наступила идеальная стабильность.</h5>
<?php
else:
    foreach ($this-> content->feed as $news_id=>$news) {
        ?>
        <p class="date"><?php echo $news[0];
        ?></p>
        <h4><?php echo $news[1]?></h4>
        <article>
            <?php echo $news[2];?> <a class="more" href="<?php
        echo SITE_ROOT."/user/news/".$this->content->city_id."/".$news_id;?>">Подробнее...</a>
        </article>
    <?php
    }
endif;
