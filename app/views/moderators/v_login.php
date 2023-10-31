<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="form-container">
        <div class="form-header">
        <center><h1>Moderator Login</h1></center>
        <p><b>Welcome to EcoTrade! Please Login to continue.</b></p>
        </div>
        <form action="<form action="<?php echo URLROOT?>/Moderators/login" method="POST">

            <!-- email -->
            <div class="form-input-title">Email</div>
            <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email'];?>" >
            <span class="form-invalid"><?php echo $data['email_err'];?></span>


            <!-- password -->
            <div class="form-input-title">Password</div>
            <input type="password" name="password" placeholder="Password" id="password" class="password" value="<?php echo $data['password'];?>">
            <span class="form-invalid"><?php echo $data['password_err'];?></span>

            <!-- Forgot password link -->
            <div><br>
            <a href="<?php echo URLROOT; ?>/users/forgot_password">Forgot Password?</a>
            </div>

            <!-- submit button -->
            <br>
            <input type="submit" value="Login" class="form-btn">    
        </form>

        <?php flash('reg_flash');?>
        
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?>