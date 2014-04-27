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
<form method="post" enctype="text/plain" id="form_edit_news" class="clearfix" action="<?php echo SITE_ROOT;?>/admin/saveremove/<?php echo $news['id']?>">
    <article class="admin">
        <h4><?php echo $news['subject']?></h4>
        <?php echo $news['text'];?>
    </article>
    <button id="rem_news" type="submit" class="color-red">Удалить новость</button>
    &nbsp;
    <button type="button">Редактировать новость</button>
</form>
    <br>
    <hr/>
    <br>
<?php echo $link_all_news;
endif;

