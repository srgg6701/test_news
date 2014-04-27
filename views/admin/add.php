<fieldset>
    <?php HTML::Legend('add');?>
    <form method="post" enctype="text/plain" id="form_add_news" class="clearfix" action="<?php echo SITE_ROOT;?>/admin/save/new">
    <?php echo $this->content->form_fields;?>
    <?php echo $this->content->cities_filter;?>
        <button type="submit" class="floatLeft">Сохранить новость</button> <input class="floatLeft" type="reset" value="Очистить форму">
    </form>
</fieldset>
<?php
