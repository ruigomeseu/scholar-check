$( document ).ready(function() {

    $("#generate-api-key").click(function () {
        var $button = $(this);
        $button.prop('disabled', true);
        $button.prepend('<i class="fa fa-spin fa-spinner">');


        $.ajax({
            url: generateApiKeyUrl,
            type: 'POST',
            data: {},
            context: this,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
            },
            success: function (result) {
                $("#no-keys-warning").hide(300);
                $button.prop('disabled', false);
                $button.text('Generate API Key');
                $('#api-keys-table tr:last').after('<tr><td>' + result.key + '</td><td>' + result.buttonHtml + '</td></tr>');
            }
        });

    });

    $(document).on( 'click', '.toggle-api-key-status', function() {
        var $button = $(this);
        $button.prop('disabled', true);
        $button.prepend('<i class="fa fa-spin fa-spinner">');

        $.ajax({
            url: toggleApiKeyUrl,
            type: 'POST',
            data: {
                apiKeyId: $button.data('key-id')
            },
            context: this,
            beforeSend: function (xhr) {
                xhr.setRequestHeader('X-CSRF-Token', $('meta[name="csrf-token"]').attr('content'))
            },
            success: function (result) {
                $button.prop('disabled', false);
                $button.replaceWith(result.buttonHtml);
            }
        });

    });

});