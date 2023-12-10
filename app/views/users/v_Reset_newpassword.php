<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    
    <div class="login-form-container">
    <div class="login-form-header">
    <center><h1>Reset Password </h1></center><br>
    </div>
    <form method="post" action="<?php echo URLROOT; ?>/forgot_password/resetPassword">
    <input type="hidden" name="type" value="reset" />
    <div class="form-input-title">New password</div>
    <input type="password" name="pwd" placeholder="New password">
    <br>
    <div class="form-input-title">Repeat new password</div>
    <input type="password" name="pwd-repeat" placeholder="Repeat new password">
    <input type="submit" value="Reset Password" class="form-btn">
    </form>
    <?php flash('newReset');?>
    </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
            
