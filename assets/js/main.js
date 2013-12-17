$(document).ready(function() {
    //Code for Checkin Checkout Datepicker
    $('#checkin').datepicker({
        changeMonth: true,
        changeYear: true,
        gotoCurrent: true,
        showAnim: "explode",
        duration: 500,
        yearRange: "1980:2015",
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        dateFormat: "yy-m-d",
        showOn: "button",
        buttonImage: "http://localhost/myhotels/assets/images/calndr.gif",
        buttonImageOnly: true
    });
    $('#checkout').datepicker({
        changeMonth: true,
        changeYear: true,
        gotoCurrent: true,
        showAnim: "explode",
        duration: 500,
        yearRange: "1980:2015",
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        dateFormat: "yy-m-d",
        showOn: "button",
        buttonImage: "http://localhost/myhotels/assets/images/calndr.gif",
        buttonImageOnly: true
    });
    
    //Code for login & forgot password Fancy box
    $(".loginlink").fancybox();
    //Code for maplinks Fancy box
         $(".various").fancybox({
        helpers: {
            overlay: {
                css: {
                    'background': 'rgba(58, 42, 45, 0.95)',
                }
            }
        },
        maxWidth: 1000,
        maxHeight: 800,
        fitToView: false,
        width: '80%',
        height: '70%',
        autoSize: false,
        closeClick: false,
        openEffect: 'fade',
        closeEffect: 'fade',
        scrolling: 'auto',
        preload: true,  
    });
    //Code for Elastislide Carousel
    $('#carousel').elastislide();

});