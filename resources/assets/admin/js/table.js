var DatatablesBasicPaginations = {
    init: function() {
        var language = $('#m_header').data('language');
        var text = {'searchPlaceholder': 'Search records'};
        if (language == 'vi') {
            text = {
                'sLengthMenu': 'Hiển thị _MENU_ bản ghi',
                'search': 'Tìm kiếm:',
                'zeroRecords': 'Không tìm thấy bản ghi nào',
                'info': 'Hiển thị _START_ tới _END_ của _TOTAL_ bản ghi',
                'infoEmpty': 'Không có bản ghi nào',
                'infoFiltered': '(Lọc từ _MAX_ tổng số bản ghi)',
                'searchPlaceholder': 'Tìm kiếm'
            }
        }

        $('#m_table_1').DataTable({
            responsive: !0,
            pagingType: 'full_numbers',
            order: [
                [0, 'desc']
            ],
            language: text,
        })
    }
};
jQuery(document).ready(function() {
    DatatablesBasicPaginations.init();

    $('th:first-child .sort').addClass('active');
    $('th').click(function() {
        $('.sort').removeClass('active');
        $(this).children().toggleClass('active');
    });
});
