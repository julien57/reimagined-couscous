$(function(){
/*
    $('.link-to a._context').mouseover( function( e){
        e.preventDefault();

        var parent =  $(this).closest('footer');
        $(parent).animate({'margin-left': '20px'}, 100, function(){
            //$(this).animate({'margin-left': '50px'}, 10000);
        });

        $(this).mouseleave(function( ){
            $(parent).animate( {'margin-left': '0px'},1000);
        });

        $('.link-to-fixed a').css('display', 'flex');
    });
*/
});

//open mobile menu
$(document).ready(function(){
	$('#nav-icon').click(function(){
		$(this).toggleClass('open');
        $('.mainMenu').toggleClass('open');
        $('#sub_menu_lunch_fixed').toggleClass('no-mobile');
	});
});

// display sublinks
$(document).on('click','.link-menu-mobile',function( e ){
    e.preventDefault();
    if( $(this).parent('li').find('.submenu-mobile').is(':visible')){
        $(this).parent('li').find('.submenu-mobile').slideUp('slow');
    }else{
        $('.submenu-mobile').each(function(){
            $(this).slideUp('slow');
        });
    
        $(this).parent('li').find('.submenu-mobile').slideDown('slow');
    }
   
});

$('#btnPromoCode').click(function () {
    $('.promo-code').toggle();
});

// get locale
function getLocale1(select) {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ; 
    var pathArray = window.location.pathname.split('/');
    let language = select.value;

    if(pathArray[3] != null) {
        window.location.replace(baseUrl+language+"/"+pathArray[2]+"/"+pathArray[3]);
    }
    else if(pathArray[2] != null) {
        window.location.replace(baseUrl+language+"/"+pathArray[2]);
    }
    else {
        window.location.replace(baseUrl+language);
    }
}

function getLocale2() {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ; 
    var pathArray = window.location.pathname.split('/');
    language = document.getElementById('lang2').value;

    if(pathArray[3] != null) {
        window.location.replace(baseUrl+language+"/"+pathArray[2]+"/"+pathArray[3]);
    }
    else if(pathArray[2] != null) {
        window.location.replace(baseUrl+language+"/"+pathArray[2]);
    }
    else {
        window.location.replace(baseUrl+language);
    }
}

function getLocale3() {
    var getUrl = window.location;
    var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" ; 
    var pathArray = window.location.pathname.split('/');
    language = document.getElementById('lang3').value;

    if(pathArray[4] != null) {
        //window.location.replace(baseUrl+language+"/"+pathArray[2]+"/"+pathArray[3]+"/"+pathArray[4]);
    }
    else if(pathArray[3] != null) {
        //window.location.replace(baseUrl+language+"/"+pathArray[2]+"/"+pathArray[3]);
    }
    else {
       // window.location.replace(baseUrl+language);
    }
}