$(function(){
    $('#select_city').on('change', function(){
        location.href += 'user/news/' + $('option:selected',this).val();
    });
    var citiesBoxes = $('#cities_filter input[type="checkbox"]');
    $(citiesBoxes).on('click', function(){
        var func=(this.checked)? 'addClass':'removeClass';
        $(this).parent('label')[func]('checked');
    });
    $('label:has(input[type="checkbox"]:checked)').addClass('checked');
    $('#cFilter').on('click', function(){
        var cFilterField = $('#cities_filter');
        if(!$(cFilterField).attr('data-expanded')){
            $(cFilterField).animate({ height:'600px'},500)
                .attr('data-expanded',1);
        }else
            $(cFilterField).animate({ height:'140px'},500)
                .removeAttr('data-expanded');
    });
    $('#all_boxes').on('click', function(){
        var aBoxChecked = this.checked;
        console.log('checked? '+aBoxChecked);
        $(citiesBoxes).each(function(index){
            if(aBoxChecked){
                this.checked = true;
                $(this).parent('label').addClass('checked');
            }else{
                this.checked = false;
                $(this).parent('label').removeClass('checked');
            }
        });/*
        if(this.checked){
            $(citiesBoxes).attr('checked',true);
        }else
            $(citiesBoxes).attr('checked',false);*/
    });
});