(function($) {
    "use strict";
    var language = $('header').data('language');
    var textShare = 'Are you sure you want to share this book?';
    var textLogin = 'You need login to action';
    var textRemove = 'Are you sure you want to remove?';
    var textCancel = 'Cancel Borrowing';
    var textCancelAlert = 'Are you sure you want to cancel?';
    var textBorrow = 'Borrow Book';
    var textConfirm = 'Are you sure?';
    var textDeleted = 'Once deleted, you will not be able to recover!';
    var textRemoveOwner = 'Remove Owner';
    var textBook = 'I have this book';
    var textFollowing = 'Following';
    var textFollow = 'Follow';
    if (language == 'vi') {
        textShare = 'Bạn có chắc chắn muốn chia sẻ cuốn sách này?';
        textLogin = 'Bạn cần đăng nhập để tiếp tục';
        textRemove = 'Bạn có chắc chắn muốn xóa?';
        textCancel = 'Hủy mượn';
        textCancelAlert = 'Bạn có chắc chắn muốn hủy mượn?';
        textBorrow = 'Mượn sách';
        textConfirm = 'Bạn có chắc chắn?';
        textDeleted = 'Một khi đã xóa bạn không thể khôi phục lại!';
        textRemoveOwner = 'Dừng chia sẻ';
        textBook = 'Tôi có cuốn sách này';
        textFollowing = 'Đang theo dõi';
        textFollow = 'Theo dõi';
    }
    var header = $('#header-sticky');
    var win = $(window);

    win.on('scroll', function() {
        if ($(this).scrollTop() > 120) {
            header.addClass("sticky");
        } else {
            header.removeClass("sticky");
        }
    });

    jQuery('#mobile-menu-active').meanmenu();

    new WOW().init();

    $('.slider-active').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
        autoplay: false,
        nav: true,
        dots: true,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.tab-active').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        margin: 20,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1170: {
                items: 4
            },
            1300: {
                items: 5
            }
        }
    });

    $('.tab-active-2').owlCarousel({
        smartSpeed: 1000,
        nav: false,
        autoplay: true,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            1000: {
                items: 3
            },
            1170: {
                items: 3
            },
            1300: {
                items: 4
            }
        }
    });

    $('.post-active').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        autoplay: false,
        dots: false,
        items: 3,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1170: {
                items: 3
            },
            1300: {
                items: 3
            }
        }
    });

    $('.bestseller-active').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
        nav: true,
        autoplay: false,
        dots: false,
        margin: 20,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            480: {
                items: 2
            },
            768: {
                items: 2
            },
            1000: {
                items: 2
            }
        }
    });

    $('.product-active-2').owlCarousel({
        smartSpeed: 1000,
        margin: 30,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 3
            },
            1000: {
                items: 3
            }
        }
    });

    $('.product-active').owlCarousel({
        smartSpeed: 1000,
        margin: 30,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.post-active-2').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
        nav: false,
        autoplay: false,
        dots: false,
        loop: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            768: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });

    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    $('.more').each(function() {
        var moretext = 'Show more >';
        var lesstext = ' Show less';
        var showChar = 500;
        var ellipsestext = '...';
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span class="contentellipses">' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
            $(this).html(html);
        }

    });

    $('.morelink').click(function(){
        if($(this).hasClass('less')) {
            $(this).removeClass('less');
            $('.contentellipses').hide();
            $('.moreellipses').show();
            $(this).html('Show more >');
        } else {
            $(this).addClass('less');
            $('.moreellipses').hide();
            $('.contentellipses').show();
            $(this).html('< Show less');
        }
        return false;
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $(document).on('click', '.btn-share', function() {
        var obj = $(this);
        swal({
            title: textShare,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((share) => {
            if (share) {
                var id = obj.attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '/books/sharing/' + id,
                    data: { id: id },
                })
                .done(function(res) {
                    var html = '<div class="reviews-actions" id="user-' + res.id + '">';
                    html += '<a href="/users/' + res.id + '" title="' + res.name + '">';
                    html += '<img src="' + res.avatar + '" class="mg-thumbnail avatar-icon"></a></div>';
                    $('.owner-list').append(html);
                    obj.html(textRemoveOwner);
                    obj.removeClass('btn-share').addClass('btn-remove-owner');
                })
                .fail(function() {
                    //
                });
            }
        });
    });

    $(document).on('click', '.btn-remove-owner', function() {
        var obj = $(this);
        swal({
            title: textRemove,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((share) => {
            if (share) {
                var id = obj.attr('data-id');
                var auth = obj.attr('owner');
                $.ajax({
                    type: 'POST',
                    url: '/books/remove-owner/' + id,
                    data: { id: id },
                })
                .done(function(res) {
                    $('#user-' + res).remove();
                    obj.html(textBook);
                    obj.removeClass().addClass('btn-share');
                })
                .fail(function() {
                    //
                });
            }
        });
    });

    $(document).on('click', '.btn-borrow', function() {
        $('#borrowingModal').modal('show');
    });

    $(document).on('submit', '#borrowingForm', function(e) {
        e.preventDefault();
        var obj = $('.btn-borrow');
        var f = $(this);
        var id = f.attr('data-id');
        $.ajax({
            url: '/books/borrowing/' + id,
            type: f.attr('method'),
            data: f.serialize(),
        })
        .done(function(data) {
            obj.html(textCancel);
            obj.attr('href', '#');
            obj.removeClass().addClass('btn-cancel-borrowing');
            $('#borrowingModal').modal('hide');
            var book_id = $('.detail-tabs').attr('data-id');
            $.ajax({
                url: '/book-detail',
                type: 'POST',
                data: {
                    type: 'waiting',
                    book_id: book_id
                },
            })
            .done(function(res) {
                $('#waiting').attr('status', 'done');
                $('#waiting').html(res);
                $('.book-status').hide();
                $('.book-status#' + 'waiting' + '0').show();
            })
            .fail(function() {
                //
            });
            $('a[href="#waiting"]').click();
        })
        .fail(function() {
            //
        });
    });

    $(document).on('click', '.btn-cancel-borrowing', function() {
        var obj = $(this);
        swal({
            title: textCancelAlert,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((share) => {
            if (share) {
                var id = obj.attr('data-id');
                $.ajax({
                    type: 'POST',
                    url: '/books/cancelBorrowing/' + id,
                    data: { id: id },
                })
                .done(function(res) {
                    obj.html(textBorrow);
                    obj.attr('href', '#modalBorrowing');
                    obj.removeClass().addClass('btn-borrow');
                    var book_id = $('.detail-tabs').attr('data-id');
                    $.ajax({
                        url: '/book-detail',
                        type: 'POST',
                        data: {
                            type: 'waiting',
                            book_id: book_id
                        },
                    })
                    .done(function(res) {
                        $('#waiting').attr('status', 'done');
                        $('#waiting').html(res);
                        $('.book-status').hide();
                        $('.book-status#' + 'waiting' + '0').show();
                    })
                    .fail(function() {
                        //
                    });
                    $('a[href="#waiting"]').click();
                })
                .fail(function() {
                    //
                });
            }
        });
    });

    $('.book-status').hide();

    $('.book-status#sharing0').show();
    $('.book-status#follower0').show();
    $('.book-status#following0').show();

    $('.status-tabs a').on('shown.bs.tab', function(event){
        var e = $(event.target).attr('href');
        var id = $(e).attr('id');
        if ($(e).attr('value') == 'true') {
            $.ajax({
                url: '/my-profile/' + id,
                type: 'POST',
            })
            .done(function(res) {
                $(e).attr('value', false);
                $(e).html(res);
                console.log(123);
                var star = $('.rating');
                star.each(function () {
                    var rating = $(this).data('rating');
                    $(this).barrating({
                        theme: 'fontawesome-stars-o',
                        initialRating: rating,
                        readonly: true,
                    });
               });
                $('.book-status#' + id + '0').show();
            })
            .fail(function() {
                //
            });
        }
    });

    $(document).on('click', '.status-page a', function(e) {
        $('.' + $(this).attr('data-target')).hide();
        $('.book-status' + $(this).attr('href')).show();
    });

    $('#header-search').on('keyup', function() {
        var req = $(this).serialize();
        $.ajax({
            url: '/header-search',
            type: 'POST',
            data: req,
        })
        .done(function(res) {
            $('#search-suggest').html('');
            $('#search-suggest').append(res)
        })
        .fail(function() {
            //
        });

    });

    $('body').click(function () {
        $('#search-suggest div').hide();
        if ($('#noti-detail div').hasClass('suggestion') && !$('#bell-notification').hasClass('noti-show')) {
            $('#noti-detail').html('');
            $('#bell-notification').addClass('noti-show');
        }
    });

    $(document).on('click', '.follow', function(event) {
        event.preventDefault();
        var obj = $(this);
        var id = obj.attr('data-id');
        $.ajax({
            url: '/follow/' + id,
            type: 'POST',
        })
        .done(function() {
            obj.html(textFollowing);
            obj.removeClass('follow').addClass('following');
        })
        .fail(function() {
            //
        });
    });

    $(document).on('click', '.following', function(event) {
        event.preventDefault();
        var obj = $(this);
        var id = obj.attr('data-id');
        $.ajax({
            url: '/unfollow/' + id,
            type: 'POST',
        })
        .done(function() {
            obj.html(textFollow);
            obj.removeClass('following').addClass('follow');
        })
        .fail(function() {
            //
        });
    });

    $(document).on('shown.bs.tab', '.detail-tabs a', function(event){
        var e = $(event.target).attr('href');
        var type = $(e).attr('id');
        var book_id = $('.detail-tabs').attr('data-id');
        if ($(e).attr('status') == 'none') {
            $.ajax({
                url: '/book-detail',
                type: 'POST',
                data: {
                    type: type,
                    book_id: book_id
                },
            })
            .done(function(res) {
                $(e).attr('status', 'done');
                $(e).html(res);
                $('.book-status').hide();
                $('.book-status#' + type + '0').show();
            })
            .fail(function() {
                //
            });
        }
        $('.book-status#' + type + '0').show();
    });

    $('#bell-notification').on('click', function(event) {
        if ($(this).hasClass('noti-show')) {
            var limit = $(this).attr('data');
            $.ajax({
                url: '/notifications/' + limit,
                type: 'POST',
            })
            .done(function(res) {
                $('#noti-detail').html('');
                $('#noti-detail').append(res);
                $('#bell-notification').removeClass('noti-show');
            })
            .fail(function() {
                //
            });
        } else {
            $('#noti-detail').html('');
            $(this).addClass('noti-show');
        }
    });

    $(document).on('click', '.new a', function(event) {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/notification-update',
            type: 'POST',
            data: {
                id: id,
                viewed: 1
            },
        })
        .done(function(res) {
            //
        })
        .fail(function() {
            //
        });
    });


$(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if( input.length ) {
            input.val(log);
        } else {
            if( log ) alert(log);
        }
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function(){
        readURL(this);
    });

    $(document).on('click', '.login', function(e) {
        e.preventDefault();
        var el = document.createElement("a");
        el.href = '/login/framgia';
        el.class = 'btn btn-info';
        el.innerText = 'Login WSM';
        swal({
            title: textLogin,
            content: el,
            className: 'review',
        });
    })

    $(document).on('click', '.notify', function(e) {
        e.preventDefault();
        var form = $(this).parents('form').attr('id');
        swal({
            title: textConfirm,
            text: textDeleted,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal('Success!', {
                    icon: 'success',
                });
                document.getElementById(form).submit();
            }
        });
    })

    $(document).on('click', '.notify-2', function(e) {
        e.preventDefault();
        var form = $(this).parents('form').attr('id');
        swal({
            title: textConfirm,
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                swal('Success!', {
                    icon: 'success',
                });
                document.getElementById(form).submit();
            }
        });
    })

    $('#review').click(function (e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: $('#reviews').offset().top - 180
        }, 1000);
    })

    $(function() {
        var star = $('.rating');
        star.each(function () {
            var rating = $(this).data('rating');
            $(this).barrating({
                theme: 'fontawesome-stars-o',
                initialRating: rating,
                readonly: true,
            });
       });

       var url = window.location.href;
       var arr = parseInt(url.split('=')[1]);
       if (arr > 0) {
           $('html, body').animate({
               scrollTop: $('#reviews').offset().top - 180
           }, 1000);
       }
    });

})(jQuery);
