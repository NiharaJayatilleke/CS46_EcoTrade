function paymentGateway(event) {
    event.preventDefault();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            alert(xhttp.responseText);
        }
    };
    xhttp.open("GET", "/ecotrade/ItemAds/paymentportal", true);
    xhttp.setRequestHeader("X-Requested-With", "XMLHttpRequest"); 
    xhttp.send();
}