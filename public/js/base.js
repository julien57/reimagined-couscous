$(function(){
/*
    $( '#changeForm' ).click(function() {
        $( "#form-booking" ).toggle( "drop" );
    });
    $( '#changeFormSalle' ).click(function() {
        $( "#form-booking-restaurant" ).toggle( "drop" );
    });
*/
   
  $(document).on('click','._context', function( e ){

      e.preventDefault();

      var _current_context = 'room',
          context = $(this).data('context');

      $( "#form-booking" ).toggle( "drop" );

      if( context == 'room') _current_context = 'restaurant';


//formenu fixed
      if($(this).hasClass('fixed')){

          $('.link-to-fixed a').each(function(){
              $(this).removeClass('selected')
          });

          $(this).addClass('selected');

          $('#room-restau-fixed').find('.form-booking').each(function(){
              $(this).addClass('hidden');

              if($(this).hasClass(context) ==  true){
                  $(this).removeClass('hidden');
              }
          });

      }else{
          $('.'+_current_context).each(function(){
              $(this).addClass('hidden');
          });

          $('.'+context).each(function(){
              $(this).removeClass('hidden');
          });

          $('.room-book').find('.link-to').each(function() {
              $(this).addClass('hidden');
          });

          $('.link-to.'+_current_context).removeClass('hidden');

      }


      //$('.header-booking').toggleClass('a-items-end');
      //$('.link-to.'+context).removeClass('hidden');
  });

    //increment or discremnt

    var adults = $('.nbr-adult').data('adult');

    $(document).on('click','#_more', function( e ){
        e.preventDefault()
        var parent_form = $(this).parents('form');
        adults = adults + 1;
        $('.nbr-adult').html(adults);

        $(parent_form).find('._adult').val(adults)
    });

    $(document).on('click','#_less', function( e ){
        e.preventDefault();
        var parent_form = $(this).parents('form');
        if(adults > 0){
            adults = adults - 1;
            $('.nbr-adult').html(adults);
        }
        $(parent_form).find('._adult').val(adults)

    });


    $('.header-logo, .mobile-logo').click(function(){
        const currentLocale = document.querySelector('html').getAttribute('lang');
        window.location.href = `/${currentLocale}/home`;
    });

    $(document).on('click','.close',function( e ){

        e.preventDefault();
        $("#message").removeClass('display').hide();
        $("#overlay").removeClass('display').hide();

    })
});