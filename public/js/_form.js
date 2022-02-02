$(function(){

    var params = {
        'restaurant':{
            'route':'/api/',
            'entity' : 'restaurant'
        },
        'room':{
            'route':'/api/',
            'entity' : 'room'
        },
        'conferences':{
            'route':'/api/',
            'entity' : 'gift',
            'required' : {
                'email' : 'gift_email',
                'lastname' : 'gift_lastName' ,
                'name': 'gift_name'
            },
        },
        'contact':{
            'route':'contact',
            'entity' : 'contact',
            'required' : {
                'email' : 'contact_email',
                'lastname' : 'contact_lastName' ,
                'name': 'contact_name',
                //'date' : 'contact_eventDate'
            },
            'notnull' : {
                'pn' : 'people_number',
                'ce' : 'contact_eventDate'
            }
        },
        'booking':{
            'route':'booking',
            'entity' : 'booking'
        },
        'gift':{
            'route':'gift',
            'entity' : 'gift',
            'required' : {
                'email' : 'gift_email',
                'lastname' : 'gift_lastName' ,
                'name': 'gift_name'
            },
        },
        'birthday':{
            'route':'gift',
            'entity' : 'gift',
            'required' : {
                'email' : 'gift_email',
                'lastname' : 'gift_lastName' ,
                'name': 'gift_name'
            },
        },
        'newsletter':{
            'route':'newsletter',
            'entity' : 'newsletter'
        },
        'class-reunion':{
            'route':'/ajax/',
            'entity' : 'gift'
        },
    }

    var required = {
        0 : 'gift_email',
        1 : 'gift_lastName' ,
        2 : 'gift_name',
        3 : 'contact_email',
        4 : 'contact_lastName' ,
        5 : 'contact_name',
        6 : 'dayroom_room',
        7 : 'dayroom_atDate'
    };

    $(document).on('click', '.submit_form', function(e){
        alert('coucou')
        e.preventDefault();

        $('.error').each(function(){
            $(this).removeClass('error');
        });

        var context = $( this ).data('context');
        if(context === undefined){
            alert('couuco');
            return;
        }
        var form = $(this).closest('form');

        if(context === 'baptism-and-communion' ||  context === 'classe-reunion' || context ==='wedding'){
            context = 'gift';
        }

        var param = params[context]['entity'],
            notnull = params[context]['notnull'],
            //required = params[context]['required'],
            parent_form = $( this ).parents( 'form' ),
            data =  $( parent_form ).serialize();

       /* if(required !== undefined ){
            var error = false;

            for (var req in required ) {
                var input = '#'+required[req];
                if($(input) !== undefined ){
                    if($(input).val() ===''){
                        $(input).addClass('error');
                        $('#messageOffer').text('Erreurs dans le formulaire')
                        $('#messageOffer').css('color', 'red');
                        error = true;
                    }
                }
            }

            if(error === true){
                return;
            }
        }*/

        data = data+'&context='+param;

        $.ajax({
            url:        '/form/ajax/',
            type:       'POST',
            data:       data ,
            async:      true,
            success: function(data , status) {
                if (data.status === 'error') {
                    $('#messageOffer').text('Erreurs dans le formulaire')
                    $('#messageOffer').css('color', 'red')

                } else {
                    $('#messageOffer').text('Demande envoyée !')
                    $('#messageOffer').css('color', 'green')
                    form[0].reset();
                }

            },
            error : function(xhr, textStatus, errorThrown) {
                alert('Ajax request failed.');
            }
        });
    });


    /**
     * restaurant room
     */
    var require = {
        'room':{
            1:'starting',2:'arrival',3:'_adult',
        },
        'restaurant':{
            1:'booking_date', 2:'_adult',
        }
    }

    /**
     *
     */
    $(document).on('click', '.submit_api', function(e){

        e.preventDefault();
        e.stopPropagation();
        var context = $( this ).data('context');

        var param = params[context]['entity'];
        var parent_form = $( this ).parents( 'form' );
        var error= false;

        var _adult = $(parent_form).find('._adult').val();

        if(_adult <1){
            alert('error');
            return;
        }

        //other error
        $(parent_form).find('input:not(.input-promo)').each(function(){
            if($(this).val() === ''){
                error= true;
            }

        });

        if(error === true){
            if (document.getElementById('departureField').value === '') {
                document.getElementById('departureField').style.border = '2px solid red';
                document.getElementById('departureField').style.borderRadius = '3px';
            } else {
                document.getElementById('departureField').style.border = 'none';
            }
            if (document.getElementById('arrivalField').value === '') {
                document.getElementById('arrivalField').style.border = '2px solid red';
                document.getElementById('arrivalField').style.borderRadius = '3px';
            } else {
                document.getElementById('arrivalField').style.border = 'none';
            }
            return;
        }

        //when ok
        var data =  $( parent_form ).serializeArray();

        var datas = {};
        $.map(data, function(n, i){
            datas[n['name']] = n['value'];
        });

        /*
        var arrivalDate = new Date(datas.arrival);
        arrivalDate = moment(arrivalDate).format('YYYY-DD-MM');
        var departureDate = new Date(datas.departure);
        departureDate = moment(departureDate).format('YYYY-DD-MM');
         */

        if(context =='room'){
            var arrival = datas.arrival;
            var departure = datas.departure;
            var arrayArrival = arrival.split('-');
            var arrayDeparture = departure.split('-');
            arrayArrival = `${arrayArrival[2]}-${arrayArrival[1]}-${arrayArrival[0]}`;
            arrayDeparture = `${arrayDeparture[2]}-${arrayDeparture[1]}-${arrayDeparture[0]}`;

            var url = "https://reservations.cubilis.eu/alvisse-parc-hotel-luxembourg/Rooms/Select?lang=en&Arrival="+arrayArrival+"&Departure="+arrayDeparture+"&Rate=&discountCode="+datas.promoCode;
            if( context =='room' || context =='restaurant'){

                $('#overlay').fadeIn("slow").addClass('display');

                $('#message').find("p").html('Vous allez etre redirigé vers le formulaire de réservation !');
                var redir = false;

                $('#message').addClass('display').fadeIn().delay( 2000 ).queue( function(){

                    window.open(url, '_blank');
                    $('#message').hide().removeClass('display');
                    $('#overlay').fadeOut("slow").removeClass('display');
                    window.location.reload();
                    redir = true;
                });

            }
        }

        if(context =='restaurant'){
            var date =  datas.booking_date.split("-");
            //date = date[2]+'-'+date[1]+'-'+date[0];
            date = date[0]+'-'+date[1]+'-'+date[2]
            var src = 'https://reservations.tablebooker.com?&modal=0&lang=fr&source=website&restaurantId=52633651&theme=light&&obmId=obm-0&date='+date+'&people='+_adult;
            var height = parseInt($('#obm-0').css('height')) *-1;
            $('#obm-0').attr('src',src );
            // $('#overlay').fadeIn("slow").addClass('display');

            $('#obm-0').fadeIn('slow').animate({'bottom': '-300px' }, 'slow',function(){
                $('#close_booking').fadeIn().css('display','flex');
            });

        }
    });

    $(document).on('click','#close_booking', function(){
        $(this).fadeOut();
        $('#obm-0').fadeOut('slow');
    });
})
