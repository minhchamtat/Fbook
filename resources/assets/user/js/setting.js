(function($) {
    'use strict';
    var language = $('header').data('language');
    var textSuccess = 'Success!';
    var textThank = 'Thank you!';
    var textError = 'Error!';
    if (language == 'vi') {
        textSuccess = 'Thành công!';
        textThank = 'Cảm ơn!';
        textError = 'Lỗi!';
    }
$('#save-setting').on('click', function() {
    var phone = 0;
    if (($('#phone_setting').val()) == '') {
        $.ajax({
            url: '/settings/' + phone + '/' + $('.setting-phone:checked').val(),
            method: 'POST',
            success: function(res) {
                if (res.data == 0) {
                    $('.success-phone').fadeIn();
                    $('.success-phone').html('<p id="success">' + textSuccess + '</p>');
                } else {
                    $('.success-phone').fadeIn();
                    $('.success-phone').html('<p id="error-phone">' + textError + '</p>');
                }
            }
        })
    } else {
        $.ajax({
            url: '/settings/' + $('#phone_setting').val() + '/' + $('.setting-phone:checked').val(),
            method: 'POST',
            success: function(res) {
                if (res.data == 0) {
                    $('.success-phone').fadeIn();
                    $('.success-phone').html('<p id="success">' + textSuccess + '</p>');
                } else {
                    $('.success-phone').fadeIn();
                    $('.success-phone').html('<p id="error-phone">' + textError + '</p>');
                }
            }
        })
    }
    
});

$('#add-phones').on('click', function() {
    if (($('#phone_values').val()) == '') {
        $('.error-phone').html('<p>' + textError + '</p>');
    } else {
        $.ajax({
            url: '/setting-phone/' + $('#phone_values').val() + '/' + $('.setting-phones:checked').val(),
            method: 'POST',
            success: function(res) {
                if (res.data == 0) {
                    $('.error-phone').fadeIn();
                    $('.error-phone').html('<p>' + textError + '</p>');
                } else {
                    $('#phone-check').html(res);
                }
            }
        })
    }
});

$('#displays').on('click', function(){
    document.getElementById('phone_setting').style.display = 'block';
    document.getElementById('displays').style.display = 'none';
});

})(jQuery);
