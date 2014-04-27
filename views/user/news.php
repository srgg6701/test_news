<h3>Новости в регионе <?php echo $this->content->city;?></h3>
<?php
if(!$this-> content->feed):?>
    <br>
    <h5 class="color-grey">Здесь новостей нет. Наступила идеальная стабильность.</h5>
<?php
else:
    foreach ($this-> content->feed as $news_id=>$news) {
        ?>
        <article>
            <p class="date"><?php echo $news['date'];?></p>
            <h4><?php echo $news['subject']?></h4>
            <?php echo $news['text'];?> <a class="more" href="<?php
        echo SITE_ROOT."/user/news/".$this->content->city_id."/".$news_id;?>">Подробнее...</a>
        </article>
    <?php
    }
endif;
