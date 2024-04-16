
function showAdContent(adId) {
    // Send a POST request to the server
    fetch(URLROOT + "/ItemAds/getAdContent/" + adId, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({adId: adId})
    })
    .then(response => {
        if (!response.ok) {
            throw new Error("HTTP error " + response.status);
        }
        return response.json();
    })
    .then(data => {

        console.log(data);

        showContent('secondhand-ad-view-content');
        // Use the data to display the ad content
        document.querySelector('.sad-item-name h1').textContent = data.ad.item_name;
        document.querySelector('.sad-p1 p').textContent = 'Posted on ' + data.ad.item_created_at;
        document.querySelector('.sad-ad-img').src = URLROOT + '/public/img/items/' + data.ad.item_image;
        document.querySelector('.sad-price h2').textContent = 'Rs. ' + data.ad.item_price;
        document.querySelector('.sad-neg').textContent = data.ad.negotiable == 'yes' ? 'Negotiable' : 'Non-Negotiable';
        document.querySelector('.sad-condition').textContent = 'Condition: ' + data.ad.item_condition;
        document.querySelector('.sad-desP').textContent = data.ad.item_desc;
        document.querySelector('.sad-b3-p p').textContent = 'Sold by ' + data.ad.seller_name;
        document.querySelector('#show-number').dataset.number = data.number;

    })
    .catch(error => {
        console.error('Error:', error);
    });
}
