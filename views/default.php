<?php

?><section class="clearfix">
    <div class="floatLeft padding10 marginRight10 bg-lightskyblue">
        <h3>Чтение новостей</h3>
        <select id="select_city">
            <option value="0">-Выберите регион-</option>
            <?php echo $this->content;?>
        </select>
    </div>
    <div class="floatLeft padding10">
        <h3><a href="<?php echo SITE_ROOT;?>/admin/">Администрирование новостей</a></h3>
        <a href="<?php echo SITE_ROOT."/admin/add";?>">Добавить новость</a>
    </div>
</section>
<?php
