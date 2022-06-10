var _about = $('.about').find('.tags'),
    _item = $('.txt').find('.title'),
    wd = $(window).width(),
    wh = $(window).height(),
    selected_news = 0,
    decal = 0,
    step = 400;

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

_about.css({left: 'calc(50vw - '+decal+'px)'});

_item.on('click', function (e) {

    var id = Number($(this).closest('.txt').data("id"));
        pos = Number(id - selected_news)*step,
        _this = $(this);

        console.log('click : ' + id);

    if (!_this.closest('.txt').hasClass('selected')){
        $('.txt').removeClass('selected');
        $('.content').removeClass('selected');
        $('.txt').animate({left: -pos}, 1000, 'easeInOutQuart', function(){
            _this.closest('.txt').addClass('selected');
            _this.siblings('.content').addClass('selected');
        });
    }
});