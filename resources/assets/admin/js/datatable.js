var DatatablesBasicPaginations = {
    init: function() {
        $('#m_table_1').DataTable({
            responsive: !0,
            pagingType: 'full_numbers',
            order: [
                [0, 'desc']
            ],
            columnDefs: [{
                targets: 3,
                title: 'Action <span class="sort"> <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i></span>',
                orderable: 1,
            }, {
                targets: 1,
                title: 'Name <span class="sort"> <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i></span>',
                orderable: 1,
            }, {
                targets: 2,
                title: 'Description <span class="sort"> <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i></span>',
                orderable: 1,
            }, {
                targets: 0,
                title: 'Index <span class="sort"> <i class="fa fa-long-arrow-alt-up"></i><i class="fa fa-long-arrow-alt-down"></i></span>',
                orderable: 1,
                order: [['']]
            }]
        })
    }
};
jQuery(document).ready(function() {
    DatatablesBasicPaginations.init();

    $('th:first-child .sort').addClass('active');
    $('th').click(function() {
        $('.sort').removeClass('active');
        $(this).children().toggleClass('active');
    })
});
