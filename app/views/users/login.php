<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="hero2">
        <div class = "form-box2">
            <div class="form-container">
                <form class="input-group2" action="<?php echo URLROOT; ?>/Users/login" method="POST">
                    <h2>login</h2>
                    <!-- email -->
                    <input name="email" placeholder="Email" id="email" class="input-field" value="<?php echo $data['email']; ?>">
                    <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                    <!-- password -->
                    <input name="password" placeholder="Password" id="password" class="input-field" value="<?php echo $data['password']; ?>">
                    <span class="form-invalid"><?php echo $data['password_err']; ?></span>

                     <!-- Forgot password link -->
                    <div class ="form-footer-text"><br>
                    <a href="<?php echo URLROOT; ?>/users/forgot_password">Forgot Password?</a>
                    </div>

                    <br>
                    <!-- submit button -->
                    <input type="submit" value="Login" class="submit-btn"> <br>
                </form>
            </div>

        <?php require APPROOT.'/views/inc/footer.php'; ?>


