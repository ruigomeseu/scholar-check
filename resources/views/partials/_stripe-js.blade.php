<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
    Stripe.setPublishableKey('{{ env('STRIPE_PUBLISHABLE_KEY') }}');
</script>