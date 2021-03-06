(function($) {
    var evAgent = {};
    var _hScreen = $(window).height();
    var _hFooter = $(".footer-copyright").height();

    function eventGotoTopPage() {
        $(".top-page").bind('click', function() {
            $('html, body').animate({
                scrollTop : 0
            }, 500);
        });
    }

    function calcAdv() {
        var _height = $("#work-block .content-blo").height() - parseInt($(".advertiment-block").closest(".right-content").css("padding-top").replace("px", ""));
        $(".advertiment-block").css({
            "height" : _height  + "px"
        });
    }

    function setTopPage(currentTop) {
        if (currentTop > 0) {
            $(".top-page").addClass("show");
        } else {
            $(".top-page").removeClass("show");
        }
    }

    function setPosTopPage() {
        $(".top-page span").css({
            "bottom" : _hFooter+"px"
        });
    }
    function unsetPosTopPage() {
        $(".top-page span").removeAttr("style");
    }
    $("document").ready(function() {
        eventGotoTopPage();
    });

    $(window).resize(function() {
        _hScreen = $(window).height();
        _hFooter = $(".footer-copyright").height();
    });

    $(window).scroll(function() {
        var _pos = $(this).scrollTop();
        var _offsetFooter = $(".footer-copyright").offset().top;
        if (_pos > 100) {
            $(".top-page").addClass("show");
            if ( _pos >= (_offsetFooter - _hScreen) ) {
                setPosTopPage();
            } else {
                unsetPosTopPage();
            }
        } else {
            $(".top-page").removeClass("show");
        }
    });
    $(".top-page").on('click', function() {
        $('html, body').animate({scrollTop : 0 }, 500);
    });
    $(function(){
        $("#qtranslate-language-index-chooser, #qtranslate-language-sp-chooser").addClass("dropdown-menu");
    });
    
})(jQuery);