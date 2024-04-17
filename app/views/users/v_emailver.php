<?php require APPROOT.'/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_emailver.css">
<div class = "bg345">
    <div class="verification-message">
    <img src="../public/img/login/10507049.png" alt="Verification Image" class="ver-image"> <!-- Add your image here -->
        <p class="verification-text">Please verify your email!</p>
        <p>You're almost there! We sent an email to <br><strong>eg@gmail.com</strong>.</p>
        <p></p> <!-- Empty paragraph for space -->
        <p>Just click on the link in that email to complete your signup. If you don’t see it, you may need to <strong>check your spam folder</strong>.</p>
        <p></p> <!-- Empty paragraph for space -->
        <p>Still can't find the email? No problem.</p>
        <button class="resend-button">Resend verification email</button>
    </div>
</div>