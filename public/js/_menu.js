$(function(){

    $(document).on('mouseover',"#menu .a-menu",function(e ){

        e.preventDefault();

        var _this = $(this);
        var is_visible = $(this).parent('div').find('ul').is(':visible');

        $('#menu').find('ul').each(function(){
            $(this).fadeOut(400);
        });

        $('#menu a').each(function(){
            $(this).removeClass('selected');
        });
        var parent =  $(this).parent('div');
        var _this = $(this);
        if(!is_visible){
            $(this).parent('div').find('ul').fadeIn(200);
            $(this).toggleClass('selected');
        }else{
            $(this).toggleClass('selected');
        }
        $(parent ).find('ul').mouseleave(function(){
            $('#menu').find('ul').each(function(){
                $(this).fadeOut(400);
            });
            _this.toggleClass('selected');
        })

    });
    /**
     * menu fixed
     */
    $(document).on('mouseenter','.menu-fixed .a-menu', function(e){
        e.preventDefault();

        var id= '.sub_'+$(this).data('sub');
        $('#sub_menu_fixed > div').each(function(){
            $(this).hide();
        });

        $(id).fadeIn().css('display','flex');

        $('#sub_menu_fixed').animate({'top':'0' }, 1 );
        $('#sub_menu_fixed').animate({'top':'64px' },500);

    });
    $(document).on('click','.close_booking', function(e){
        e.preventDefault();
        var width = parseInt($('#room-restau-fixed').width()) * -1;

        $('#room-restau-fixed').animate({'right':width+'px'}, 'slow', function(){

        })
    });

    $(document).on('click','#fixed_booking', function(e){
        e.preventDefault();
        var width = parseInt($('#room-restau-fixed').width());
        console.log(width);
        $('#room-restau-fixed').animate({'right':'0px'}, 'slow', function(){

        })
    });



})