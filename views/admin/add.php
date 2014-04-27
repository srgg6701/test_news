<?php
if($_SESSION['content_result']):?>
    <div class="mess_result"><?php echo $_SESSION['content_result'];
        unset($_SESSION['content_result']); ?>
    </div>
<?php
endif;?>
<fieldset>
    <?php HTML::Legend('add');?>
    <form method="post" enctype="application/x-www-form-urlencoded" id="form_add_news" class="clearfix" action="<?php echo SITE_ROOT;?>/admin/save/new">
    <?php echo $this->content->form_fields;?>
    <?php echo $this->content->cities_filter;?>
        <button type="submit" class="floatLeft">Сохранить новость</button> <input class="floatLeft" type="reset" value="Очистить форму">
    </form>
</fieldset>
<?php
