<?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="mod-background"></div>
    <div class = "mod-register-form-container">
        <div class="welcome-content"> 
            <h2 class="logo">
                <img class ="img" src="<?php echo URLROOT; ?>/img/signup/ecotrade.png" >EcoTrade</h2>

            <div class = "text-welcome">
            <h2> Moderator Registration<br>
            </div>

        </div>
        <div class="reg-box"> 
            <div class="form-box"> 
                <form class="input-group" action="<?php echo URLROOT; ?>/Moderators/register" method="POST">
                    <h2>Register</h2>
                    

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-contact' ></i></span>
                        <input type="name" name = "username" id="username" class="username" value="<?php echo $data['username']; ?>" required>
                        <label>Name</label>

                    </div>

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="email" name = "email" id="email" class="email" value="<?php echo $data['email']; ?>" required>
                        <label>Email</label>
                        <!-- <span class="form-invalid"><?php echo $data['email_err']; ?></span> -->

                    </div>

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-phone'></i></span>
                        <input type="tel" name = "number" id="number" class="number" value="<?php echo $data['number']; ?>" required>
                        <label>Contact Number</label>
                        <span class="form-invalid"><?php echo $data['number_err']; ?></span>
                    </div>


                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name = "password" id="password" value="<?php echo $data['password']; ?>" required >
                        <label>Password</label>
                        <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                    </div>

                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name = "confirm_password" id="password" value="<?php echo $data['password']; ?>" required >
                        <label>Confirm Password</label>
                        <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>
                    </div>

                    <div class="terms-forgot">
                        <label><input type="checkbox"name="agree" id="agree" value="yes"/> I agree to the
                        <a href="<?php echo URLROOT; ?>/moderators/terms" title="term of services">terms & conditions</a>
                    </div>
                    <div>
                        <span class="form-invalid"><?php echo $data['agree_err']; ?></span>
                    </div>

                    <button type="submit" class = "register-btn">Register</button>

                    <div class="registred-already">
                        <p>Are you an already registered Moderator? <a href ="<?php echo URLROOT ?>/Moderators/login" > Login </a> </p>
                    </div>

                    <!-- <input type="text" name="user_type" id="user_type" value="pBuyer" required="" hidden="" style="display: none;"> -->
                    <!-- <input type="text" name="user_type" id="user_type" value="moderator" required="" hidden="" style="display: none;"> -->
                </form>
            </div>
        </div>
    </div>             

            <!-- Javascript for image upload -->
            <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/signup.js"></script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?> 



