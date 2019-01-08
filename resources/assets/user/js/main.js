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
    var textMore = 'Show more';
    var textLess = 'Show less';
    var textSuccess = 'Success!';
    var textPhone = 'You enter a non-phone number!';
    var textRetype = 'Select ok to re-enter!';
    var textThank = 'Thank you!';
    var textReturn = 'Returning';
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
        textMore = 'Xem thêm';
        textLess = 'Ẩn bớt';
        textSuccess = 'Thành công!';
        textPhone = 'Bạn nhập không phải số điện thoại!';
        textRetype = 'Chọn ok để nhập lại!';
        textThank = 'Cảm ơn!';
        textReturn = 'Đang trả';
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

    $('.tab-author').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        margin: 30,
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
        margin: 30,
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


    var content = $('.more');
    var linkText = $('.more-link a').text();
    var text = content.html();

    if (text && text.length > 1000) {
        content.addClass('hideContent');
        $('.more').addClass('height');
        $('.more-link a').click(function(e) {
            e.preventDefault();
            $('.more').toggleClass('height');
            if (linkText === textMore) {
                linkText = textLess;
                content.addClass('showContent');
                content.removeClass('hideContent');

            } else {
                linkText = textMore;
                content.addClass('hideContent');
                content.removeClass('showContent');
            };
            $('.more-link a').text(linkText);
        });
    } else {
        $('.more-link a').text('');
    }

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
                    $('.btn-borrow').addClass('disabled');
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
                    $('.btn-borrow').removeClass('disabled');
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
            $('.btn-share').addClass('disabled');
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
                    $('.btn-share').removeClass('disabled');
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
        var status = $(e).attr('id');
        var query = $('#userId').val;
        if ($(e).attr('value') == 'true') {
            $.ajax({
                url: '/my-profile/' + status + '/' + $('#userId').val(),
                method:'POST',
            })
            .done(function(res) {
                $(e).attr('value', false);
                $(e).html(res);
                var star = $('.rating');
                star.each(function () {
                    var rating = $(this).data('rating');
                    $(this).barrating({
                        theme: 'fontawesome-stars-o',
                        initialRating: rating,
                        readonly: true,
                    });
                });
                $('.book-status#' + status + '0').show();
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
        if ($(this).find('.m-input').val() == '') {
            $('#search-suggest div').hide();
        } else {
            $.ajax({
                url: '/header-search',
                type: 'POST',
                data: req,
            })
            .done(function(res) {
                $('#search-suggest').html('');
                $('#search-suggest').append(res)
            })
        };
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
        var form = $(this).parents('form');
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
                form.submit();
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

    $(window).on('load', function(event) {
        $('#myModal').modal('show');
    });

    $('#modal_phone').on('click', function() {
        $.ajax({
            url: '/my-phone/' + $('#phone_value').val() + '/' + $('.message_pri:checked').val(),
            method: 'POST',
            success: function(res) {
                if (res.data == 1) {
                    swal(textSuccess, textThank, 'success');
                    $('#myModal').modal('toggle');
                } else {
                    swal({
                      title: textPhone,
                      text: textRetype,
                      icon: 'warning',
                      dangerMode: true,
                  });
                }
            }
        })
    });

    $(document).on('click', '.sharing-page .pagination a', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        getPosts(page);
    });

    function getPosts(page)
    {
        $.ajax({
            type: 'post',
            url: 'my-profile/' + $('#userId').val() + '/?page=' + page,
        })
        .success(function(data) {
            $('#sharing').html(data);
            var star = $('.rating');
            star.each(function () {
                var rating = $(this).data('rating');
                $(this).barrating({
                    theme: 'fontawesome-stars-o',
                    initialRating: rating,
                    readonly: true,
                });
            });
        });
    }
    $(document).on('submit', '#returning-book', function(e) {
        e.preventDefault();
        var obj = $('.btn-returning');
        var f = $(this);
        var id = f.attr('data-id');
        $.ajax({
            url: '/books/returning/' + id,
            type: f.attr('method'),
            data: f.serialize(),
        })
        .done(function(data) {
            obj.html(textReturn);
            obj.attr('href', '#');
            obj.removeClass().addClass('btn disabled');
            $('#returningModal').modal('hide');
            var book_id = $('.detail-tabs').attr('data-id');
            $.ajax({
                url: '/book-detail',
                type: 'POST',
                data: {
                    type: 'returning',
                    book_id: book_id
                },
            })
            .done(function(res) {
                $('#returning').attr('status', 'done');
                $('#returning').html(res);
                $('.book-status').hide();
                $('.book-status#' + 'returning' + '0').show();
            })
            .fail(function() {
                //
            });
            $('a[href="#returning"]').click();
        })
        .fail(function() {
            //
        });
    });

    function count(target, start, end, step, timeInterval) {
        var timer = setInterval(function() {
          if (start == end) {
            clearInterval(timer);

            return false;
          }
          start += step;
          target.html(start);
        }, timeInterval);
    }

    var totalUser = $('.total-user').data('user');
    var totalBook = $('.total-book').data('book');
    var totalReview = $('.total-review').data('review');

    count($('.total-user'), 1, totalUser, 1, 1);
    count($('.total-book'), 1, totalBook, 1, 1);
    count($('.total-review'), 1, totalReview, 1, 1);

})(jQuery);

    submitForms = function() {
        document.forms['header-search'].submit();

        return true;
    }
