<!-- resources/views/checkout.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
</head>
<body>
<h1>Checkout Page</h1>

<form action="/checkout" method="post" id="payment-form">
    @csrf
    <label for="amount">Pret : </label>
    <input type="text" name="amount" id="amount" required>
    <br>
    <button type="submit">Plateste</button>
</form>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('pk_test_51OD32iKjIiD2k8z7LT4jjx2MSp6GFfOChdYy8UswZIDJPPZHjxy3ZlAklr2rSwFCYxBEDc0WON67LPsFqx246OUG00Uhe3Aome');
    var elements = stripe.elements();

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createPaymentMethod({
            type: 'card',
            card: elements.create('card'),
        }).then(function(result) {
            if (result.error) {
                // Handle errors here
            } else {
                // Send result.paymentMethod.id to your server
                fetch('/checkout', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: JSON.stringify({ payment_method: result.paymentMethod.id, amount: form.amount.value }),
                }).then(function(result) {
                    // Handle server response here
                });
            }
        });
    });
</script>
</body>
</html>
