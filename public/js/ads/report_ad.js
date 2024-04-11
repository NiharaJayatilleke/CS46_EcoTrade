function reportAd() {
    Swal.fire({
        title: 'Report this Ad',
        html: `
            <div style="text-align: left;">
                <label>Please help us maintain a safe and trustworthy community by reporting any ads that violate our guidelines.</label><br><br>
                <label>Reason for reporting:</label>
                <div class="swal2-radio">
                    <div><input type="radio" name="reason" value="fraud"><label>Fraudulent or Misleading Information</label></div>
                    <div><input type="radio" name="reason" value="inappropriate"><label>Offensive or Inappropriate Content</label></div>
                    <div><input type="radio" name="reason" value="illegal"><label>Counterfeit or Illegal Items</label></div>
                    <div><input type="radio" name="reason" value="spam"><label>Spam or Scam</label></div>
                    <div><input type="radio" id="other-reason" name="reason" value="other"><label>Other</label></div><br>
                </div>
                <label id="other-reason-label" style="display: none;">Please Specify Other Reason:</label>
                <input id="other-reason-input" class="swal2-input" style="display: none;"><br>
                <label>Additional Comments (Optional):</label>
                <textarea id="additional-comments" class="swal2-textarea"></textarea><br>
                <label>Contact Information (Optional):</label>
                <input id="contact-info" class="swal2-input">
                <p>Confirmation: By clicking "Submit", you agree that the information provided is accurate and truthful to the best of your knowledge.</p>
                </div>
        `,
        didOpen: () => {
            document.getElementById('other-reason').addEventListener('change', function() {
                const display = this.checked ? 'block' : 'none';
                document.getElementById('other-reason-label').style.display = display;
                document.getElementById('other-reason-input').style.display = display;
            });
        },
        preConfirm: () => {
            let reason = document.querySelector('input[name="reason"]:checked').value;
            if (reason === 'other') {
                reason = document.getElementById('other-reason-input').value;
            }
            return {
                reason: reason,
                comments: document.getElementById('additional-comments').value,
                contact: document.getElementById('contact-info').value
            }
        },
        confirmButtonText: 'Submit',
        showCancelButton: true,
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            var reason = result.value.reason;
            var comments = result.value.comments;
            var contact = result.value.contact;
        
            $.ajax({
                url:URLROOT +"/ItemAds/report/"+ CURRENT_AD,
                method: "POST",
                data: {
                    reason: reason,
                    comments: comments,
                    contact: contact
                },
                success: function(response) {
                    console.log(response);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('An error occurred: ' + textStatus, errorThrown);
                }
            });
        }
    });
}