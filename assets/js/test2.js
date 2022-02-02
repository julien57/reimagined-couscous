alert('hola')



/*$('.right, .left', shutter).find('.img').mousemove(function( event ) {

    if (!shutter.hasClass('open')){
        $(this).css('z-index', 2);

        var pos =  event.pageX, 
            wdth = shutter.width(),
            ww = $(window).width()*.5,
            posdef = (ww - pos),
            side = $(this).parent(),
            dep = (side.hasClass('right')) ? .5*pos/ww : 1*posdef/ww,
            other = (side.hasClass('right')) ? $('.left', shutter) : $('.right', shutter);

        shutter.css({'left': posdef*dep});
        other.find('.img').css({'background-position-x': -posdef*dep}).delay( 300 );
        other.find('.number').css({'opacity': Number(1-dep)*1.5});
    }
  });*/

  /*if (!shutter.hasClass('open')){
        $(this).css('z-index', 2);

        var pos =  event.pageX, 
            wdth = shutter.width(),
            ww = $(window).width()*.5,
            posdef = (ww - pos),
            side = $(this).parent(),
            dep = (side.hasClass('right')) ? 1.4*pos/ww : 4*posdef/ww,
            other = (side.hasClass('right')) ? $('.left', shutter) : $('.right', shutter);

        if (pos > ww*.5 && pos < ww*1.5 && !corner){

            console.log('center');

            corner = true;

            shutter.find('.number').animate({'opacity': .85}, delay);
            $('.content').css('z-index', 1);
            shutter.find('.left').animate({left: '-50vw'}, delay);
            shutter.find('.right').animate({right: '-50vw'}, delay, function(e){
                corner = false;
            });
        }

        if (pos > ww*1.32 && !corner){
            console.log('right');
            corner = true;
            shutter.find('.left').find('.number').animate({'opacity': .15}, delay);
            shutter.find('.right').find('.number').animate({'opacity': .85}, delay);
            shutter.find('.left').animate({left: '-100vw'}, delay);
            shutter.find('.right').animate({right: 0}, delay, function(e){
                corner = false;
            });
        }

        if (  pos < ww*.66 && !corner){
            console.log('left');
            corner = true;
            shutter.find('.right').find('.number').animate({'opacity': .15}, delay);
            shutter.find('.left').find('.number').animate({'opacity': .85}, delay);
            shutter.find('.right').animate({right: '-100vw'}, delay);
            shutter.find('.left').animate({left: 0}, delay, function(e){
                corner = false;
            });
        }
    }*/