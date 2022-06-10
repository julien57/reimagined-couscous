var _newslist = $('.news-wrapper').find('.items'),
    _news = $('.actu').find('.image-wrapper'),
    _newsGroup = $('.news-wrapper'),
    wd = $(window).width(),
    wh = $(window).height(),
    selected_news = 0,
    cursor = $('.cursor-header'),
    decal = 0,
    step = 300;

_newslist.find('.actu').eq(0).addClass('selected');
_newslist.find('.actu').eq(0).find('.news-right, .date').addClass('selected');

_news.each(function() {
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

_newslist.css({left: 'calc(50vw - '+decal+'px)'});

_newsGroup.on("swipeleft", function(){
    _news.each(function() {
        var id = Number($(this).closest('.actu').data("id")),
            _this = $(this),
            _next = _this.closest('.items').find('.actu').eq(id).find('.image-wrapper');

        if (_this.closest('.actu').hasClass('selected')){
            console.log('this id : ' + id);
            _next.trigger( "click" );
        }
    })
});

_newsGroup.on("swiperight", function(){
    _news.each(function() {
        var id = Number($(this).closest('.actu').data("id")),
            _this = $(this),
            _prev = _this.closest('.items').find('.actu').eq(id-2).find('.image-wrapper');

        if (_this.closest('.actu').hasClass('selected') && id != 1){
            console.log('this id : ' + id);
            _prev.trigger( "click" );
        }
    })
});

_news.on('click', function (e) {

    var id = Number($(this).closest('.actu').data("id"));
        pos = Number(id - selected_news)*step,
        _this = $(this);

    if (!_this.closest('.actu').hasClass('selected')){
        $('.actu').removeClass('selected');
        $('.news-right, .img').removeClass('selected');
        $('.date').removeClass('selected');
        $('.actu').animate({left: -pos}, 300, function(){
            _this.closest('.actu').addClass('selected');
            _this.parent().siblings('.news-right').addClass('selected');
            _this.find('.img').addClass('selected');
            _this.siblings('.date').addClass('selected');
        });
    }
});

_news.hover(
    function() {
        if (!$(this).closest('.actu').hasClass('selected')){
            cursor.addClass('state0');
            cursor.removeClass('state1');
            cursor.find('.label').text('view news');
            cursor.find('.label').animate({opacity: 1}, 300);
        }
    }, function() {
        if (!$(this).closest('.actu').hasClass('selected')){
            cursor.addClass('state1');
            cursor.removeClass('state0');
            cursor.find('.label').text('');
            cursor.find('.label').animate({opacity: 0}, 300);
        }
    }
);

document.addEventListener('scroll', function (event) {

    if ($('header').length > 0){
        var w = $('header').offset().top;

        if(w < -100){
            $('.scroll').css({opacity: 0});
        } else {
            $('.scroll').css({opacity: 1});
        }
    }
    
}, true);