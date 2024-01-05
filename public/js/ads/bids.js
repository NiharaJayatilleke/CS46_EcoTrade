
var placeBidButton = document.querySelector('#place-bid');

if (placeBidButton) {
    placeBidButton.addEventListener('click', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Place your bid',
            html: `
                <p>EUR 16.05 + EUR 7.43 shipping</p>
                <p>16 bids · 35m 43s left</p>
                <button> Bid EUR 17 </button> approx. US $18.75</p>
                <button> Bid EUR 18 </button> approx. US $19.85</p>
                <button> Bid EUR 19 </button> approx. US $20.95</p>
                <p>Your max bid</p>
                <input type="number" id="max-bid" min="16.55" step="0.01" placeholder="Enter EUR 16.55 or more.">
                <p>By selecting Bid, you are committing to buy this item if you are the winning bidder.</p>
            `,
            confirmButtonText: 'Bid'
        }).then((result) => {
            if (result.isConfirmed) {
                var maxBid = document.querySelector('#max-bid').value;
                // Handle the bid here...
            }
        });
    });
}


