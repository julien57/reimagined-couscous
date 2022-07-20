$(function(){
    $( function() {
        //$( ".datepicker" ).datepicker();
    } );

    var d = new Date();
    var currMonth = d.getMonth();
    var currYear = d.getFullYear();
    var currDay = d.getDate();
    var currNextDay = d.getDate()+1;
    var startDate = new Date(currYear, currMonth , currDay );
    var departure = new Date(currYear, currMonth , currNextDay );

    $(".datepicker").datepicker({
        dateFormat: 'dd-mm-yy',
        locale: "fr-FR",
        defaultDate:  null
    });


    //$(".datepicker").datepicker("setDate", startDate);
    //$(".datepicker.departure").datepicker("setDate", departure);

    $(document).on('change', '.datepicker.arrival', function( e ){
        e.preventDefault();
        var date = $(this).val();
        /*
        var d = new Date(date);
        var currMonth = d.getMonth();
        var currYear = d.getFullYear();
        var currNextDay = d.getDate()+1;
        departure = new Date(currYear, currMonth , currNextDay );
         */
        var words = date.split('-');
        var currMonth = words[1];
        var currYear = words[2];
        var currNextDay = words[0]++;
        currNextDay++;
        $(".datepicker.departure").datepicker("setDate", `${currNextDay}-${currMonth}-${currYear}`);
    });

})