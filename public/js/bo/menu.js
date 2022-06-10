let nestedSortables = document.getElementsByClassName('nested-sortable');
const nestedQuery = '.nested-sortable';
const root = document.getElementById('nestedDemo');

for (var i = 0; i < nestedSortables.length; i++) {
    new Sortable(nestedSortables[i], {
        group: 'nested',
        animation: 150,
        fallbackOnBody: true,
        swapThreshold: 0.65
    });
}

new Sortable(document.getElementById('nestedDemo'), {
    group: 'nested',
    animation: 150
});

new Sortable(document.getElementById('nested2Demo'), {
    group: 'nested',
    animation: 150
});

function serialize(sortable) {
    var serialized = [];
    var children = [].slice.call(sortable.children);
    for (var i in children) {
        var nested = children[i].querySelector(nestedQuery);
        serialized.push({
            id: children[i].getAttribute('data-id'),
            children: nested ? serialize(nested) : []
        });
    }
    return serialized
}

$('#saveMenu').click(function () {
    var data = serialize(root);
    
    data = JSON.stringify(data)
    console.log(data)
    $.ajax({
        url:        '/bo/menu/save',
        type:       'POST',
        data:       { arrayMenu: data },
        async:      true,
        success: function(data, status) {
            $('#messageMenu').html(`<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Menu sauvegardé!</h5>
                  Le menu a bien été sauvegardé !
                </div>`);
        },
        error : function(xhr, textStatus, errorThrown) {
            alert('Ajax request failed.');
        }
    });
})