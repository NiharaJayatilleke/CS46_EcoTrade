<?php require APPROOT.'/views/inc/header.php'; ?>
    
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>
    <div class="form-container">
        <h1>Login</h1>
        <?php if (!empty($data['err'])) { ?>
            <div class="error-msg">
                <span class="form-invalid"><?php echo $data["err"] ?></span>
            </div>
        <?php } ?>
        <form action="<?php echo URLROOT ?>/users/login" method="post">
            <!-- Email -->
            <input type="text" name="email" id="email" class="email" required value="<?php echo $data['email'] ?>" placeholder="Email" />

            <!-- Password -->
            <input type="password" name="password" id="password" class="password" required placeholder="Password" />

            <br><br><br>
            <!-- Remember Me Checkbox -->
            <div class="form-check">
                <input type="checkbox" name="remember_me" id="remember_me">
                <label for="remember_me">Remember Me</label>
            </div>

            <br><br>

            <!-- Submit -->
            <input type="submit" value="Login" class="form-btn">
        </form>

        <div class="other-options">
            <p>If you don't have an account? <a href="<?php echo URLROOT ?>/Users/register">Register</a></p>
        </div>
    </div>

    <!--?xml version="1.0" standalone="no"?-->
    <!-- <div class="svg">
        <img class="svg-1" src="<?php echo URLROOT ?>/images/svg-1.png" alt="">
        <img class="svg-2" src="<?php echo URLROOT ?>/images/svg-7.png" alt="">
    </div> -->

<?php require APPROOT.'/views/inc/footer.php'; ?>


<!-- <?php require APPROOT.'/views/inc/header.php'; ?>
   
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="form-container">
        <div class="form-header">
        <center><h1>Login</h1></center>
        <p><b>Welcome to EcoTrade! Please Login to continue.</b></p>
        </div>
        <form action="" method="POST">

            <div class="form-input-title">Email</div>
            <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email'];?>" >
            <span class="form-invalid"><?php echo $data['email_err'];?></span>

            <div class="form-input-title">Password</div>
            <input type="password" name="password" placeholder="Password" id="password" class="password" value="<?php echo $data['password'];?>">
            <span class="form-invalid"><?php echo $data['password_err'];?></span>

            <div><br>
            <a href="<?php echo URLROOT; ?>/users/forgot_password">Forgot Password?</a>
            </div>

            <br>
            <input type="submit" value="Login" class="form-btn">    
        </form>

        <?php flash('reg_flash');?>
        
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?> -->