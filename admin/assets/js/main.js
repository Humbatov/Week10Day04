//Home section height resize from window height

$(document).ready(function() {
    var $winHeight = $(window).height();
    var $mainHeight = $("#home .main").height();
    var $homeHeight = $("#home").height();
    var $marginTop = ($winHeight - $mainHeight - 72) / 2
    if ($winHeight > 326) {
        $("#home .main").css({
            marginTop: $marginTop,
            marginBottom: $marginTop
        })
    }


    $(window).resize(function() {
        var $winHeight = $(window).height();
        var $mainHeight = $("#home .main").height();
        var $homeHeight = $("#home").height();
        var $marginTop = ($winHeight - $mainHeight - 72) / 2
        if ($winHeight > 326) {
            $("#home .main").css({
                marginTop: $marginTop,
                marginBottom: $marginTop
            })
        }
    });
});

// Navbar fixed script

$(document).ready(function() {
    $('body').scrollspy({


    })
    $('[data-spy="scroll"]').each(function() {
        var $spy = $(this).scrollspy('refresh')
    })

    $(window).scroll(function() {
        if ($(window).scrollTop() > 300) {
            $("nav").addClass('navbar-fixed-top')
                .css('background-color', '#fff')
                .css('box-shadow', '0 1px 5px 0 rgba(96, 96, 96, 0.3)');

            $(".navbar-nav li a").css({
                color: "black"
            })

            $(".navbar-right li:last-child() a").css({
                color: "#1ac6ff",
                fontWeight: "500"
            })

            $(".navbar-brand img").attr('src', 'assets/img/logo-inverted.png');


        } else {
            $("nav").removeClass('navbar-fixed-top')
                .removeAttr('style');
            $(".navbar-nav li a").removeAttr('style');
            $(".navbar-brand img").attr('src', 'assets/img/logo.png');
        }
    });
});

// Up button script

$(document).ready(function() {
    $(window).scroll(function() {
        if ($(window).scrollTop() < 300) {
            $(".upButton").css('opacity', '0');
        } else {
            $(".upButton").removeAttr('style');
        }
    });
    $(".upButton").on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000, "swing");
        return false;
    });

});
