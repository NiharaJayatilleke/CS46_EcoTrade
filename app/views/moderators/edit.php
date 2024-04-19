<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="mod-background-login"></div>
    <div class="mod-login-form-container">
        <div class="login-welcome-content"> 
            <h2 class="login-logo">
                <img class="img" src="<?php echo URLROOT; ?>/img/signup/ecotrade.png" >EcoTrade</h2>

            <div class="login-welcome">
                <h2> Edit Moderator Credentials</h2>
            </div>
        </div>

        <div class="login-box"> 
            <div class="login-form-box"> 
                <form action="<?php echo URLROOT?>/Moderators/edit/<?php echo $data['id'];?>" method="POST">
                    <h2>Moderator</h2>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-envelope'></i></span>
                        <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email']; ?>" disabled>
                        <!-- <span class="form-invalid"><?php echo $data['email_err']; ?></span> -->
                    </div>

                     <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-phone'></i></span>
                        <input type="tel" name = "number" id="number" class="number" >
                        <label>Contact Number</label>
                        <!-- <span class="form-invalid"><?php echo $data['number_err']; ?></span> -->
                    </div>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name="password" id="password"  >
                        <label>Password</label>
                        <span class="form-invalid"><?php echo $data['password_err']; ?></span>
                    </div>

                    <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="password" name = "confirm_password" id="password" value="<?php echo $data['password']; ?>"  >
                        <label>Confirm Password</label>
                        <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>
                    </div>

                    <button type="submit" class="login-btn">Update</button>
                </form>
            </div>
        </div>
    </div>             

    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/login.js"></script>

    <?php require APPROOT.'/views/inc/footer.php'; ?>






<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="register-form-container" style="margin-top: 10vh"><br>
        <div class="form-header"><br>
        <center><h1>Moderator Registration</h1></center><br>
        <p><b>Welcome to EcoTrade!</b></p><br>
        </div>
        <form action="<?php echo URLROOT?>/Moderators/edit/<?php echo $data['id'];?>" method="POST">

            <!-- email -->
            <div class="form-input-title">Email</div>
            <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email']; ?>" disabled>
            <span class="form-invalid"><?php echo $data['email_err']; ?></span>
            
            <!-- username -->
            <div class="form-input-title">Username</div>
            <input type="text" name="username" placeholder="Username" id="username" class="username" value="<?php echo $data['username']; ?>">
            <span class="form-invalid"><?php echo $data['username_err']; ?></span>

            

            <!-- contact number -->
            <div class="form-input-title">Contact Number</div>
            <input type="text" name="number" placeholder="Contact Number" id="number" class="number" value="<?php echo $data['number']; ?>">
            <span class="form-invalid"><?php echo $data['number_err']; ?></span>

            <!-- password -->
            <div class="form-input-title">Password</div>
            <input type="password" name="password" placeholder="Password" id="password" class="password" value="<?php echo $data['password']; ?>" >
            <span class="form-invalid"><?php echo $data['password_err']; ?></span>

            <!-- confirm password -->
            <div class="form-input-title">Confirm Password</div>
            <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>" >
            <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

            <div>
            <!-- term of service agreement -->
            <br>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="<?php echo URLROOT; ?>/Users/terms" title="term of services">terms of service</a>

            </label>
            <!-- Display the agree_err message -->
            </div>
            <div>
            <span class="form-invalid"><?php echo $data['agree_err']; ?></span>
            </div>

            <!-- <input type="text" name="user_type" id="user_type" value="Moderator" required="" hidden="" style="display: none;"> -->

            <!-- submit button -->
            
            <input type="submit" value="Update" class="form-btn">

            <!-- <footer>Already have an account? <a href="<?php echo URLROOT; ?>/Users/login">Login here</a></footer> -->


        </form>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?> 