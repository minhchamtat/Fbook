var DatatablesDataSourceAjaxServer = {
    init: function() {
        var csrfVar = $('meta[name="csrf-token"]').attr('content');
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
                    render: function ( data, type, row ) {
                        return '<a href="/admin/book/' + data.id + '/edit"' + ' class= "btn btn-info m-btn m-btn--custom btn-sm"> <i class="fa fa-edit"></i></a>' +
                        '<form action= "/admin/book/' + data.id + '" ' + 'id ="' + data.id + '"' + 'method="post"' + 'class="form-delete"' +'>' +
                        '<input type="hidden" name="_method" value="delete" />' +
                        '<input name="_token" value="' + csrfVar + '"' + 'type="hidden"/>' +
                        '<button type = "submit" class="btn btn-danger m-btn m-btn--custom btn-9 btn-sm"><i class="fa fa-trash"></i></button>' +
                        '</form>';
                    },
                }
            ],
            order: [[ 6, 'desc' ]]
        });
    }
};
    jQuery(document).ready(function() {
    DatatablesDataSourceAjaxServer.init();

    $('th:last-child .sort').addClass('active');
    $('th').click(function() {
        $('.sort').removeClass('active');
        $(this).children().toggleClass('active');
    })
});
