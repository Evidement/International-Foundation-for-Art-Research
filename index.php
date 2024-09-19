<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Checkout</title>
    <!-- Include Tailwind CSS via CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Banner Section -->
    <div class="bg-blue-500 p-10 text-center">
        <h1 class="text-white text-4xl font-bold">Welcome to International-Foundation-for-Art-Research
Store!</h1>
        <p class="text-white mt-2">Make a secure payment through PayPal Checkout</p>
    </div>

    <!-- PayPal Checkout Section -->
    <div class="flex justify-center items-center h-screen">
        <div class="bg-white p-10 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-bold mb-5">Complete Your Payment</h2>

            <!-- PayPal Button -->
            <div id="paypal-button-container"></div>

            <script src="https://www.paypal.com/sdk/js?client-id=ASUF53rJxIhe4IP2iSrKkm2VHQeRhOicDREIw37Plt6NE0cIa2GGr642Rw59Ejn3LCrqPaXvhCECFArX&currency=USD"></script>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: '99.99' // Set the amount here
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
                            alert('Transaction completed by ' + details.payer.name.given_name);
                            // Redirect to a thank you or confirmation page
                        });
                    },
                    onError: function(err) {
                        console.error('PayPal Checkout Error:', err);
                    }
                }).render('#paypal-button-container');
            </script>

        </div>
    </div>

</body>
</html>
