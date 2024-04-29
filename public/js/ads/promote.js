window.onload = function() {

    $.ajax({
        url: URLROOT + "/ItemAds/packageExists/" + CURRENT_AD,
        method: "post",
        data: $("form").serialize(),
        dataType: "json",
    
        success: function(data) {
            console.log('Success:', data);
            console.log('PV remaining:', data.PV);
            console.log('AG remaining:', data.AG);

            // Get all the radio buttons
            var radios1 = document.getElementsByName('package1');
            var radios2 = document.getElementsByName('package2');

            // Disable the radio buttons in the first group if a package is already selected
            if (data.PV > 0) {
                for (var i = 0; i < radios1.length; i++) {
                    radios1[i].disabled = true;
                }

                var p = document.createElement('p');
                p.textContent = 'You have already activated this package.';
                p.className = 'activated-para';
                var radioContainer = document.getElementById('radioContainer1');
                radioContainer.insertBefore(p, radioContainer.firstChild);
            } else {
            // Add event listeners to the radio buttons in the first group
            for (var i = 0; i < radios1.length; i++) {
                radios1[i].addEventListener('change', function() {
                    updateOption1(this.value);
                });
            }
            }

            // Disable the radio buttons in the second group if a package is already selected
            if (data.AG > 0) {
                for (var i = 0; i < radios2.length; i++) {
                    radios2[i].disabled = true;
                }

                var p = document.createElement('p');
                p.textContent = 'You have already activated this package.';
                p.className = 'activated-para';
                var radioContainer = document.getElementById('radioContainer2');
                radioContainer.insertBefore(p, radioContainer.firstChild);

            } else {
            // Add event listeners to the radio buttons in the second group
            for (var i = 0; i < radios2.length; i++) {
                radios2[i].addEventListener('change', function() {
                    updateOption2(this.value);
                });
            }
            }
        },

        error: function(jqXHR, textStatus, errorThrown) {
            console.error('AJAX error:', textStatus, errorThrown);
        }
    });
    
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

    updateTotal();
    var totalAmount = document.getElementById('totalPayment').innerText.replace('Rs. ', '');

    var data = {
        packageType: packageType,
        timeInDays: timeInDays,
        adId: adId,
        totalAmount: totalAmount
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
        // Redirect to the URL returned from the server
        window.location.href = data.redirect;
    })
    .catch((error) => {
        console.error('Error:', error);
    });
}

var continueButton = document.getElementById('packageContinue');

continueButton.addEventListener('click', function(event) {
    // event.preventDefault();
    console.log('Continue button clicked');

    var packageType1 = document.querySelector('.divv-71').innerText.split(' - ')[0];
    // var timeInDays1 = document.querySelector('.divv-71').innerText.split(' - ')[1] === 'One Week' ? 7 : 30;
    var duration1 = document.querySelector('.divv-71').innerText.split(' - ')[1];
    var timeInDays1;
    if (duration1 === 'None') {
        timeInDays1 = 0;
    } else if (duration1 === 'One Week') {
        timeInDays1 = 7;
    } else {
        timeInDays1 = 30;
    }

    var packageType2 = document.querySelector('.divv-071').innerText.split(' - ')[0];
    // var timeInDays2 = document.querySelector('.divv-071').innerText.split(' - ')[1] === 'One Week' ? 7 : 30;
    var duration2 = document.querySelector('.divv-071').innerText.split(' - ')[1];
    var timeInDays2;
    if (duration2 === 'None') {
        timeInDays2 = 0;
    } else if (duration2 === 'One Week') {
        timeInDays2 = 7;
    } else {
        timeInDays2 = 30;
    }
    // var params = new URLSearchParams(window.location.search);
    // var adId = params.get('adId');

    // console.log(timeInDays1);

    if (timeInDays1 !== 0) {
    submitPackage(packageType1, timeInDays1, CURRENT_AD);
    }

    if (timeInDays2 !== 0) {
    submitPackage(packageType2, timeInDays2, CURRENT_AD);
    }
});

}
