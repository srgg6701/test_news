<?php if(isset($this->content->result)):?>
<div><?php echo $this->content->result;?></div>
<?php endif;?>
<fieldset>
    <?php HTML::Legend();?>
    <div>Фильтр городов:
        <a href="javascript:void(0)" id="cFilter">свернуть/развернуть</a>
        &nbsp;
        <label><input type="checkbox" id="all_boxes"> все города</label></div>
    <fieldset id="cities_filter">
        <div id="div-cities">
    <?php foreach($this->content->cities as $city_id => $city):
    ?>
        <label>
            <input type="checkbox" value="<?php echo $city_id;?>" checked>
            <?php echo $city;?>
        </label>
    <?php endforeach;?>
        </div>
    </fieldset>
    <?php
    if(!$this-> content->news):?>
        <br>
        <h5 class="color-grey">Нет новостей. Вообще ни одной :(</h5>
        <p>Конец истории, как Фрэнсис наш Фукуяма утверждал...</p>
    <?php
    else:?>
    <table>
        <tr>
            <th>id</th>
            <th>Дата</th>
            <th>Тема</th>
            <th>Текст (частично)</th>
        </tr>
        <?php    foreach ($this-> content->news as $news_id => $news) {
            ?>
            <tr>
                <td><?php echo $news_id;?></td>
                <td><?php echo $news[0];?></td>
                <td><div><a href="<?php echo SITE_ROOT."/admin/".$news_id;?>"><?php echo $news[1];?></a></div></td>
                <td><div><?php
                    echo mb_substr($news[2],0,65,'UTF-8');?></div></td>
            </tr>
            <?php    //var_dump("<pre>",$news,"<pre/>");
        }?>
    </table>
<?php
    endif;?>
</fieldset>