if (document.getElementsByClassName('notify')) {
    var msg = $('.notify').attr('data');
    if (msg != undefined) {
        $.notify({
            title: '',
            icon: null,
            message: msg
        });
    }
}
