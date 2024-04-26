<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_emailver.css">
<div class = "bg345">
    <div class="verification-message">
    <img src="../../public/img/login/10507049.png" alt="Verification Image" class="ver-image"> <!-- Add your image here -->
        <p class="verification-text">Please verify your email!</p>
        <p>You're almost there! We sent an email to <br><strong><?php echo $data['email']; ?></strong>.</p>
        <p></p> <!-- Empty paragraph for space -->
        <p>Just click on the link in that email to complete your signup. If you don't see it, you may need to <strong>check your spam folder</strong>.</p>
        <p></p> <!-- Empty paragraph for space -->
        <p>Still can't find the email? No problem.</p>
        <p id="countdown"></p>
        <input type="hidden" id="email" value="<?php echo $data['email']; ?>">
        <input type="hidden" id="token" value="<?php echo $data['token']; ?>">
        <button id="resend-button" class="resend-button">Resend verification email</button>

</div>


<script>
    var resendButton = document.getElementById('resend-button');
    var countdownElement = document.getElementById('countdown');

    resendButton.addEventListener('click', function() {
        var email = document.getElementById('email').value;
        var token = document.getElementById('token').value;
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo URLROOT; ?>/Users/resendEmailConfirmation', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (this.status == 200 && this.responseText == 'success') {
                // Display a success message with SweetAlert2
                Swal.fire(
                  'Success',
                  'Resend successful. Please check your email.',
                  'success'
                )
            } else {
                // Display an error message
                Swal.fire(
                  'Error',
                  'There was an error resending the email. Please try again.',
                  'error'
                )
            }
        };
        xhr.send('email=' + encodeURIComponent(email) + '&token=' + encodeURIComponent(token));

        // Disable the button, add the disabled class, and start the countdown
        this.disabled = true;
        this.classList.add('disabled');
        startCountdown(2 * 60);
    });

    function startCountdown(seconds) {
        countdownElement.textContent = 'Resend link in ' + formatTime(seconds);
        var intervalId = setInterval(function() {
            seconds--;
            countdownElement.textContent = 'Resend link in ' + formatTime(seconds);
            if (seconds <= 0) {
                clearInterval(intervalId);
                resendButton.disabled = false;
                resendButton.classList.remove('disabled');
            }
        }, 1000);
    }

    function formatTime(seconds) {
        var minutes = Math.floor(seconds / 60);
        seconds %= 60;
        return minutes + ':' + (seconds < 10 ? '0' : '') + seconds;
    }
</script>