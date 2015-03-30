var app = function() {

    $(function() {
        navToggleLeft();
        navToggleSub();
        navActiveMenu();
    });

    var navToggleLeft = function() {
        $('#toggle-left').on('click', function() {
            var bodyEl = $('#main-wrapper');
            ($(window).width() > 767) ? $(bodyEl).toggleClass('sidebar-mini'): $(bodyEl).toggleClass('sidebar-opened');
        });
    };

    var navToggleSub = function() {
        var subMenu = $('.sidebar .nav');
        $(subMenu).navgoco({
            caretHtml: false,
            accordion: true
        });

    };

    var navActiveMenu = function() {
        var url = window.location.href;

        $('.nav a').filter(function() {
            return this.href == url;
        }).parents('li').last().addClass('active');
    };

    //return functions
    return {

    };
}();