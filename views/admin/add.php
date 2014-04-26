<fieldset>
    <?php HTML::Legend('add');?>
    <form method="post" id="form_add_news" class="clearfix" action="<?php echo SITE_ROOT;?>/admin/save">
        <div role="form_elements" class="floatLeft">
            <input name="subject" type="text" placeholder="Заголовок новости">
            <textarea name="news_text" placeholder="Текст новости..."></textarea>
        </div>
        <div role="cities_list" class="floatLeft">
            <label class="width100"><input type="checkbox" id="all_boxes"> Все города</label>
            <div role="boxes_box">
            <?php foreach($this->content->cities as $city_id => $city):
                ?>
                <label>
                    <input type="checkbox" value="<?php echo $city_id;?>" checked>
                    <?php echo $city;?>
                </label>
            <?php endforeach;?>
            </div>
        </div>
        <button type="submit" class="floatLeft">Сохранить новость</button> <input class="floatLeft" type="reset" value="Очистить форму">
    </form>
</fieldset>
<?php
