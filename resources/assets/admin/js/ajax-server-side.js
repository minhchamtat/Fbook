var DatatablesDataSourceAjaxServer = {
    init: function() {
        var csrfVar = $('meta[name="csrf-token"]').attr('content');
        var language = $('#m_header').data('language');
        var text = {'searchPlaceholder': 'Search records'};
        var textView = 'View';
        var textDel = 'Delete';
        var textEdit = 'Edit';
        if (language == 'vi') {
            text = {
                'sLengthMenu': 'Hiển thị _MENU_ bản ghi',
                'search': 'Tìm kiếm:',
                'zeroRecords': 'Không tìm thấy bản ghi nào',
                'info': 'Hiển thị _START_ tới _END_ của _TOTAL_ bản ghi',
                'infoEmpty': 'Không có bản ghi nào',
                'infoFiltered': '(Lọc từ _MAX_ tổng số bản ghi)',
                'searchPlaceholder': 'Tìm kiếm'
            };
            textView = 'Xem';
            textDel = 'Xóa';
            textEdit = 'Sửa';
        }

        $('table#m_table_1').DataTable({
            serverSide: true,
            ajax: {
                url: '/admin/listbook',
            },
            columns: [
                { data: 'title', name: 'title' },
                { data: 'author', name: 'author' },
                { data: 'publish_date', name: 'publish_date' },
                { data: 'total_pages', name: 'total_pages' },
                { data: 'avg_star', name: 'avg_star' },
                { data: 'count_viewed', name: 'count_viewed' },
                {
                    data: null,
                    name: 'id',
                    orderable: true,
                    searchable: false,
                    render: function (data, type, row) {
                        return '<a href="/admin/book/' + data.id + '/edit"' + ' class= "btn btn-info m-btn m-btn--custom btn-sm" title="' + textEdit + '"> <i class="fa fa-edit"></i></a>' +
                        '<form action= "/admin/book/' + data.id + '" ' + 'id ="' + data.id + '"' + 'method="post"' + 'class="form-delete"' + '>' +
                        '<input type="hidden" name="_method" value="delete" />' +
                        '<input name="_token" value="' + csrfVar + '"' + 'type="hidden"/>' +
                        '<button type = "submit" class="btn btn-danger m-btn m-btn--custom btn-9 btn-sm" title="' + textDel + '"><i class="fa fa-trash"></i></button>' +
                        '</form>' +
                        '<a href="/books/' + data.slug + '-' + data.id + '"' + 'class="btn btn-primary btn-sm" title="' + textView + '" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    },
                }
            ],
            order: [[ 6, 'desc' ]],
            language: text,
            fnDrawCallback: function(oSettings) {
                if ($('#m_table_1 tr').length < 11) {
                    $('#m_table_1_next').hide();
                    $('#m_table_1_last').hide();
                }
            }
        });
    }
};

jQuery(document).ready(function() {
    DatatablesDataSourceAjaxServer.init();

    $('th:last-child .sort').addClass('active');
    $('th').click(function() {
        $('.sort').removeClass('active');
        $(this).children().toggleClass('active');
    });
});
