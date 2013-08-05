$(document).ready(function() {
    
    function resizeScreenshot() {
        var screenshotWidth = $('.header-container .screenshot').width();
        var screenshotHeight = screenshotWidth / 1.255;
        $('.header-container .screenshot').height(screenshotHeight);
        
        if ($(window).width() >= 480) {
            $('.header-container .logo').height(screenshotHeight);
        }
        else {
            $('.header-container .logo').height(250);
        }
    }
    
    $('a.scroll').click(function(){
        var element = $(this).attr('href');
        var position = $(element).offset();
        $('body,html').animate({scrollTop: position.top}, 1000);
        return false; 
    });
    
    $('.mobile.menu a').click(function(){
        $('nav').toggle();
    });
    
    // IE 9 Hacks
    $('.lt-ie9 .logo h1 a').css( "background-size", "contain" );
    $('.lt-ie9 .screenshot').css( "background-size", "contain" );
    
    $(window).resize(function(){
        resizeScreenshot();
    });
    
    resizeScreenshot();
    
});