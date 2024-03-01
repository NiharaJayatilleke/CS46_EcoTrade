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
// }

// Update the text in the divs based on the selected option in the first group
function updateOption1(value) {
    var text, price;
    if (value === 'week') {
        text = 'PV - One Week';
        price = 'Rs. 2000';
        timeInDays = 7;
    } else if (value === 'month') {
        text = 'PV - One Month';
        price = 'Rs. 7500';
        timeInDays = 30;
    } else {
        text = 'PV - None';
        price = 'Rs. 0';
        timeInDays = 0;
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
        timeInDays = 7;
    } else if (value === 'month') {
        text = 'AG - One Month';
        price = 'Rs. 6000';
        timeInDays = 30;
    } else {
        text = 'AG - None';
        price = 'Rs. 0';
        timeInDays = 0;
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

function submitPackage(packageType, timeInDays, adId) {
    console.log('Submitting package');

    var data = {
        packageType: packageType,
        timeInDays: timeInDays,
        adId: adId
    };

    // The POST request
    fetch(URLROOT +"/itemAds/promote/"+ CURRENT_AD, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

var continueButton = document.getElementById('packageContinue');

continueButton.addEventListener('click', function(event) {
    event.preventDefault();
    console.log('Continue button clicked');

    var packageType1 = document.querySelector('.divv-71').innerText.split(' - ')[0];
    var timeInDays1 = document.querySelector('.divv-71').innerText.split(' - ')[1] === 'One Week' ? 7 : 30;

    var packageType2 = document.querySelector('.divv-071').innerText.split(' - ')[0];
    var timeInDays2 = document.querySelector('.divv-071').innerText.split(' - ')[1] === 'One Week' ? 7 : 30;
    // var params = new URLSearchParams(window.location.search);
    // var adId = params.get('adId');

    submitPackage(packageType1, timeInDays1, CURRENT_AD);
    submitPackage(packageType2, timeInDays2, CURRENT_AD);
});

}