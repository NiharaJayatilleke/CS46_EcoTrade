<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>


    <div class="register-form-container" style="margin-top: 10vh"><br>
            <div class="form-header"><br>
            <center><h1>Moderator Registration</h1></center><br>
            <p><b>Welcome to EcoTrade!</b></p><br>
            </div>
            <form action="<?php echo URLROOT?>/Moderators/register" method="POST">

                <!-- First Name -->
                <!-- <div class="form-input-title">Full Name</div>
                <input type="text" name="firstname" placeholder="First name" id="firstname" class="firstname" value="<?php echo $data['firstname']; ?>">
                <span class="form-invalid"><?php echo $data['firstname_err']; ?></span>

                </br>
                <input type="text" name="lastname" placeholder="Last name" id="lastname" class="lastname" value="<?php echo $data['lastname']; ?>">
                <span class="form-invalid"><?php echo $data['lastname_err']; ?></span> -->

                <!-- Last Name
                <div class="form-input-title">Last Name</div>
                <input type="text" name="lastname" placeholder="Lastname" id="lastname" class="lastname" value="<?php echo $data['lastname']; ?>">
                <span class="form-invalid"><?php echo $data['firstname_err']; ?></span> -->

                <!-- username -->
                <div class="form-input-title">Username</div>
                <input type="text" name="username" placeholder="Username" id="username" class="username" value="<?php echo $data['username']; ?>">
                <span class="form-invalid"><?php echo $data['username_err']; ?></span>

                <!-- email -->
                <div class="form-input-title">Email</div>
                <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email']; ?>">
                <span class="form-invalid"><?php echo $data['email_err']; ?></span>

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
                
                <input type="submit" value="Sign Up" class="form-btn">

                <!-- <footer>Already have an account? <a href="<?php echo URLROOT; ?>/Users/login">Login here</a></footer> -->


            </form>
        </div>
    </div>  

<?php require APPROOT.'/views/inc/footer.php'; ?>