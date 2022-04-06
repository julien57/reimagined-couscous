$(function(){
    $(document).on("click",'#new_item', function( e ){
        e.preventDefault();

        $.ajax({
            url:        '/admin/ajax/item/list',
            type:       'GET',
            dataType:   'html',
            async:      true,

            success: function(data, status) {
                $('#new_item_list').append( data );
                $('.item_select').each(function(index){
                    var attr_name = 'items_list_'+index;
                    $(this).attr('name',attr_name)
                });
            },

            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });


    /**
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
         //   async:      true,
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
    $(document).on("change",'.items_list', function( e ){
        e.preventDefault();
       /* var id = $(this).val();
        alert(id);
        $.ajax({
            url:        '/admin/ajax/item/new',
            type:       'POST',
            data: {'id':id},
            dataType:   'json',
            async:      true,

            success: function(data, status) {
                var template_hidden = '<input type="hidden" value="'+data.id+'"/>';
                var template = '<a data-id="'+data.id+'">'+data.name+'</a>';

                $('#new_item_list').append( template );
                $('#new_item_hidden').append( template_hidden );

            },
            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });*/
    });


    /**
     *
     */
    $(document).on("change",'.items_rem-no-id', function( e ){
        e.preventDefault();
        $(this).parent('._items_list').remove();
    });


    /**
     *
     */
    $(document).on("click",'.items_rem', function( e ){

        e.preventDefault();

        var parent =  $(this).parent('._items_list');

        var item =  $(this).data('id');
        var block = $('#block_item_id').val();
        console.log(item);
        console.log(block);
        $.ajax({
            url:        '/admin/ajax/block/'+block+'/item/'+item+'/remove',
            type:       'POST',
            data:    { item : item, block : block },
            dataType:   'JSON',
            async:      true,
            success: function(data, status) {
                parent.remove();
            },
            error : function(xhr, textStatus, errorThrown) {

            }
        });

    });


});
