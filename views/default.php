<?php

?><section class="clearfix">
    <div class="floatLeft padding10 marginRight10 bg-lightskyblue">
        <h3>Чтение новостей</h3>
        <select>
            <option>-Выберите регион-</option>
            <?php echo $this->citiesList;?>
        </select>
    </div>
    <div class="floatLeft padding10">
        <h3><a href="<?php echo SITE_ROOT;?>/admin/listing">Администрирование новостей</a></h3>
        <a href="<?php echo SITE_ROOT."/admin/add";?>">Добавить новость</a>
    </div>
</section>
<?php
