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

}();

$( document ).ready(function() {
    $('#signup-form').submit(function(event) {
        var $form = $(this);

        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);

        Stripe.card.createToken({
            name: $('#card-name').val(),
            number: $('#card-number').val(),
            cvc: $('#card-cvv').val(),
            exp_month: $('#card-expiry-month').val(),
            exp_year: $('#card-expiry-year').val()}, stripeResponseHandler);

        // Prevent the form from submitting with the default action
        return false;
    });

});

function stripeResponseHandler(status, response) {
    var $form = $('#signup-form');

    if (response.error) {
        $('#payment-errors').text(response.error.message).show();
        $("html, body").animate({ scrollTop: 0 }, "slow");
        $form.find('button').prop('disabled', false);

    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}