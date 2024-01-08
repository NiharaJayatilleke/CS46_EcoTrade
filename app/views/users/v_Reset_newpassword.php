<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>


<div class="hero2">
    <div class="form-box2">
        
        <form method="POST" >
        <h2 style="text-align: center; font-size: 24px; color: #333; margin-bottom: 40px;">Reset Password</h2>
            <!-- <form method="POST" action="<?php echo URLROOT; ?>/ForgotPassword/reset_password?selector=<?php echo $data['selector']; ?>&validator=<?php echo $data['validator']; ?>"> -->

            <!-- <input type="hidden" name="type" value="reset" /> -->
            <input class="input-field email" type="password" name="newPassword" placeholder="New password">
            <!-- <span class="form-invalid"><?php echo isset($data['errors']['newPassword']) ? $data['errors']['newPassword'] : '';?></span> -->
            <!-- <span class="form-invalid"><?php echo isset($errors['newPassword']) ? $errors['newPassword'] : '';?></span> -->
            <span class="form-invalid"><?php echo isset($data['errors']['newPassword']) ? $data['errors']['newPassword'] : '';?></span>

            <br>
            <input class="input-field email" type="password" name="confirmPassword" placeholder="Repeat new password">
            <span class="form-invalid"><?php echo isset($data['errors']['confirmPassword']) ? $data['errors']['confirmPassword'] : '';?></span>
            <!-- <span class="form-invalid"><?php echo isset($errors['confirmPassword']) ? $errors['confirmPassword'] : '';?></span> -->
            <input type="submit" value="Reset Password" class="submit-btn"> 
        </form>
    </div>  
    <?php flash('newReset');?>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>
