$(document).ready(function() {
    //Code for Checkin Checkout Datepicker
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
        buttonImage: "http://localhost/myhotels/assets/images/calndr.gif",
        buttonImageOnly: true,
        minDate: 0
    });
    $('#checkout').datepicker({
        minDate: 0,
        changeMonth: true,
        changeYear: true,
        gotoCurrent: true,
        showAnim: "explode",
        duration: 500,
        yearRange: "1980:2014",
        dayNamesMin: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
        dateFormat: "yy-m-d",
        showOn: "button",
        buttonImage: "http://localhost/myhotels/assets/images/calndr.gif",
        buttonImageOnly: true
    });

    $('#vDob').datepicker({
        changeMonth: true,
        changeYear: true,
        gotoCurrent: true,
        showAnim: "explode",
        duration: 500,
        yearRange: "1980:2013",
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
    //jQuery Validation
    $('#submit_form').on('click', function() {
        $('#signup').submit();
    });
    $('#signup').validate({
        rules: {
            vFirstName: 'required',
            vLastName: 'required',
            vAddress1: 'required',
            iCountryId: 'required',
            iStateId: 'required',
            iCityId: 'required',
            vPhone: {
                required: true,
                minlength: 10,
                maxlength: 10,
                digits: true
            },
            vEmail: {
                required: true,
                email: true
            },
            captcha: {
                required: true,
                equalTo: '#confirm_captcha'
            }
        },
        messages: {
            vFirstName: 'Please Enter Your First name',
            vLastName: 'Please Enter Your Last name',
            vAddress1: 'Please Enter Your Address',
            iCountryId: 'Please Select Your Country',
            iStateId: 'Please Select Your State/Province',
            iCityId: 'Please Select Your City',
            vPhone: {
                required: "Please Enter Mobile Number",
                minlength: "Please Enter 10 Digit Mobile Number",
                maxlength: "Please Enter 10 Digit Mobile Number",
                digits: "Please Enter Only Numbers"
            },
            vEmail: {
                required: 'Please Enter Your Email',
                email: 'Please Enter Valid Email'
            },
            captcha: {
                required: 'Please Enter captcha',
                equalTo: 'Invalid Captcha'
            }

        }
    });
    //code for refresh captcha

    $('#refresh_captcha').on('click', function() {
        $.ajax({
            url: "show_captcha",
            datatype: 'json',
            success: function(result) {
                var captcha = jQuery.parseJSON(result);
                $(".captcha_image").html(captcha.image);
                $('#confirm_captcha').attr('value', captcha.word);
            }
        });
    });
    //duplicate email checking 
    $('#vEmail').blur(function() {
        $vEmail = this.value;
        $.ajax({
            url: 'checkEmail',
            type: 'POST',
            data: {vEmail : $vEmail},
            success: function(data) {
                $('#vCheck_Email').html(data);
            }
        });
    });
});
//code for ajax country state city
function getState(countryId) {
    $.ajax({
        url: 'findState',
        type: 'GET',
        data: {country: countryId},
        success: function(data) {
            $('#iStateId').html(data);
        }
    });
}
function getCity(stateId) {
    $.ajax({
        url: 'findCity',
        type: 'GET',
        data: {state: stateId},
        success: function(data) {
            $('#iCityId').html(data);
        }
    });
}