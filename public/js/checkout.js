
	Stripe.setPublishableKey('pk_test_Jc1ekwANOKNCtn9vZ840vsFF');

    jQuery(function($) {
      $('#checkout-form').submit(function(e) {
        var $form = $(this);

        // Disable the submit button to prevent repeated clicks
        $form.find('button').prop('disabled', true);
		Stripe.card.createToken({
		  number: $('#card-number').val(),
		  cvc: $('#card-cvc').val(),
		  exp_month: $('#card-expiry-month').val(),
		  exp_year: $('#card-expiry-year').val(),
		  name: $('#card-name').val()
		}, stripeResponseHandler);
		return false;
      });
    });
    function stripeResponseHandler(status, response) {
	  var $form = $('#checkout-form');

      if (response.error) {
		$('#charge-error').removeClass('hidden');
		$('#charge-error').text(response.error.message);
		$form.find('button').prop('disable', false);
      } else {
        // token contains id, last4, and card type
        var token = response.id;
        // Insert the token into the form so it gets submitted to the server
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        // and re-submit
        $form.get(0).submit();
      }
    };
