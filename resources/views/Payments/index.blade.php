<head>
    <meta charset="utf-8">
    <script src="https://js.braintreegateway.com/web/dropin/1.27.0/js/dropin.min.js"></script>
  </head>
  <body>
      <div class="payment-container">
        <form id="payment-form" action="{{route('payment.process')}}" method="post">
            @csrf
            @method('POST')

          <input type="hidden" value="{{$sponsor['price']}}" name="price">
          <input type="hidden" value="{{$sponsor['time']}}" name="time">
          <input type="hidden" value="{{$sponsor['title']}}" name="title">
          <input type="hidden" value="{{$sponsor['apartment_id']}}" name="apartment_id">
          <!-- Putting the empty container you plan to pass to
            `braintree.dropin.create` inside a form will make layout and flow
            easier to manage -->
          <div id="dropin-container"></div>
          <input type="submit" />
          <input type="hidden" id="nonce" name="payment_method_nonce"/>
        </form>
      </div>


    <script type="text/javascript">
      const form = document.getElementById('payment-form');

braintree.dropin.create({
  authorization: 'sandbox_fwbd7rc6_knftf637d9m5gckk',
  container: '#dropin-container'
}, (error, dropinInstance) => {
  if (error) console.error(error);

  form.addEventListener('submit', event => {
    event.preventDefault();

    dropinInstance.requestPaymentMethod((error, payload) => {
      if (error) console.error(error);

      // Step four: when the user is ready to complete their
      //   transaction, use the dropinInstance to get a payment
      //   method nonce for the user's selected payment method, then add
      //   it a the hidden field before submitting the complete form to
      //   a server-side integration
      document.getElementById('nonce').value = payload.nonce;
      form.submit();
    });
  });
});
    </script>
  </body>
