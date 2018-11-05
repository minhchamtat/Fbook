if (document.getElementsByClassName('notify')) {
    var msg = $('.notify').attr('data');
    if (msg != undefined) {
        $.notify({
            title: 'Success:',
            icon: null,
            message: msg
        });
    }
}
