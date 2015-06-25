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

 function getQueryString () {
    // This function is anonymous, is executed immediately and
    // the return value is assigned to QueryString!
    var query_string = {};
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = pair[1];
            // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [ query_string[pair[0]], pair[1] ];
            query_string[pair[0]] = arr;
            // If third or later entry with this name
        } else {
            query_string[pair[0]].push(pair[1]);
        }
    }
    return query_string;
};

$( document ).ready(function() {
    $('#coupon').on('blur', function(event) {
       if($(this).val() == "PRODUCTHUNT3") {
           $('#trial-info').text("Your credit card won't be billed for 3 months. Your subscription can be canceled at any time.");
           $('#valid-coupon').show().fade(500);
       } else {
           $('#trial-info').text("Your credit card won't be billed until the 7-day trial ends. Your subscription can be canceled at any time.");
           $('#valid-coupon').hide().fade(500);
       }
    });

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
        var QueryString = getQueryString();
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        if(QueryString.coupon)
        {
            $form.append($('<input type="hidden" name="coupon" />').val(QueryString.coupon));
        }
        $form.get(0).submit();
    }
}