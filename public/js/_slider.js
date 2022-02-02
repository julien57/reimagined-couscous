$(function(){

     $(document).on( 'click' , '.arrow' , function( e ){

         e.preventDefault();

         var width = parseInt($('.slider-detail').css('width'))  + 20;

         var direction  = $(this).data('dir'),
              first =  $('.slider-detail').first(),
              last =  $('.slider-detail').last(),
              left = true;

         if( direction == 'right') {
             width = width * -1;
             left = false;
         }
         var sens = 'margin-'+direction;

         if( left ) {
             $('.wrapp-slider').prepend($(last));
             $('.wrapp-slider').css('margin-left','-353px');
             width = 0;
         }else{
             $('.slider-detail').first().addClass('_dark_slide').find('.slide-overlay').addClass('dark_slide').show();
         }

         $('.slider-detail').find('.description').removeClass('hidden');

         $('.wrapp-slider').animate({ 'margin-left' : width+'px' }, 200 , function(){

             if( !left ){
                 $(this).append($(first));
             }

             $(this).css('margin-left',0);

             var i = 0

             $('.slider-detail').each(function(){
                 $(this).removeClass('_dark_slide');
                 $(this).find('.description').removeClass('hidden');
                 $(this).find('.slide-overlay').removeClass('dark_slide');

                 if(i > 1){
                     $(this).addClass('_dark_slide');
                     $(this).find('.description').addClass('hidden');
                      $(this).find('.slide-overlay').addClass('dark_slide');
                 }

                 i = i+1;
             });

         });


     });


    /**
     * js room slider for exemple
     */
    var position = 1;
    $(document).on('click', '.g-arrow', function( e ){
        e.preventDefault();

        var parent = $(this).closest('._wrapp-imgs-slider');
        var wrapper = $(parent).find('.wrapp-imgs-slider');
        var children = $(wrapper).children('.img-slider');
        var length = children.length;
        console.log(length)
        if(length < 2){
            return;
        }
        var is_left = true;
        if(!$(this).hasClass('arrow-left')){
            is_left = false;
            position = position + 1;
            if(position > length ){
                position = 1;
            }
        }else{
            position = position - 1;
            if(position < 1 ){
                position = length;
            }
        }

        //loop

        children.each(function(index){
            $(this).addClass('hidden');
            $(this).removeClass('current').hide();
        });

        $(wrapper).children('.img-slider.position_'+position).removeClass('hidden').addClass('current').fadeIn('slow').css('display','flex');

    });


})