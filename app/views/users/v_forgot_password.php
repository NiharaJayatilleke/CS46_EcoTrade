<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>



    <div class="login-form-container">
        <div class="login-form-header">
        <center><h1>Reset Password </h1></center><br>
        <p><b>Please enter the email address associated with your registered account.</b></p>
        
        </div>
        <form action="<?php echo URLROOT; ?>/forgotPassword/sendEmail" method="POST">

            <!-- email -->
            <div class="form-input-title">Email</div>
            <input type="text" name="email" placeholder="Email" id="email" class="email" value="<?php echo $data['email'];?>" >
            <span class="form-invalid"><?php echo $data['email_err'];?></span>

            
            <!-- submit button -->
            <br>
            <input type="submit" value="Receive Email" class="form-btn">
              
        </form>
        
        <?php flash('reset');?>
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?>