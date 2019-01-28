$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#text-footer').on('click', function() {
    var value = $('#message').val();
    if (($('#message').val()) == '') {
        $('#message').addClass('border-danger');
    } else {
        $('#message').removeClass('border-danger');
        $.ajax({
            url: '/admin/setting/text',
            method: 'POST',
            data: {
                value: value
            },
            success: function(res) {
                $('#text-setting').html('<p id="text-setting">' + res + '</p>');
                $('#myModalText').modal('toggle');
            }
        })
    }
});

function changeImg(input){ 
    var idImg = $(input).attr('values');
    if(input.files && input.files[0]){
        var reader = new FileReader();
        reader.onload = function(e){
            $('#img-banners' + idImg).attr('src',e.target.result);
            var form = $('#uploatImg' + idImg)[0];
            var formData = new FormData(form);
            $.ajax({
                url: '/admin/setting/img',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
            })
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function editTextBanner(button){
    var id = $(button).attr('value');
    var value = $('#message-banner' + id).val();
    if (value == '') {
        $( '#message-banner' + id ).addClass('border-danger');
    } else {
        $( '#message-banner' + id ).removeClass('border-danger');
        $.ajax({
            url: '/admin/setting/text/banner/',
            method: 'POST',
            data: {
                id:id,
                value:value
            },
            success: function(res) {
                $('#text-banner' + id).html('<p>' + res + '</p>');
                $('#myModalText' + id).modal('toggle');
            }
        })
    }
}

$(document).ready(function() {
    $('.avatar0, .avatar1, .avatar').click(function(){
        var idImg = $(this).attr('values');
        $('#banner' + idImg).click();
    });
});

$('#text-app').on('click', function() {
    if (($('#name-app').val()) == '') {
        $('#name-app').addClass('border-danger');
    } else if (($('#avatar-apps').val()) == '') {
        $('#avatar-apps').addClass('text-danger');
    } else {
        $( '#name-app').removeClass('border-danger');
        $('#avatar-apps').removeClass('text-danger');
        var form = $('#addApp')[0];
        var formData = new FormData(form);
        $.ajax({
            url: '/admin/setting/app/',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                window.location.reload();
            }
        })
    }
});

function editApp(button){
    var id = $(button).attr('value');
    var value = $('#message-banner' + id).val();
    if (value == '') {
        $('#message-banner' + id).addClass('border-danger');
    } else {
        $('#message-banner' + id).removeClass('border-danger');
        var form = $('#addApp' + id)[0];
        var formData = new FormData(form);
        $.ajax({
            url: '/admin/setting/app/',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(res) {
                $('#ajax-app').html(res);
                $('#myModalApps' + id).modal('toggle');
            }
        })
    }
}

setTimeout(function() {
    $('#alert-app').fadeOut('slow');
}, 3000); 
