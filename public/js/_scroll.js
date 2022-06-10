$(function(){

    var _top = $(document).scrollTop();
    var _top_menu = $(document).scrollTop();
    var base = parseInt($('#header').css('height')) + parseInt($('#abs-header').css('height'))
    //$('.block_page').css('visibility' , 'hidden');

    //$('.block_page > div').fadeOut();

    var lastScrollTop = 0;

    $(window).scroll(function( event ) {
        event.preventDefault();

        //close menu fixed
        $('#sub_menu_fixed').css({'top':'0' });
        $('#sub_menu_fixed > div').each(function(){
            $(this).hide();
        });

       //close form booking fixed
        //$('#room-restau-fixed').animate({'right':'-400px'} , 'slow' );

        var ofset_menu = $('.header').offset();
        var t = $('#main').offset();
        var height = parseInt($(this).height());
        var _top = parseInt($(document).scrollTop()) + (base+ (base/2));
       // var _top = parseInt($(document).scrollTop()) + base;
        //console.log(base);
        var i = 1;
        var h = 0;

        var st = $(document).scrollTop();
        if (st > lastScrollTop){

        } else {

        }
        /*$('.block_page').css('visibility' , 'hidden');
        $('.block_page > div').fadeOut();*/
        lastScrollTop = st;

        $('.block_page').each( function(){
            var pos = $(this).scrollTop();
            if (pos == 0) {
             //console.log(pos)
            }
            var screen_heigh =window.screen.height;

            var  heisght = $( window ).height(),
                 offset = $(this).offset(),
                 top = offset.top,
                 element = $( this).find('div').first(),
                 height =  $(this).height();

            if(_top > top ){
                if($(element).is(':visible') === false){
                    $(this).css({'visibility':'visible'});
                    $(element).fadeIn(100);
                }
            }else{
                if($(element).is(':visible') === true){
                    $(this).css({'visibility':'hidden'});
                    $(element).fadeOut(100);
                }
            }

            if(_top <= (top +30) ){
                if($(element).is(':visible') === true){
                    $(this).css({'visibility':'hidden'});
                    $(element).hide(100);
                }
            }

            h = h + height;
            var tt = top + screen_heigh +height*2;
            var ttt = top + screen_heigh +height;

            i = i +1;
        });

    });

   /* var _top_menu = $(document).scrollTop();
    $(document).on( 'scroll', function( e ){
        event.preventDefault();
        var _top_menu = $(document).scrollTop();
        $('#sub_menu_fixed').animate({'top':'0' }, 'slow');

        $('#sub_menu_fixed > div').each(function(){
                $(this).hide();
        });

        var scroll_top = $('.header').offset().top;

        if(_top_menu > 0){
            $('#sub_menu_fixed > div').each(function(){
                $(this).hide();
            });

        }
    });*/

})