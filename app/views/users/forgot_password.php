<?php require APPROOT.'/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>

<div class="hero2">
    <div class="form-box2">
        <div class="form-container">
            <form action="<?php echo URLROOT; ?>/forgotPassword/sendEmail" method="POST">
                <h2 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 40px;">Reset Password</h2>

                <p style="margin: 5px; padding-left: 30px; padding-right: 3px;">Please enter the email address associated with your registered account.</p><br>

                <input type="email" name="email" placeholder="Email" id="email" class="input-field email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                <input type="submit" value="Receive Email" class="submit-btn"> <br>
            </form>
            <?php flash('reset');?>
        </div>
    </div>
</div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?> 

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="path/to/your/animations.js"></script>
<script src="/public/js/input_validation.js"></script>

</body>
</html>