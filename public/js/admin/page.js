$(function(){

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

        e.preventDefault();

        var data = $(this).closest('form').serialize();

        $.ajax({
            url:        '/admin/ajax/form/send',
            type:       'POST',
            data:    data,
            dataType:   'JSON',
            async:      true,
            success: function(data, status) {
                alert('saved');
            },

            error : function(xhr, textStatus, errorThrown) {
                console.log('couocu ou cuocou ?');
            }
        });

    });


    /**
     *
     */
    $(document).on('click', '#aj_bl-form-del', function(e){

        e.preventDefault();

        var id = $('#block_item_id').val();

        $.ajax({
            url:        '/admin/ajax/block/remove/'+id,
            type:       'POST',
            data:    {'id' : id },
            dataType:   'JSON',
            async:      true,
            success: function(data, status) {
                alert('Sucess');
            },

            error : function(xhr, textStatus, errorThrown) {
                console.log('couocu ou cuocou ?');
            }
        });

    });


    /**
     *
     */
    $(document).on("change",'.block_select', function( e ){

        e.preventDefault();

        var id = $(this).val();

        var page_id = $('#page_id').val();

        if(id === 0 ){
            alert('aucune bloc selectionné')
            return ;
        }

        if(page_id === '' ){
            page_id = $('.block_select').val();

            if(page_id === '' ){
                alert('Aucune page selectionnée !')
                return ;
            }
            $('#page_id').val(page_id);
        }

        $.ajax({
            url:        '/admin/ajax/block/get',
            type:       'POST',
            dataType:   'html',
            data: {'block_id': id , 'page_id' :page_id },
            async:      true,
            success: function(data, status) {

                if(parseInt(page_id) === 0 ){
                    alert('No page id found !');
                }else{
                    //persist block
                    $('#block_page').append( data );
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
            alert('aucune bloc selectionné')
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
        var parent = $(this).closest('.block-page-admin');
        var page = $('#page_id').val();

        console.log(page)
        console.log(block)
        $.ajax({
            url:        '/admin/page/'+page+'/blocks/remove/'+block,
            type:       'POST',
            dataType:   'json',
            data:       { 'block' : block , 'page' : page },
            async:      true,
            success: function(data, status) {
                parent.remove();
            },
            error : function(xhr, textStatus, errorThrown) {
                console.log('problème')
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

                for (instance in CKEDITOR.instances) {
                    CKEDITOR.instances[instance].updateElement();
                }
            },

            error : function(xhr, textStatus, errorThrown) {

                alert('Ajax request failed.');
            }
        });

        $.ajax({
            url: `/admin/page/entity/${val}`,
            type:       'POST',
            async:      true,
            success: function(data, status) {
                console.log(data.page[0].hasNewsletter)
                if (data.page[0].hasNewsletter === true) {
                    console.log($('#newsletterCurrent'))
                    $('#newsletterCurrent').attr('checked', true);
                } else {
                    $('#newsletterCurrent').attr('checked', false);
                }
            }
        });
    })

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
                console.log(data.page[0].hasNewsletter)
                if (data.page[0].hasNewsletter === true) {
                    $('#newsletterCurrent').attr('checked', true);
                } else {
                    $('#newsletterCurrent').attr('checked', false);
                }
            }
        });
    });
});

