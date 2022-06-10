var context = $('.form_newsletter'),
    ht = context.height(),
    shutter = $('.shutter'),
    cursor = $('.cursor-header'),
    wd = $(window).width(),
    wh = $(window).height(),
    oldwh = wh,
    oldwd = wd
    logo = $('.logo-container'),
    idleTime = 0,
    cursorTxt = cursor.find('.label').attr('data-txt').split(','),
    lng = false,
    startAnimDet = false,
    OverAnimDet = true,
    animLock = true,
    _alpha = 0,
    _beta = 0,
    _gamma = 0,
    _phase = 0,
    _maxPhase = 2,
    _scrollLocked = false,
    _dir = '';

cursor.find('.label').text('Loading...');
cursor.find('.icon').css({opacity: 0});

$(document).ready(function () {

    transitionImg();

    if ( wd > 840 ){
        context.css({opacity: 1, bottom: -ht + 40});
    } else{
        context.css({opacity: 1, bottom: -ht + 35});
    }

    if ( wh < 480 ){
        context.css({opacity: 1, bottom: -ht + 0});
        var onmovedevice = false;
        $('.orientation-icon').show();
    } else{
        animLock = true;
    }


    /* ---------------------- Device Orientation events ------------------------ */


    function deviceOrientationHandler(e){

        _alpha = e.alpha;
        _beta = e.beta;
        _gamma = e.gamma;

        var bg_dest = (_beta > 0 )? '40vw' : '-40vw',
            bg_dest2 = (_beta <= 0 )? '-20vw' : '20vw',
            bg_dest3 = (_beta <= 0 )? '-10vw' : '10vw';

        if (!onmovedevice && !animLock){
            onmovedevice = true;
            shutter.find('.right').find('.img-bg').animate({'background-position-x': bg_dest2}, 300, 'easeInOutQuad', function(){
                onmovedevice = false;
            });

            shutter.find('.left').find('.img-bg').animate({'background-position-x': bg_dest3},300, 'easeInOutQuad');
            shutter.animate({left: bg_dest}, 300, 'easeInOutQuad');
        }
    }
    
    if (window.DeviceOrientationEvent) {
        window.addEventListener('deviceorientation', deviceOrientationHandler, false);
    } else {
        alert('Device orientation not supported in this browser.');
    }


    /* ---------------------- Starting anims ------------------------ */


    const imageUrl = "/build/images/7-1.7c49d8ef.png";
    let preloaderImg = document.createElement("img");
    preloaderImg.src = imageUrl;

    preloaderImg.addEventListener('load', (event) => {
        preloaderImg = null;
        $('.img').animate({opacity: 1}, 800);
    });

    var delayStart = setInterval(StartAnim, 10000);
    $('.logo').animate({opacity: 0}, 1000, function(){
        $(this).hide();
    });

    $('.logo-numbers').animate({opacity: 1}, 1000);
    $('.logo-numbers').find('.six').animate({left: '9%', top: '8%'}, 1500);

    if (!shutter.hasClass('open')){
        phasing ();
    }

    var idleInterval = setInterval(timerIncrement, 1000);

    function StartAnim(){
        if (!shutter.hasClass('open')){
            phasing ();
        }
    }

    function phasing (){
        if (_phase < _maxPhase){
            shutter.find('.phase'+_phase).find('.front').addClass('start');
            shutter.find('.phase'+_phase).animate({opacity: 1}, 1000);
            shutter.find('.phase'+_phase).find('.front').animate({opacity: 1}, 1000);
            shutter.find('.phase'+_phase).show();
            console.log('phase : '+_phase);
            _phase++;

        } else {

            shutter.find('.phase'+Number(_maxPhase - 1)).animate({opacity: 0}, 1000);
            shutter.find('.phase'+Number(_maxPhase - 1)).find('.front').animate({opacity: 1}, 1000, function(){
                shutter.find('.phase'+Number(_maxPhase - 1)).find('.front').removeClass('start');
                shutter.find('.phase'+Number(_maxPhase - 1)).hide();
            });

            _phase = 0;

            for (var i = 1; i < Number(_maxPhase - 1); i++){
                shutter.find('.phase'+i).find('.front').removeClass('start');
                shutter.find('.phase'+i).css({opacity: 0});
                shutter.find('.phase'+i).find('.front').css({opacity: 0});
                shutter.find('.phase'+i).hide();
            }

            if (!shutter.hasClass('open') ){
                if (wd > 840){
                    startAnimDet = true; 
                } else {
                    delayOrientation = setInterval(UnlockOrientation, 2000);
                }
            }
        }
    }

    function logoGoTop(){
        if (!shutter.hasClass('open') && wd > 840 ){
            logo.animate({width: '30vw', height: '40vh', top: '-12vh'}, 600);
        }

        clearInterval(delay2);
    }
    
    function UnlockOrientation(){
        animLock = ( wh < 480 )? false : true;
        clearInterval(delayOrientation);
    }
});


/* ---------------------- Inits ------------------------ */


context.ready(function () {
    ht = context.height();
});

$(window).on('load', function () {
    $('#loading').hide();
    $('#main').show();
    $('#main').animate({opacity: 1}, 1200, function(){
        cursor.find('.icon').css({opacity: 1});
        cursor.find('.label').text(cursorTxt[0]);
    });
});

function transitionImg(){
    shutter.find('.left').find('.front').addClass('seven-one');
    shutter.find('.left').find('.back').addClass('six-seven');
    shutter.find('.right').find('.front').addClass('six-one');
    shutter.find('.right').find('.back').addClass('seven-six');
}


/* ---------------------- Shutter behavior ------------------------ */


var onmove = false;

$(shutter).find('.img').on('click', function (event) {

    console.log('triggered');

    if (!shutter.hasClass('open') && wd > 840){

        OverAnimDet = false;

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
        
        var /*pos =  event.pageX,
            
            
            destination = (pos > ww) ? halfLeft : halfRight,
            topDestination = (pos > ww) ? -hh*.1 : hh*.85,
            leftDestination = (pos > ww) ? -ww + hh*.267 : ww - hh*.267,
            bg_dest = (pos > ww) ? 0 : fullLeft,
            bg_dest2 = (pos > ww) ? fullRight : 0,*/
            
            main = $('#main'),
            ww = $(window).width()*.5,
            hh = $(window).height()*.5,
            side = $(this).parent(),
            dirThis = (side.hasClass('right')) ? 'right' : 'left',
            _dir = dirThis,

            destination = (dirThis == 'right') ? halfLeft : halfRight,
            topDestination = (dirThis == 'right') ? -hh*.1 : hh*.85,
            leftDestination = (dirThis == 'right') ? -ww + hh*.267 : ww - hh*.267,
            bg_dest = (dirThis == 'right') ? 0 : fullLeft,
            bg_dest2 = (dirThis == 'right') ? fullRight : 0,

            opacityThis = (side.hasClass('right')) ? 1 : .45,
            opacityOther = (side.hasClass('left')) ? 1 : .45,
            other = (dirThis == 'right') ? $('.left', shutter) : $('.right', shutter),
            arrowDir = (dirThis == 'right') ? -90 : 90,
            _menulist = (dirThis == 'right') ? $('.seven').find('.menu-wrapper .items') : $('.six').find('.menu-wrapper .items'),
            _newslist = (dirThis == 'right') ? $('.seven').find('.news-wrapper .items') : $('.six').find('.news-wrapper .items');

        if (!onmove){
            onmove = true;
            shutter.attr('data-dir', _dir);

            cursor.find('.icon').animate(
                { deg: arrowDir },
                    {
                    duration: 300,
                    step: function(now) {
                        $(this).css({ transform: 'rotate(' + now + 'deg)' });
                    }
                }
            );

            if (dirThis == 'right'){
                $( "#wrapper" ).animate({ scrollTop: 0 }, "slow", function(){
                    main.find('.six').hide();
                    main.find('.seven').show();
                });
                
            } else {
                $( "#wrapper" ).animate({ scrollTop: 0 }, "slow", function(){
                    main.find('.six').show();
                    main.find('.seven').hide();
                }); 
            }

            shutter.find('.right').find('.img-bg').animate({'background-position-x': bg_dest}, 800, 'easeInOutQuad');
            shutter.find('.left').find('.img-bg').animate({'background-position-x': bg_dest2}, 800, 'easeInOutQuad');
            $('.logo-container').animate({left: leftDestination, top: topDestination}, 800, 'easeInOutQuad');
            shutter.animate({left: destination}, 800, 'easeInOutQuad', function(){
                onmove = false;
                shutter.find('.'+dirThis).find('.front').css({opacity: 1});
                shutter.find('.'+dirThis).find('.front').addClass('start');
                $('.menu-main').animate({opacity : 1}, 300);
                $('.logo-container').find('.six').animate({opacity : opacityThis});
                $('.logo-container').find('.seven').animate({opacity : opacityOther}); 

                console.log('triggered passed : '+dirThis);
            });

            _menulist.find('.course').eq(0).addClass('selected');
            _menulist.find('.course').eq(0).find('.menu-right').addClass('selected');
            _newslist.find('.actu').eq(0).addClass('selected');
            _newslist.find('.actu').eq(0).find('.news-right, .date').addClass('selected');

            $('.menu-main').removeClass('sticky');
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


/* ---------------------- Scroll events ------------------------ */


document.addEventListener('scroll', scrollHandler, true);

function scrollHandler(){
    //console.log('dir : '+shutter.attr('data-dir'));
    var dir = shutter.attr('data-dir'),
        context = (dir == 'right') ? $('.right') : $('.left'),
        h = $('.shutter').offset().top;

    if (-h > wh-100){

        if (!$('.menu-main', context).hasClass('sticky') && !_scrollLocked){ 
            _scrollLocked = true;
            $('.menu-main', context).addClass('sticky');
            $('.sticky').css({opacity: 0, top: -100});
            $('.sticky').animate({opacity: 1, top: 0}, 500, function(){
                _scrollLocked = false;
            });
        }
    } else {

        if ($('.menu-main', context).hasClass('sticky') && !_scrollLocked){
            _scrollLocked = true;

            $('.sticky').animate({opacity: 0, top: -100}, 500, function(){
                
                _scrollLocked = false;
                $(this).animate({opacity: 1,top: 0}, 300);
                $('.menu-main').removeClass('sticky');
            });
        }
    }
}

$('.tosix, .toseven').on('click', function (event) {
    console.log('to six');
    //scrollToAnchor('top');
    scrollToOtherSide();
});

function scrollToOtherSide(){
    var dir = shutter.attr('data-dir'),
    destination = $("div[name='top']"),
    thisDir = $('.right');

    $('#wrapper').animate({
        scrollTop: destination.offset().top
    }, 800, function(){
        console.log("Done scrolling : "+dir);
        
        if (dir == 'right'){
            thisDir = $('.left');
        }

        thisDir.find('.img').trigger('click');
    });
}

$('.link').on('click', function (event) {
    console.log('menu : '+$(this).attr('name'));
    var target = $(this).attr('name');
    scrollToAnchor(target);
});

var lastDest = 0;

function scrollToAnchor(aid){
    var dir = shutter.attr('data-dir'),
        destination = (dir == 'right')? $('.seven').find("div[name='"+ aid +"']") : $('.six').find("div[name='"+ aid +"']"),
        dest = Number(parseInt(destination.offset().top) - parseInt(lastDest));

    $('#wrapper').animate({
        scrollTop: dest
    }, 800, function(){
        console.log("Done scrolling : "+parseInt(destination.offset().top)+' - lastscroll : '+parseInt(lastDest)+' = '+dest);
        lastDest  = parseInt(destination.offset().top);
        if (dest < 0){
            lastDest = 0;
        }
    });
}


/* ---------------------- Resize events ------------------------ */


$(window).resize(function () {

    wd = $(window).width();
    wh = $(window).height();
    
    $('.shutter').css({'left': 0});
    $('.right, .left', shutter).find('.img-bg').css({'background-position-x': 0});
    $('.logo-container').css({left: 0, top: '19vh'});
    $('.menu-main').css({opacity: 0});

    if (Math.abs(wh - oldwh) > 300){
        orientationAdv();
    }

    if (wd < 960 && oldwd > 960){
        location.reload();
        oldwd = wd;
    }

    if (wd > 960 && oldwd < 960){
        location.reload();
        oldwd = wd;
    }
});

function orientationAdv(){

    if (wd < 900 && wh < 900){
        location.reload();
        oldwh = wh;
    }
}


/* ---------------------- Cursor behavior ------------------------ */


var ballX = 0,
    ballY = 0,
    speed = 0.15,
    posX = 0,
    posY = 0
    scrollY = 0;

function animate(){

    let distX = posX - ballX,
        distY = posY - ballY;
    
    ballX = ballX + (distX * speed);
    ballY = ballY + (distY * speed);

    cursor.css({'transform' : 'matrix(1, 0, 0, 1, '+ballX+', '+ballY+')'});
    
    requestAnimationFrame(animate);
}

animate();

$(document).mousemove(function( event ) {

    idleTime = 0;
    posX = Number(event.pageX-10),
    posY = Number(event.pageY-10);
});

function timerIncrement() {
    idleTime = idleTime + 1;
    if (lng) {idleTime = 4};

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

$(context).find('#submitInput, button').on('click', function (e) {
    cursor.show();
});


/* ---------------------- Form behavior ------------------------ */


$('.opener',context).on('click', function (e) {
    cursor.addClass('state1');
    cursor.removeClass('state0');

    if (!context.hasClass('open')){

        if ( wh < 480 ){
            h = 0;
            context.animate({top: 120, bottom: -1}, 600, "easeInQuint");
        } else{
            context.animate({bottom: -1}, 300, "easeOutQuint");
        }
        
        context.addClass('open');
    } else {
        var h = 160;

        if ( wd > 840 ){
            h = 40;
            context.animate({bottom: -ht + h}, 300, "easeInQuint");
        } else{
            h = 35;
            context.animate({bottom: -ht + h}, 300, "easeInQuint");
        }

        if ( wh < 480 ){
            h = wh + 27;
            

            if ( wd > 840 ){
                h = wh - 25;
            }
            context.animate({top: h, bottom: -1}, 600, "easeInQuint");
        }
        
        context.removeClass('open');
    }
});

$('.opener',context).hover(
    function() {
        cursor.addClass('state0');
        cursor.removeClass('state1');
        if (!context.hasClass('open')){
            cursor.find('.label').text(cursorTxt[1]);
        } else {
            cursor.find('.label').text(cursorTxt[2]);
        }
    }, function() {
        cursor.addClass('state1');
        cursor.removeClass('state0');
        cursor.find('.label').text(cursorTxt[0]);
    }
);


/* ---------------------- Languages ------------------------ */


$('.language-switcher').hover(
    function() {
        lng = true;
        cursor.addClass('state0');
        cursor.removeClass('state1');
        cursor.find('.label').text(cursorTxt[4]);
        cursor.find('.label').animate({opacity: 1}, 300);
        cursor.find('.icon').css({opacity: 0});
    }, function() {
        lng = false;
        cursor.addClass('state1');
        cursor.removeClass('state0');
        cursor.find('.label').text(cursorTxt[0]);
        cursor.find('.label').animate({opacity: 0}, 300);
        cursor.find('.icon').css({opacity: 1});
    }
);


/* ---------------------- Socials ------------------------ */


$('.facebook, .instagram, .linkedin, .legal').hover(
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
        cursor.find('.label').text(cursorTxt[3]+' '+name);
        
    }, function() {
        cursor.addClass('state1');
        cursor.removeClass('state0');
        cursor.find('.label').text(cursorTxt[0]);
    }
);

$('.legal').hover(function() {
    cursor.find('.label').text(cursorTxt[5]);
});
