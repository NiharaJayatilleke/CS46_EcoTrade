<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="background-login"></div>
    <div class="login-form-container">
        <div class="login-welcome-content"> 
            <h2 class="login-logo">
                <img class="img" src="<?php echo URLROOT; ?>/img/signup/ecotrade.png" >EcoTrade</h2>

            <div class="login-welcome">
                <h2> Welcome back to EcoTrade<br> <span> From waste to worth for a sustainable future!</span></h2><br>
            </div>
        </div>
        <div class="login-box"> 
            <div class="login-form-box"> 
                <form class="input-group-login" action="<?php echo URLROOT; ?>/Users/login" method="POST">
                    <h2>Login</h2>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" id="email" class="email" value="<?php echo $data['email']; ?>">
                        <label>Email</label>
                        <span class="form-invalid"><?php echo $data['email_err']; ?></span>
                    </div>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="password" id="password" >
                        <label>Password</label>
                        <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                    </div>

                    <div class="remember-me">
                        <label>
                            <input type="checkbox" name="remember_me" id="remember_me" value="1" />
                            Remember me
                        </label>
                        <a href="<?php echo URLROOT; ?>/users/forgot_password" title="Forgot Password">Forgot Password?</a>
                    </div>

                    <button type="submit" class="login-btn">Login</button>

                    <div class="login-already">
                        <p> Dont't have an account? <a href ="<?php echo URLROOT ?>/Users/register" > Sign Up </a> </p>
                    </div>
                </form>
            </div>
        </div>
    </div>             

    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/login.js"></script>

    <?php require APPROOT.'/views/inc/footer.php'; ?>
