function paymentGateway(event) {
    event.preventDefault();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            alert(xhttp.responseText);
            var obj = JSON.parse(xhttp.responseText);

            // Payment completed. It can be a successful failure.
            payhere.onCompleted = function onCompleted(orderId) {
                console.log("Payment completed. OrderID:" + orderId);
                // Note: validate the payment and show success or failure page to the customer
            };

            // Payment window closed
            payhere.onDismissed = function onDismissed() {
                // Note: Prompt user to pay again or show an error page
                console.log("Payment dismissed");
            };

            // Error occurred
            payhere.onError = function onError(error) {
                // Note: show an error page
                console.log("Error:"  + error);
            };

            // Put the payment variables here
            var payment = {
                "sandbox": true,
                "merchant_id": "1226588",    // Replace your Merchant ID
                "return_url": "http://localhost/ecotrade/itemads/payment",   
                "cancel_url": "http://localhost/ecotrade/itemads/payment",     // Important
                "notify_url": "http://sample.com/notify",
                "order_id": obj["order_id"],
                "items": obj,
                "amount": obj["amount"],
                "currency": obj["currency"],
                "hash": obj["hash"], // *Replace with generated hash retrieved from backend
                "first_name": obj["first_name"],
                "last_name": obj["last_name"],
                "email": obj["email"],
                "phone": obj["phone"],
                "address": obj["address"],
                "city": obj["city"],
                "country": "Sri Lanka",
                "delivery_address": "No. 46, Galle road, Kalutara South",
                "delivery_city": "Kalutara",
                "delivery_country": "Sri Lanka",
                "custom_1": "",
                "custom_2": ""
            };

            payhere.startPayment(payment);
        }
    };
    xhttp.open("GET", "/ecotrade/ItemAds/payment", true);
    xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest"); 
    xhttp.send();
}



// NzA1MDAxMDQzMjEzODY5NDY2MzQwMTg3NDcwNDYzNzY0NjgwMw==