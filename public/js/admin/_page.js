$(function(){

    /**
     *
     */
    $(document).on('click','.rem_sub',function( e){

        e.preventDefault();

        var id = $(this).data('id');
        var data = { 'id': id};
        var parent =  $(this).closest('.block-page-admin');

        $.ajax({
            url:        '/admin/page/sub/blocks/remove',
            type:       'POST',
            dataType:   'html',
            data : data,
            async:      true,
            success: function(data, status) {
                $(parent).remove();
            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    });

    /**
     *
     */
    $(document).on('click','.add_block, .add_sub_block', function(e){

        let textEditors = document.getElementsByClassName('wys');

        for (let editor of textEditors) {
            const textareaName = editor.getAttribute('name');
            const data = CKEDITOR.instances[textareaName].getData();
            editor.value = data;
        }

        e.preventDefault();

        $(this).parent('form').attr('id', 'formtmp');
        var form = $('#formtmp');
        var data = new FormData(  form[0] );
        
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
                alert('Great')
            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });

    });


    /**
     *
     */
    $(document).on('click','.block-page-admin > h3',function( e){
        e.preventDefault();
        e.stopPropagation();
        var parent_form = $(this).closest('.block-page-admin');
        var form =  $(parent_form).find('form');
        var array= [];

        $(form).find('input').each(function(){
            var name = $(this).attr('name');
            if( array[name] === undefined ) {
                array[name] = 1;
            }else{
                array[name] = array[name] + 1;
            }
        });

       /* for (valeur in  array) {
            if(array[valeur] > 1){
                var i = 2
                $(form).find('input[name = "'+valeur+'"]').each(function(){
                    $(this).attr('name', valeur+'_'+i);
                    i = i+1;
                });
            }
        }*/

        if($(form).is(':visible') === true){
            $(parent_form).find('form').fadeOut();
            $(parent_form).find('.subBlock').fadeOut();

        }else{
           $(parent_form).find('form').fadeIn();
           $(parent_form).find('.subBlock').fadeIn();
        }
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