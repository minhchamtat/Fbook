jQuery(document).ready(function() {
    var language = $('#m_header').data('language');
    var textConfirm = 'Are you sure?';
    var textAlert = 'You won\'t be able to revert this!';
    var textYes = 'Yes, delete it!';
    var textNo = 'No, cancel!';
    var textDeleted = 'Deleted';
    var textSuccess = 'Your file has been deleted.';
    var textCancel = 'Cancelled';
    var textSafe = 'Your file is safe';
    if (language == 'vi') {
        var textConfirm = 'Bạn có chắc chắn?';
        var textAlert = 'Sau khi xóa bạn không thể khôi phục lại nó';
        var textYes = 'Ok, Xóa!';
        var textNo = 'Không, hủy bỏ!';
        var textDeleted = 'Đã xóa';
        var textSuccess = 'Tệp của bạn đã xóa';
        var textCancel = 'Đã hủy';
        var textSafe = 'Tệp của bạn vẫn được an toàn';
    };
    $(document).on('click', '.btn-9', function(e) {
        e.preventDefault();
        var form = $(this).parents('form').attr('id');
        swal({
            title: textConfirm,
            text: textAlert,
            type: 'warning',
            showCancelButton: !0,
            confirmButtonText: textYes,
            cancelButtonText: textNo,
            reverseButtons: !0
        }).then(function(e) {
            e.value ? swal(textDeleted, textSuccess,
                document.getElementById(form).submit(), 'success') : 'cancel' === e.dismiss && swal(textCancel, textSafe, 'error')
        })
    })
});
