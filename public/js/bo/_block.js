$(function(){

    /**
     * choice block
     */
    $(document).on('click','._path-block' , function(e){
        e.preventDefault();
       $('#block_path').attr('value', $(this).data('path'));
    });

    /**
     * remove block in block
     */
    $(document).on('click','.rem_file' , function(e){
        e.preventDefault();
        var _this = $(this);
        var file = $(this).data('file');

        $(this).closest('form').attr('id', 'formtmp');

        $('.hidden_file').each(function() {

            if($(this).hasClass(file)){
                $(this).remove();
                $(_this).closest('div').remove();

                //var data = $(this).parent('form').serialize();

                var form = $('#formtmp');
                console.log(form)
                var data = new FormData(  form[0] );
                var blockPageId = data.get('block_page_id');

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

                    },

                    error : function(xhr, textStatus, errorThrown) {
                        alert('Ajax request failed.');
                    }
                });
            }
        });
    });
})