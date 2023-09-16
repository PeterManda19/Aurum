$(function(){
    $(window).scroll(function(){
        if($(document).scrollTop() > 80 ){
            $('.head-menu').addClass('active');
        }else{
            $('.head-menu').removeClass('active');
        }
    });
})