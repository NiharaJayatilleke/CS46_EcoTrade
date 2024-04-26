<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    
    <div class="login-form-container">
    <div class="login-form-header">
    <center><h1>Reset Password </h1></center><br>
    </div>
    <form method="POST" >
    <!-- <form method="POST" action="<?php echo URLROOT; ?>/ForgotPassword/reset_password?selector=<?php echo $data['selector']; ?>&validator=<?php echo $data['validator']; ?>"> -->

    <!-- <input type="hidden" name="type" value="reset" /> -->
    <div class="form-input-title">New password</div>
    <input type="password" name="newPassword" placeholder="New password">
    <!-- <span class="form-invalid"><?php echo isset($data['errors']['newPassword']) ? $data['errors']['newPassword'] : '';?></span> -->
    <!-- <span class="form-invalid"><?php echo isset($errors['newPassword']) ? $errors['newPassword'] : '';?></span> -->
    <span class="form-invalid"><?php echo isset($data['errors']['newPassword']) ? $data['errors']['newPassword'] : '';?></span>

    <br>
    <div class="form-input-title">Confirm password</div>
    <input type="password" name="confirmPassword" placeholder="Confirm password">
    <span class="form-invalid"><?php echo isset($data['errors']['confirmPassword']) ? $data['errors']['confirmPassword'] : '';?></span>
    <!-- <span class="form-invalid"><?php echo isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '';?></span> -->
    <input type="submit" value="Reset Password" class="form-btn"> 
    

    </form>
    <?php flash('newReset');?>
    </div>
</body>
</html>
            
