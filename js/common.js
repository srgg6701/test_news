$(function(){
    $('#select_city').on('change', function(){
        location.href += 'user/news/' + $('option:selected',this).val();
    });
    var citiesBoxes = $('[role="boxes_box"] input[type="checkbox"]');
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
        });
    });
    // редактирование новости
    // создать хинт
    $('#img-edit-text, #img-edit-header').on('mouseenter', function(event){
        var title ='Редактировать ';
        title+=(event.target.id=='img-edit-text')? 'текст':'заголовок';
        title+=" новости";
        event.target.title = title;
    }).on('click', function(){
        var action_button = event.target; //console.dir(action_button);
        $(action_button).hide();
        if(action_button.id=='img-edit-header'){
            var headerSpan = $(action_button).next('span');
            var source_text = $(headerSpan).text();
            // создать поле для заголовка
            var inputHeader = $('<input/>',{
                name:"subject",
                type:"text"
            }).css({
                    paddingRight: '30px',
                    placeholder:"Заголовок новости"
                }).val(source_text);
            // создать кнопку отмены
            var closeIt = $('<span/>',{
                id:'remove-header-input'
            }).css({
                backgroundColor: 'lightcoral',
                borderRadius: '10px',
                color: 'white',
                cursor: 'pointer',
                float: 'right',
                marginTop: '-27px',
                marginRight: '8px',
                height: '21px',
                textAlign: 'center',
                width: '21px'
            }).text('x');
            $(headerSpan).attr('data-text',source_text)
                         .html(inputHeader)
                         .after(closeIt);
        }else if(action_button.id=='img-edit-text'){
            var textDiv = $('#news-container');
            var source_text = $(textDiv).text();
            // создать поле для заголовка
            var textArea = $('<textarea/>',{
                name:"text"
            }).css({
                    placeholder:"Текст новости"
                }).val(source_text);
            // создать кнопку отмены
            var closeIt = $('<span/>',{
                id:'remove-textarea',
                class:'close'
            }).css({
                marginBottom: '6px',
                marginRight: '8px'
            }).text('x');

            $(textDiv).hide().before(textArea);
            $(action_button).after(closeIt);
        }
        // отменить редактирование заголовка
        $('#remove-header-input').on('click', function(){
            //console.dir(this);
            var headerContainer = $(this).prev();
            $(headerContainer).html($(headerContainer).attr('data-text'));
            $(this).remove();
            $(action_button).show();
        });
        // отменить редактирование текста
        $('#remove-textarea').on('click', function(){
            var textArea = $('textarea[name="text"]');
            $('#news-container').show();
            $(textArea).remove();
            $(this).remove();
            $(action_button).show();
        });
    });
    // удаление новости
    $('#btn-rem-news').on('click', function(){
        if(!confirm('Подтверждаете удаление?')) return false;
        else{
            //console.log($(this).attr('data-location'));
            location.href=$(this).attr('data-location');
        }
    })
    $('.mess_result:visible').fadeOut(5000).on('click', function(){
        $(this).remove();
    });
    //
    $('table tbody tr td:nth-child(3)').on('mouseenter', function(){
        this.title = $('a', this).text();
    });
});