var context = $('.form_newsletter'),
    ht = context.height(),
    shutter = $('.shutter'),
    cursor = $('.cursor-header'),
    wd = $(window).width(),
    logo = $('.logo-container'),
    idleTime = 0;

cursor.find('.label').text('Loading...');
cursor.find('.icon').css({opacity: 0});

$(document).ready(function () {
    if ( wd > 840 ){
        context.css({opacity: 1, bottom: -ht + 160});
    } else{
        context.css({opacity: 1, bottom: -ht + 135});
    }
    var delay2 = setInterval(logoGoTop, 5000),
        idleInterval = setInterval(timerIncrement, 800);

    function logoGoTop(){

        if (!shutter.hasClass('open') && wd > 840 ){
            logo.animate({width: '30vw', height: '40vh', top: 0}, 600);
        }

        clearInterval(delay2);
    }
});

$(window).on('load', function () {
    $('#loading').hide();
    $('#main').show();
    $('#main').animate({opacity: 1}, 1200, function(){
        cursor.find('.icon').css({opacity: 1});
        cursor.find('.label').text('Click me');
    });
});

/* ---------------------- Shutter behavior ------------------------ */

$('.right, .left', shutter).find('.img').on('click', function (e) {
    e.stopPropagation();

    var openLeftWidth = '-100vw',
        openRightWidth = '-100vw',
        closeLeftWidth = '-50vw',
        closeRightWidth = '50vw',
        closeRightWidth2 = '-50vw';

    if (wd < 960){
        openLeftWidth = '-120vw';
        openRightWidth = '-120vw';
        closeLeftWidth = '-40vw';
        closeRightWidth = '40vw';
        closeRightWidth2 = '-40vw';
    }

    if (wd < 840){
        openLeftWidth = '-110vw';
        openRightWidth = '-124vw';
        closeLeftWidth = '-40vw';
        closeRightWidth = '40vw';
        closeRightWidth2 = '-40vw';
    }

    if (wd < 480){
        openLeftWidth = '-100vw';
        openRightWidth = '-137vw';
        closeLeftWidth = '-20vw';
        closeRightWidth = '20vw';
        closeRightWidth2 = '-40vw';
    }
    
    if (!shutter.hasClass('open')){
        logo.animate({width: 200, height: 200, top: 0, padding: 50}, 600);
        cursor.find('.icon').css({opacity: 0});
        shutter.addClass('open');
        shutter.find('.right').find('.img-bg').animate({'background-position-x': closeLeftWidth}, 600, 'easeInOutCubic');
        shutter.find('.left').find('.img-bg').animate({'background-position-x': closeRightWidth}, 600, 'easeInOutCubic');
        shutter.animate({left: 0}, 600, 'easeInOutCubic', function(e){
            
            //shutter.find('.number').animate({'opacity': .15}, 200);
            shutter.find('.left').animate({left: openLeftWidth}, 300);
            shutter.find('.right').animate({right: openRightWidth}, 300, function(e){
                $('.content').css('z-index', 3);
                cursor.addClass('state1');
                cursor.removeClass('state0');
            });
        });

    } else {
        $('.content').css('z-index', 1);

        if (!shutter.hasClass('open') && wd > 840 ){
            logo.animate({width: '30vw', height: '40vh', top: 0}, 600);
        }
        cursor.find('.icon').css({opacity: 1});
        shutter.find('.left').animate({left: closeLeftWidth}, 300);
        shutter.find('.right').animate({right: closeRightWidth2}, 300);
        shutter.removeClass('open');
    }
});

var onmove = false,
    dir = '';

$(shutter).find('.img').mousemove(function( event ) {

    if (!shutter.hasClass('open') && wd > 840 ){

        var fullLeft = '-100vw',
            fullRight = '100vw',
            halfLeft = '-50vw',
            halfRight = '50vw';

        if (wd < 960){
            fullLeft = '-80vw';
            fullRight = '80vw';
            halfLeft = '-40vw';
            halfRight = '40vw';
        }
        
        var pos =  event.pageX,
            ww = $(window).width()*.5,
            destination = (pos > ww) ? halfLeft : halfRight,
            bg_dest = (pos > ww) ? 0 : fullLeft,
            bg_dest2 = (pos > ww) ? fullRight : 0,
            
            side = $(this).parent(),
            dirThis = (side.hasClass('right')) ? 'right' : 'left',
            other = (dirThis == 'right') ? $('.left', shutter) : $('.right', shutter),
            arrowDir = (dirThis == 'right') ? -90 : 90;

        if (!onmove){
            onmove = true;

            cursor.find('.icon').animate(
                { deg: arrowDir },
                    {
                    duration: 300,
                    step: function(now) {
                        $(this).css({ transform: 'rotate(' + now + 'deg)' });
                    }
                }
            );

            shutter.find('.right').find('.img-bg').animate({'background-position-x': bg_dest}, 800, 'easeInOutQuad');
            shutter.find('.left').find('.img-bg').animate({'background-position-x': bg_dest2}, 800, 'easeInOutQuad');
            shutter.animate({left: destination}, 800, 'easeInOutQuad', function(){
                onmove = false;
                dir = dirThis;
            });
        }
    }
});

$(shutter).find('.img').hover(function( event ) {

    if (!shutter.hasClass('open') && wd > 840 ){
        var dirThis = ($(this).parent().hasClass('right')) ? 'right' : 'left',
        arrowDir = (dirThis == 'right') ? -90 : 90;
        cursor.find('.icon').animate(
            { deg: arrowDir },
                {
                duration: 300,
                step: function(now) {
                    $(this).css({ transform: 'rotate(' + now + 'deg)' });
                }
            }
        );
    }

});

$(window).resize(function () {
    $('.shutter').css({'left': 0});
    $('.right, .left', shutter).find('.img').css({'background-position-x': 0});
});

/* ---------------------- Cursor behavior ------------------------ */

function timerIncrement() {
    idleTime = idleTime + 1;

    if (!shutter.hasClass('open')){
        if (idleTime > 3) {
            cursor.find('.label').animate({opacity: 1}, 300);
            cursor.find('.icon').css({opacity: 0});

        } else {
            cursor.find('.label').animate({opacity: 0}, 300);
            cursor.find('.icon').css({opacity: 1});
        }    
    } else {
        cursor.find('.icon').css({opacity: 0});
        cursor.find('.label').animate({opacity: 1}, 300);
    }
    
}

$(shutter).find('.img').hover(
    function() {
        cursor.addClass('state0');
        cursor.removeClass('state1');
    }, function() {
        cursor.addClass('state1');
        cursor.removeClass('state0');
    }
);

$(context).find('input, button, .control--radio').hover(
    function() {
        cursor.hide();
    }, function() {
        cursor.show();
    }
);

$(document).mousemove(function( event ) {

    idleTime = 0;

    var posX = event.pageX,
        posY = event.pageY;
        
    cursor.css({'transform' : 'matrix(1, 0, 0, 1, '+Number(posX-10)+', '+Number(posY-10)+')'});
});

/* ---------------------- Form behavior ------------------------ */

$('.opener',context).on('click', function (e) {
    cursor.addClass('state1');
    cursor.removeClass('state0');

    if (!context.hasClass('open')){
        context.animate({bottom: 100}, 600, "easeOutQuint");
        context.addClass('open');
    } else {
        var h = 160;

        if ( wd > 840 ){
            h = 160;
        } else{
            h = 135;
        }
        context.animate({bottom: -ht + h}, 600, "easeInQuint");
        context.removeClass('open');
    }
});

$('.opener',context).hover(
    function() {
        cursor.addClass('state0');
        cursor.removeClass('state1');
        if (!context.hasClass('open')){
            cursor.find('.label').text('Open form');
        } else {
            cursor.find('.label').text('Close form');
        }
    }, function() {
        cursor.addClass('state1');
        cursor.removeClass('state0');
        cursor.find('.label').text('Click me');
    }
);

$('.facebook, .instagram, .linkedin').hover(
    function() {

        if($(this).hasClass('facebook')){
            name = 'Facebook';
        }

        if($(this).hasClass('instagram')){
            name = 'Instagram';
        }

        if($(this).hasClass('linkedin')){
            name = 'LinkedIn';
        }
        
        cursor.addClass('state0');
        cursor.removeClass('state1');
        cursor.find('.label').text('Share on '+name);
        
    }, function() {
        cursor.addClass('state1');
        cursor.removeClass('state0');
        cursor.find('.label').text('Click me');
    }
);
