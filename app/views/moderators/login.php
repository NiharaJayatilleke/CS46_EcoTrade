<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="mod-background-login"></div>
    <div class="mod-login-form-container">
        <div class="login-welcome-content"> 
            <h2 class="login-logo">
                <img class="img" src="<?php echo URLROOT; ?>/img/signup/ecotrade.png" >EcoTrade</h2>

            <div class="login-welcome">
                <h2> Welcome back!</h2>
            </div>
        </div>

        <div class="login-box"> 
            <div class="login-form-box"> 
                <form class="input-group-login" action="<?php echo URLROOT; ?>/Moderators/login" method="POST">
                    <h2>Moderator Login</h2>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name="email" id="email" class="email" value="<?php echo $data['email']; ?>" required>
                        <label>Email</label>
                        <!-- <span class="form-invalid"><?php echo $data['email_err']; ?></span> -->
                    </div>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="password" id="password" required >
                        <label>Password</label>
                        <!-- <span class="form-invalid"><?php echo $data['password_err']; ?></span> -->
                    </div>

                    <!-- <div class="remember-me">
                        <label>
                            <input type="checkbox" name="remember_me" id="remember_me" value="1" />
                            Remember me
                        </label>
                        <a href="<?php echo URLROOT; ?>/users/forgot_password" title="Forgot Password">Forgot Password?</a>
                    </div> -->

                    <button type="submit" class="login-btn">Login</button>

                    <!-- <div class="login-already">
                        <p> Dont't have an account? <a href ="<?php echo URLROOT ?>/Users/register" > Sign Up </a> </p>
                    </div> -->

                    

                    
                </form>
            </div>
        </div>
    </div>             

    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/login.js"></script>

    <?php require APPROOT.'/views/inc/footer.php'; ?>


<!-- Below one is the old login page -->


<!-- <?php require APPROOT.'/views/inc/header.php'; ?>

    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="hero2">
        <div class = "form-box2">
            <div class="form-container">
                <form class="input-group2" action="<?php echo URLROOT; ?>/Users/login" method="POST">
                    <h2 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 40px;">Welcome</h2>
                    <input type="email" name="email" placeholder="Email" id="email" class="input-field email" value="<?php echo $data['email']; ?>">
                    <span class="form-invalid"><?php echo $data['email_err']; ?></span>

                    <input  name="password" placeholder="Password" id="password" class="input-field" value="<?php echo $data['password']; ?>">
                    <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                
                    <div class ="form-footer-text"><br>
                    <a href="<?php echo URLROOT; ?>/users/forgot_password">Forgot Password?</a>
                    </div>

                    <br>
                    <input type="submit" value="Login" class="submit-btn"> <br>
                </form>
            </div>

        <?php require APPROOT.'/views/inc/footer.php'; ?> 
    </div>
</div>
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="path/to/your/animations.js"></script>
        <script src="/public/js/input_validation.js"></script>

        </body>
</html> -->