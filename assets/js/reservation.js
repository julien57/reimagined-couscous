$('.reservation').on('click', function (event) {
    var _this = $(this),
        _parent = _this.parent().parent();

    _parent.toggleClass('opened');
});