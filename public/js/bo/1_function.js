function orderBlock() {
    var data =[];

    $('#block_page').children('.block-page-admin').each(function( index ){
        var page_block_id = $(this).find('.block_page_id').val();
        data[index] = page_block_id;
    });
    var datas = {'json':data}
    $.ajax({
        url:        '/admin/ajax/order/blocks/',
        type:       'POST',
        dataType:   'JSON',
        data : datas,
        async:      true,
        success: function(data, status) {

        },

        error : function(xhr, textStatus, errorThrown) {
            alert('Ajax request failed.');
        }
    });
}