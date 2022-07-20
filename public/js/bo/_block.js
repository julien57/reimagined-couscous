$(function(){

    /**
     * choice block
     */
    $(document).on('click','._path-block' , function(e){
        e.preventDefault();
        $('#block_path').attr('value', $(this).data('path'));
    });

    /**
     * add block in block
     */

    $(document).on('change','.sub_block_list' , function(e){
        e.preventDefault();

    });

    $(document).on('click','.rem_file' , function(e){
        e.preventDefault();
        var _this = $(this);
        var file = $(this).data('file');
        $('.hidden_file').each(function(){

            if($(this).hasClass(file)){
                $(this).remove();
                $(_this).closest('div').remove();
            }
        });
    });



})