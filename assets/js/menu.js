(function ($) {
    var _menulist = $('.menu-wrapper').find('.items'),
        _menu = $('.menu').find('.tags'),
        _item = $('.course').find('.submenu'),
        wd = $(window).width(),
        wh = $(window).height(),
        selected_news = 0,
        decal = 0,
        step = 360;

        _menulist.find('.course').eq(0).addClass('selected');
        _menulist.find('.course').eq(0).find('.menu-right').addClass('selected');

    _item.each(function() {
        var id = $(this).closest('.selected').data("id");

        if (wd < 960 && wd >= 480){
            step = 160;
        } else if (wd < 480 && wd > 320){
            step = wd*.51;
        } else if (wd <= 320){
            step = wd*.525;
        } else if (wd >= 960) {
        }

        if (id != undefined){
            selected_news = Number(id);
            
            if (wd < 960 && wd >= 480){
                decal = 160 + step*selected_news;
            } else if (wd < 480 && wd > 320){
                decal = -20 + step*selected_news;
            } else if (wd <= 320){
                decal = -10 + step*selected_news;
            } else if (wd >= 960 && wd < 1200) {
                decal = 127 + step*selected_news;
            } else if (wd >= 1200 && wd <1400) {
                decal = 227 + step*selected_news;
            } else if (wd >= 1400 && wd <1500) {
                decal = 327 + step*selected_news;
            } else if (wd >= 1400) {
                decal = 427 + step*selected_news;
            }
        }
    });

    function test(){
        console.log('test function');
    }

    _menu.css({left: 'calc(50vw - '+decal+'px)'});

    _item.on('click', function (e) {

        console.log('click sub');

        var id = Number($(this).closest('.course').data("id"));
            pos = Number(id - selected_news)*step,
            _this = $(this);

        if (!_this.closest('.course').hasClass('selected')){
            $('.course').removeClass('selected');
            $('.menu-items').removeClass('selected');
            $('.course').animate({left: -pos}, 500, 'easeInOutQuart', function(){
                _this.closest('.course').addClass('selected');
                _this.siblings('.menu-items').addClass('selected');
                _this.parent().find('.menu-right').addClass('selected');
            });
        }
    });

    

}) (jQuery);