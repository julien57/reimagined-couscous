$(function(){

    /**
     * Save slug page
     */
    $(document).on("submit",'#formSaveSlug', function( e ){
        e.preventDefault();
        var data = $(this).closest('form').serialize();

        $.ajax({
            url: '/bo/slug/save',
            type: 'POST',
            data: data,
            dataType: 'JSON',
            async: true,

            success: function(data, status) {
                $('#btnSlug i').removeClass('fa-save').addClass('fa-check');
                if (data.type === 'post') {
                    $('#btnSeePage').attr('href', `${window.location.origin}/${localForMessage}/news/${data.slug}`);
                } else {
                    $('#btnSeePage').attr('href', `${window.location.origin}/${localForMessage}/${data.slug}`);
                }
            },

            error : function(xhr, textStatus, errorThrown) {
                console.error('Ajax request failed.');
            }
        });
    });

    /**
     * add block to page
     */
    $(document).on("click",'#new_block', function( e ){
        e.preventDefault();

        $.ajax({
            url:        '/admin/ajax/block/list',
            type:       'GET',
            dataType:   'html',
            async:      true,

            success: function(data, status) {

                $('#new_block_list').append( data );
                $('.block_select').each(function(index){
                    var attr_name = 'block_list_'+index;
                    $(this).attr('name',attr_name)
                });

            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });


    /**
     * ajax block form
     *   Send form
     */
    $(document).on('click', '#aj_bl-forms', function(e){
        e.preventDefault()

        var data = $(this).closest('form').serialize();

        $.ajax({
            url:        '/admin/ajax/form/send',
            type:       'POST',
            data:    data,
            dataType:   'JSON',
            async:      true,
            success: function(data, status) {
                console.log(data);
            },

            error : function(xhr, textStatus, errorThrown) {
                console.log('couocu');
            }
        });

    });

    /**
     *
     */
    $(document).on("click",'.btn-block-add', function( e ){

        e.preventDefault();
        // Block ID
        var id = $(this).parent().prev().children().children().val();

        var page_id = $('#page_id').val();

        if(id === 0 ){
            alert('aucune bloc selectionné')
            return ;
        }

        if(page_id === '' ){
            page_id = $('.block_select').val();

            if(page_id === '' ){
                alert('aucune paqge selectionnée')
                return ;
            }
            $('#page_id').val(page_id);
        }

        $.ajax({
            url:        '/admin/ajax/block/get',
            type:       'POST',
            dataType:   'html',
            data: {'block_id': id , 'page_id' :page_id, 'locale': $('#locale').val() },
            async:      true,
            success: function(data, status) {

                if(parseInt(page_id) === 0 ){
                    alert('No page id found !');
                }else{
                    //persist block
                    $('#pages_block').append( data );

                    $(".wys").each(function () {

                        if ($(this).attr('id')) {
                            let id = $(this).attr('id');
                            CKEDITOR.replace(id);
                        }

                        let textareaPost = this.getAttribute('name');
                        if (textareaPost === 'content_post[]' || textareaPost === 'breakfast_hours[]' || textareaPost === 'content[]') {
                            CKEDITOR.replace(textareaPost);
                        }
                    });
                    $(".wys.wysiwyg").each(function () {
                        CKEDITOR.replace(this);
                    });

                    $(document).on('click','.add_block',function( e){

                        let textEditors = document.getElementsByClassName('wys');

                        for (let editor of textEditors) {
                            const textareaName = editor.getAttribute('name');
                            const data = CKEDITOR.instances[textareaName].getData();
                            editor.value = data;
                        }

                        e.preventDefault();
                        $(this).parent('form').attr('id', 'formtmp');
                        //var data = $(this).parent('form').serialize();

                        var form = $('#formtmp');
                        var data = new FormData(  form[0] );
                        var blockPageId = data.get('block_page_id');

                        var btnSubmit = $(this);
                        // If click draft button
                        if (btnSubmit.hasClass('draft')) {
                            data.append('draft', true);
                        }

                        $.ajax({
                            url:        '/admin/page/block/add',
                            type:       'POST',
                            dataType:   'html',
                            data : data,
                            async:      true,
                            cache: false,
                            contentType: false,
                            processData: false,
                            success: function(data, status) {
                                console.log(data)
                                const datas = JSON.parse(data);

                                $('#formtmp').removeAttr('id');
                                const urlDraft = document.getElementById('btnSeePage').href;

                                if (btnSubmit.hasClass('draft')) {

                                    $('#message'+blockPageId).html(`<div class="alert alert-success alert-dismissible">
                                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                      <h5><i class="icon fas fa-check"></i> Brouillon enregistré !</h5>
                                                      Pensez à publier vos modifications après avoir 
                                                      <a href="https://parc-hotel.jumo.idp.lu/${currentLocale}/page/${datas.page_name}?preview=preview" target="_blank" style="font-weight:bold">visualiser l’aperçu</a>
                                                    </div>`);


                                } else {
                                    $('#message'+blockPageId).html('<div class="alert alert-success alert-dismissible">\n' +
                                        '                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                        '                  <h5><i class="icon fas fa-check"></i> Publié !</h5>\n' +
                                        '                  Les modifications ont été enregistrées et publiées\n' +
                                        '                </div>');
                                }

                            },

                            error : function(xhr, textStatus, errorThrown) {
                                alert('Ajax request failed.');
                            }
                        });
                    });
                }
            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });

    $(document).on("click",'.more_block', function( e ){

        e.preventDefault();

        var id = $(this).data('block');

        var page_id = $('#page_id').val();

        if(id === 0 ){
            alert('aucun bloc selectionné')
            return ;
        }

        var parent  = $(this).closest('.block-page-admin');
        if(page_id === '' ){
            page_id = $('.block_select').val();

            if(page_id === '' ){
                alert('aucune paqge selectionnée')
                return ;
            }
            $('#page_id').val(page_id);
        }
        if(parseInt(page_id) === 0 ) {
            alert('No page id found !');
            return;
        }
        $.ajax({
            url:        '/admin/ajax/block/get',
            type:       'POST',
            dataType:   'html',
            data: {'block_id': id , 'page_id' :page_id },
            async:      true,
            success: function(data, status) {

                $('#block_page').append(data);

                $('#block_page').children('.block-page-admin').each(function(){
                    if($(this).hasClass('ui-sortable-handle') === false){
                        $(this).addClass('ui-sortable-handle');
                    }
                });
                var data =[];
                $('#block_page').children('.block-page-admin').each(function( index ){
                    var page_block_id = $(this).find('.block_page_id').val();
                    data[index] = page_block_id;
                });

            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    });

    /**
     * remove block from page
     */
    $(document).on('click','.rem_block', function( e ){

        e.preventDefault();

        var block  = $(this).data('block');
        var lang  = $(this).data('lang');
        var blockpageId  = $(this).data('blockpage');
        var parent = $(this).closest('.block_page');

        var page = $('#page_id').val();

        $.ajax({
            url:        '/admin/page/'+page+'/blocks/remove/'+block,
            type:       'POST',
            dataType:   'json',
            data:       { 'block' : block , 'page' : page, 'lang': lang, 'blockpage': blockpageId },
            async:      true,
            success: function(data, status) {
                parent.remove();
            },
            error : function(xhr, textStatus, errorThrown) {
            }
        });

    });


    /**
     * add page
     */
    $(document).on('click','#build_page_btns', function( e ){

        e.preventDefault();
        var data = $(this).parents('form').serialize();

        $.ajax({
            url:        '/admin/page/add/new',
            type:       'POST',
            dataType:   'html',
            data:       data ,
            async:      true,

            success: function(data, status) {

            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    });

    /**
     *
     */
    $(document).on('change', '.select_page', function( e ){

        e.preventDefault();

        var val = $(this).val();
        $('#page_id').val(val);

        $.ajax({
            url:        '/admin/page/'+val+'/blocks',
            type:       'GET',
            dataType:   'HTML',
            data:       { id : val } ,
            async:      true,
            success: function(data, status) {
                $('#page_atelier').html('');
                $('#page_atelier').html(data );
                /*$("#block_page" ).sortable();
                $( "#sortable" ).disableSelection();*/

                // TODO If is CKEditor textarea : no sort
                if (!document.querySelector('.wys')) {
                    $("#block_page" ).sortable({
                        update: function( event, ui ) {
                            orderBlock();
                        }
                    });
                }

                let textEditors = document.getElementsByClassName('wys');

                for (let editor of textEditors) {
                    const textareaName = editor.getAttribute('name');
                    console.log(textareaName)
                    CKEDITOR.replace(textareaName);
                }

                /*
                ClassicEditor
                .create( document.querySelector('.wys'))
                .catch( error => {
                    console.error( error );
                });
                */
                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                    console.log("updateElement called for '"+CKEDITOR.instances[instance]+"'");
                }
            },

            error : function(xhr, textStatus, errorThrown) {
                console.log(xhr);
                console.log(textStatus);
                console.log(errorThrown);
                alert('Ajax request failed.');
            }
        });

        $.ajax({
            url: `/admin/page/entity/${val}`,
            type:       'POST',
            async:      true,
            success: function(data, status) {

                if (data.page[0].hasNewsletter === true) {
                    $('#newsletterCurrent').attr('checked', true);
                } else {
                    $('#newsletterCurrent').attr('checked', false);
                }
            }
        });
    });

    $('#newsletterCurrent').change(function() {
        var hasNewsletter;
        if (this.checked) {
            hasNewsletter = 1;
        } else {
            hasNewsletter = 0;
        }

        var pageId = $('#page_id').val();

        $.ajax({
            url: `/admin/page/change-newsletter/${pageId}`,
            type:       'POST',
            data:       { newsletter : hasNewsletter },
            async:      true,
            success: function(data, status) {
                
            }
        });
    });

    // Search & open block component
    let searchParams = new URLSearchParams(window.location.search)

    if (searchParams.has('component')) {
        var componentId = searchParams.get('component');
        var input = $(`input[value="${componentId}"]`);

        if (input.length > 0) {
            var form = input.closest("form");
            form.css('display', 'block');
        }
    }
});

