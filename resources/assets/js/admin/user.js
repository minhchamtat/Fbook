$(document).ready(function(){
    $('.role-checkbox').on('click', function () {
        if ($('#role-hidden').val() == false) {
            $('#role-hidden').val(true);
        }
    });
});
