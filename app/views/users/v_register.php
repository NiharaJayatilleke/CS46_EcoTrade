<?php require APPROOT.'/views/inc/header.php'; ?>
    
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>
    <div class="form-container" style="margin-top: 10vh">
        <h1>User Type Selection</h1>
        <?php if (!empty($data['err'])){?>
        <div class="error-msg">
            <span class="form-invalid"><?php echo $data["err"] ?></span>
        </div>
        <?php } ?>

        <div class="type-select">
            <a href="<?php echo URLROOT ?>/Users/secondhandSellerRegister">
                <div class="type-select-btn">
                    Secondhand Seller
                </div>
            </a>

            <a href="<?php echo URLROOT ?>/Users/secondhandBuyerRegister">
                <div class="type-select-btn">
                    Secondhand Buyer
                </div>
            </a>

            <a href="<?php echo URLROOT ?>/Users/recycleSellerRegister">
                <div class="type-select-btn">
                    Recycle Seller
                </div>
            </a>

            <!-- <a href="<?php echo URLROOT ?>/users/securityRegister">
                <div class="type-select-btn">
                    Security
                </div>
            </a> -->
        </div>

        <div class="other-options">
            <p>If you already have an account? <a href="<?php echo URLROOT ?>/Users/login">Login</a></p>
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
        <center><h1>Sign Up</h1></center>
        <p><b>Welcome to EcoTrade! Please sign up to continue.</b></p>
        </div>
        <form action="<?php echo URLROOT?>/Users/register" method="POST">
            
            <div class="form-input-title">Username</div>
            <input type="text" name="username" placeholder="Username" id="username" class="username" value="<?php echo $data['username']; ?>">
            <span class="form-invalid"><?php echo $data['username_err']; ?></span>

            
            <div class="form-input-title">Email</div>
            <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email']; ?>">
            <span class="form-invalid"><?php echo $data['email_err']; ?></span>

            <
            <div class="form-input-title">Contact Number</div>
            <input type="text" name="number" placeholder="Contact Number" id="number" class="number" value="<?php echo $data['number']; ?>">
            <span class="form-invalid"><?php echo $data['number_err']; ?></span>

            
            <div class="form-input-title">Password</div>
            <input type="password" name="password" placeholder="Password" id="password" class="password" value="<?php echo $data['password']; ?>" >
            <span class="form-invalid"><?php echo $data['password_err']; ?></span>

            
            <div class="form-input-title">Confirm Password</div>
            <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="confirm_password" value="<?php echo $data['confirm_password']; ?>" >
            <span class="form-invalid"><?php echo $data['confirm_password_err']; ?></span>

            <div>
           
            <br>
            <label for="agree">
                <input type="checkbox" name="agree" id="agree" value="yes"/> I agree
                with the
                <a href="<?php echo URLROOT; ?>/Users/terms" title="term of services">terms of service</a>

            </label>
            
            </div>
            <div>
            <span class="form-invalid"><?php echo $data['agree_err']; ?></span>
            </div>

            
            
            <input type="submit" value="Sign Up" class="form-btn">

            <footer>Already have an account? <a href="<?php echo URLROOT; ?>/Users/login">Login here</a></footer>


        </form>
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?> -->