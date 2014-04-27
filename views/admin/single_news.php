<?php
if(!$news=$this->content->single_news):?>
    <h4 class="color-grey">Новость не найдена. Matrix has you, Neo.</h4>
<?php else:
    ?>
    <?php HTML::Legend('both');?>
    <p class="date">Новость от <?php echo $news['date'];?>
        &nbsp; | &nbsp;
        <?php
        $link_all_news='<a href="' . SITE_ROOT . '/admin">Все новости</a>';
        echo $link_all_news;?></p>
<form method="post" enctype="application/x-www-form-urlencoded" id="form_edit_news" class="clearfix" action="<?php echo SITE_ROOT;?>/admin/save/<?php echo $news['id']?>">
    <article class="admin clearfix">
        <div class="floatLeft" role="form_elements">
            <h4><img id="img-edit-header" role="edit" src="<?php echo SITE_ROOT;?>/_sources/edit.png">
                <span><?php echo $news['subject']?></span>
            </h4>
            <img id="img-edit-text" role="edit" src="<?php echo SITE_ROOT;?>/_sources/edit.png">
                <div id="news-container"><?php echo $news['text'];?></div>
        </div>
        <?php echo $this->content->cities_filter;?>
    </article>
    <button id="btn-rem-news" data-location="<?php echo SITE_ROOT;?>/admin/remove/<?php echo $news['id']?>" type="button" class="color-red">Удалить новость</button>
    &nbsp;
    <button id="btn-save-news" type="submit">Сохранить новость</button>
</form>
    <br>
    <hr/>
    <br>
<?php echo $link_all_news;
endif;

