$(document).on('ready', function () {
    $('.js-navbar-vertical-aside-toggle-invoker').click(function () {
        $('.js-navbar-vertical-aside-toggle-invoker i').tooltip('hide');
    });
    var sidebar = $('.js-navbar-vertical-aside').hsSideNav();
    $('.js-nav-tooltip-link').tooltip({
        boundary: 'window'
    })

    $(".js-nav-tooltip-link").on("show.bs.tooltip", function (e) {
        if (!$("body").hasClass("navbar-vertical-aside-mini-mode")) {
            return false;
        }
    });
    $('.js-hs-unfold-invoker').each(function () {
        var unfold = new HSUnfold($(this)).init();
    });
    $('.js-select2-custom').each(function () {
        var select2 = $.HSCore.components.HSSelect2.init($(this));
    });
});
