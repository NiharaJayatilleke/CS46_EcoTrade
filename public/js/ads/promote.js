window.onload = function() {
    // Get all the radio buttons
    var radios1 = document.getElementsByName('package1');
    var radios2 = document.getElementsByName('package2');

    // Add event listeners to the radio buttons in the first group
    for (var i = 0; i < radios1.length; i++) {
        radios1[i].addEventListener('change', function() {
            updateOption1(this.value);
        });
    }

    // Add event listeners to the radio buttons in the second group
    for (var i = 0; i < radios2.length; i++) {
        radios2[i].addEventListener('change', function() {
            updateOption2(this.value);
        });
    }
}

// Update the text in the divs based on the selected option in the first group
function updateOption1(value) {
    var text, price;
    if (value === 'week') {
        text = 'PV - One Week';
        price = 'Rs. 2000';
    } else if (value === 'month') {
        text = 'PV - One Month';
        price = 'Rs. 7500';
    } else {
        text = 'PV - None';
        price = 'Rs. 0';
    }
    document.querySelector('.divv-71').innerText = text;
    document.querySelector('.divv-72').innerText = price;
    updateTotal();
}

// Update the text in the divs based on the selected option in the second group
function updateOption2(value) {
    var text, price;
    if (value === 'week') {
        text = 'AG - One Week';
        price = 'Rs. 1500';
    } else if (value === 'month') {
        text = 'AG - One Month';
        price = 'Rs. 6000';
    } else {
        text = 'AG - None';
        price = 'Rs. 0';
    }
    document.querySelector('.divv-071').innerText = text;
    document.querySelector('.divv-072').innerText = price;
    updateTotal();
}

function updateTotal() {
    var price1 = document.querySelector('.divv-72').innerText.replace('Rs.', '');
    var price2 = document.querySelector('.divv-072').innerText.replace('Rs.', '');
    var total = 0;
    if (!isNaN(price1)) {
        total += parseInt(price1);
    }
    if (!isNaN(price2)) {
        total += parseInt(price2);
    }
    document.getElementById('totalPayment').innerText = 'Rs. ' + total;
}