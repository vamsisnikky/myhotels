$(document).ready(function() {
    $('#checkin').datepicker({
        changeMonth: true,
        changeYear: true,
        gotoCurrent: true,
        showAnim: "explode",
        duration: 500,
        yearRange: "1980:2014",
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        dateFormat: "yy-m-d",
        showOn: "button",
        buttonImage: "./assets/images/calndr.gif",
        buttonImageOnly: true
    });
    $('#checkout').datepicker({
        changeMonth: true,
        changeYear: true,
        gotoCurrent: true,
        showAnim: "explode",
        duration: 500,
        yearRange: "1980:2014",
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        dateFormat: "yy-m-d",
        showOn: "button",
        buttonImage: "./assets/images/calndr.gif",
        buttonImageOnly: true
    });
    
    
    $(".loginlink").fancybox({
        
    });
});