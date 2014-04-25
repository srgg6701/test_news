$(function(){
    $('#select_city').on('change', function(){
        location.href += 'user/news/' + $('option:selected',this).val();
    });
});