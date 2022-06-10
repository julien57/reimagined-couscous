$(function(){
    
    if (typeof localForMessage !== 'undefined') {
        const currentLocale = localForMessage;
    } else {
        const currentLocale = 'fr';
    }

    $(document).on('click','.rem_sub',function( e){

        e.preventDefault();

        var id = $(this).data('id');
        var data = { 'id': id};
        var parent =  $(this).closest('.block-page-admin');
        var parentRow =  $(this).closest('.row-sublock');

        $.ajax({
            url:        '/admin/page/sub/blocks/remove',
            type:       'POST',
            dataType:   'html',
            data : data,
            async:      true,
            success: function(data, status) {
                $(parent).remove();
                $(parentRow).remove();
            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    });


    $(document).on('click','.add_block',function( e){
        e.preventDefault();
        var form = $(this).closest('form');
        let textEditors = document.getElementsByClassName('wys');

        if (form.find('.wys').length > 0) {
            for (let editor of form.find('.wys')) {
                
                let textareaName;

                if (editor.getAttribute('id')) {
                    textareaName = editor.getAttribute('id');
                } else {
                    textareaName = editor.getAttribute('name');
                }

                if (textareaName != 'description[]' && textareaName != 'content_post[]' && textareaName != 'text[]') {
                    const data = CKEDITOR.instances[textareaName].getData();
                    editor.value = data;
                }

                if (textareaName == 'content_post[]') {
                    const data = CKEDITOR.instances[textareaName].getData();
                    editor.value = data;
                }
            }
        }


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

                const datas = JSON.parse(data);

                $('#formtmp').removeAttr('id');

                if (btnSubmit.hasClass('draft')) {
                    
                    $('#message'+blockPageId).html(`<div class="alert alert-success alert-dismissible">
                                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                      <h5><i class="icon fas fa-check"></i> Brouillon enregistré !</h5>
                                                      Pensez à publier vos modifications après avoir 
                                                      <a href="https://parc-hotel.jumo.idp.lu/${currentLocale}/${datas.page_name}?preview=preview" target="_blank" style="font-weight:bold">visualiser l’aperçu</a>
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
                $('#message'+blockPageId).html(`<div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h5><i class="icon fas fa-check"></i>Erreur</h5>
                                  Une erreur est survenue.
                                </div>`);
            }
        });
    });

    $(document).on('click','.add_sub_block', function(e){
        e.preventDefault();
        var btnSubmit = $(this);
        let textEditors = document.getElementsByClassName('wys');
        var form = $(this).closest('form');

        /*
        for (let editor of textEditors) {
            const textareaName = editor.getAttribute('name');
            const data = CKEDITOR.instances[textareaName].getData();
            editor.value = data;
        }*/

        if (form.find('.wys.wysiwyg').length > 0) {
            for (let editor of form.find('.wys')) {

                let textareaName;

                if (editor.getAttribute('id')) {
                    textareaName = editor.getAttribute('id');
                } else {
                    textareaName = editor.getAttribute('name');
                }

                if (textareaName != 'description[]' && textareaName != 'content_post[]' && textareaName != 'text[]') {
                    const data = CKEDITOR.instances[textareaName].getData();
                    editor.value = data;
                }

                if (textareaName == 'content_post[]') {
                    const data = CKEDITOR.instances[textareaName].getData();
                    editor.value = data;
                }
            }
        }


        $(this).parent('form').attr('id', 'formtmp');
        var form = $('#formtmp');
        var data = new FormData(  form[0] );
        var divMessage = $(this).prev();
        var blockPageId = data.get('sub_block_id');

        $.ajax({
            url:        ' /admin/page/block/add',
            type:       'POST',
            dataType:   'html',
            data : data,
            async:      true,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data, status) {

                $('#formtmp').removeAttr('id');
                console.log($('#message'+blockPageId))
                btnSubmit.prev().find('#message'+blockPageId).html(`<div class="alert alert-success alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h5><i class="icon fas fa-check"></i> Sous block enregistré !</h5>
                                  Les modifications ont été enregistrées et publiées
                                </div>`);
            },

            error : function(xhr, textStatus, errorThrown) {
                $('#message'+blockPageId).html(`<div class="alert alert-danger alert-dismissible">
                                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                  <h5><i class="icon fas fa-check"></i>Erreur</h5>
                                  Une erreur est survenue.
                                </div>`);
            }
        });

    });

    //remove it
    $(document).on('click','.block-page-admin > h3',function( e){

        var parent_form = $(this).parent('.block-page-admin');
        var form =  $(parent_form).find('form');
        if($(form).is(':visible') === true){
            $(parent_form).find('form').fadeOut();
        }else{
            $(parent_form).find('form').fadeIn();
        }

    });

    $(document).on('click','.show-form',function( e ){

        e.preventDefault();
        var parent_form = $(this).parent('.block_page');
        var form =  $(parent_form).find('form');

        if($(this).hasClass('open')){
            $(parent_form).find('form').slideUp();
        }else{
            if($(form).is(':visible') === true){
                //$(parent_form).find('form').fadeOut();
                $(parent_form).find('form').slideUp();
                $(parent_form).find('.subBlock').slideUp();
                //$(parent_form).find('form').animate({'display': 'flex'}, 'slow');
            }else{
                //$(parent_form).find('form').fadeIn();
                $(parent_form).find('form').slideDown();
                $(parent_form).find('.subBlock').slideDown();
                $(parent_form).find('.subBlock').find('.block-page-admin').find('form').hide();
            }
        }


    });

    $(document).on('click','.subBlock',function( e){

    });


    /**
     *
     */
    $(document).on('click','.new_sub_block',function( e){

        e.preventDefault();

        var p_b_id = $(this).data('bp');
        //var block =  $('.sub_block_list').val();
        var block =  $(this).prev().val();
        var data =  {'bp' : p_b_id, 'block' : block}

        $.ajax({
            url:       '/admin/page/sub/blocks/new',
            type:      'POST',
            dataType:  'html',
            data : data,
            async:   true,
            success: function(data, status) {
                $('.subBlock').append(data);
            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    });

})