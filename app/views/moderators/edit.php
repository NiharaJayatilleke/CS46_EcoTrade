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
                        <span class="icon"><i class='bx bxs-contact' ></i></span>
                        <input type="name" name = "username" id="username" class="username" value="<?php echo $data['username']; ?>">
                        <label>Name</label>
                        <!-- <span class="form-invalid"><?php echo $data['username_err']; ?></span> -->
                    </div>

                     <div class="input-box-login">
                        <span class="icon"><i class='bx bxs-phone'></i></span>
                        <input type="tel" name = "number" id="number" class="number" >
                        <label>Contact Number</label>
                        <span class="form-invalid"><?php echo $data['number_err']; ?></span>
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


    
<?php require APPROOT.'/views/inc/components/footer.php'; ?> 