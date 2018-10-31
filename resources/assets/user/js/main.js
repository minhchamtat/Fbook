(function($) {
    "use strict";

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
    })

    $('.quickview-active').owlCarousel({
        loop: true,
        autoplay: false,
        autoplayTimeout: 5000,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        nav: true,
        item: 3,
        margin: 12,
    })

    var ProductDetailsSmall = $('.product-details-small a');
    ProductDetailsSmall.on('click', function(e) {
        e.preventDefault();
        var $href = $(this).attr('href');
        ProductDetailsSmall.removeClass('active');
        $(this).addClass('active');
        $('.product-details-large .tab-pane').removeClass('active');
        $('.product-details-large ' + $href).addClass('active');
    })

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
    })

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
    })

    $('.tab-active-3').owlCarousel({
        smartSpeed: 1000,
        nav: true,
        autoplay: true,
        loop: true,
        margin: 20,
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
                items: 4
            }
        }
    })

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
    })

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
    })

    $('.product-active-2').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
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
    })

    $('.product-active-3').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
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
                items: 2
            },
            992: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    })

    $('.testimonial-active').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
        nav: false,
        autoplay: true,
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
    })

    $('.deal-active').owlCarousel({
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
    })

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
    })

    $('.hot-sell-active').owlCarousel({
        smartSpeed: 1000,
        margin: 20,
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
            }
        }
    })

    $('.blog-slider-active').owlCarousel({
        smartSpeed: 1000,
        margin: 0,
        nav: false,
        autoplay: true,
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
    })

    $('.bg').parallax("50%", 0.1);

    $('.flexslider').flexslider({
        animation: "slide",
        controlNav: "thumbnails"
    });

    $('#showlogin').on('click', function() {
        $('#checkout-login').slideToggle(900);
    });

    $('#showcoupon').on('click', function() {
        $('#checkout_coupon').slideToggle(900);
    });

    $('#cbox').on('click', function() {
        $('#cbox_info').slideToggle(900);
    });

    $('#ship-box').on('click', function() {
        $('#ship-box-info').slideToggle(1000);
    });

    $('#showcat').on('click', function() {
        $('#hidecat').slideToggle(900);
    });

    $('.rx-parent').on('click', function() {
        $('.rx-child').slideToggle();
        $(this).toggleClass('rx-change');
    });

    $('[data-countdown]').each(function() {
        var $this = $(this),
            finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
            $this.html(event.strftime('<div class="cdown days"><span class="counting counting-2">%-D</span>days</div><div class="cdown hours"><span class="counting counting-2">%-H</span>hrs</div><div class="cdown minutes"><span class="counting counting-2">%M</span>mins</div><div class="cdown seconds"><span class="counting">%S</span>secs</div>'));
        });
    });

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    $('#cate-toggle li.has-sub>a').on('click', function() {
        $(this).removeAttr('href');
        var element = $(this).parent('li');
        if (element.hasClass('open')) {
            element.removeClass('open');
            element.find('li').removeClass('open');
            element.find('ul').slideUp();
        } else {
            element.addClass('open');
            element.children('ul').slideDown();
            element.siblings('li').children('ul').slideUp();
            element.siblings('li').removeClass('open');
            element.siblings('li').find('li').removeClass('open');
            element.siblings('li').find('ul').slideUp();
        }
    });
    $('#cate-toggle>ul>li.has-sub>a').append('<span class="holder"></span>');

    $.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

    if ($(window).width() < 768) {
        function sidemenuDropdown() {
            var $this = $('.category-menu');
            $this.find('nav.menu .cr-dropdown').find('.left-menu').css('display', 'none');
            $this.find('nav.menu .cr-dropdown ul').slideUp();
            $this.find('nav.menu .cr-dropdown a').on('click', function(e) {
                e.preventDefault();
                $(this).parent('.cr-dropdown').children('ul').slideToggle();
            });
            $this.find('nav.menu .cr-dropdown ul .cr-sub-dropdown ul').css('display', 'none');
            $this.find('nav.menu .cr-dropdown ul .cr-sub-dropdown a').on('click', function(e) {
                e.preventDefault();
                $(this).parent('.cr-sub-dropdown').children('ul').slideToggle();
            });
        }
        sidemenuDropdown();
    }

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
            title: 'Are you sure you want to share this book?',
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
                    var form = '<div class="col-xs-12 col-sm-12" id="owner' + res.id + '">';
                    form += '<input name="owner_id" type="radio" value="' + res.id + '">' + res.name;
                    form += '</div>';
                    $('.owner-input').append(form);
                    obj.html('Remove Owner');
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
            title: 'Are you sure you want to remove?',
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
                    $('#owner' + auth).remove();
                    obj.html('I have this book');
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
            obj.html('Cancel Borrowing');
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
            title: 'Are you sure you want to cancel?',
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
                    obj.html('Borrow Book');
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
            obj.html('Following');
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
            obj.html('Follow');
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
})(jQuery);

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
        title: 'You need login to review!',
        content: el,
        className: 'review',
    });
})

$(document).on('click', '.notify', function(e) {
    e.preventDefault();
    var form = $(this).parents('form').attr('id');
    swal({
        title: 'Are you sure?',
        text: 'Once deleted, you will not be able to recover!',
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
});
