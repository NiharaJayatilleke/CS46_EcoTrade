<?php require APPROOT.'/views/inc/header.php'; ?>
    
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<div class="form-container" style="margin-top: 10vh;">
    <h1>Sign up</h1>
    <?php if (!empty($data['err'])){?>
        <div class="error-msg">
            <span class="form-invalid"><?php echo $data["err"] ?></span>
        </div>
    <?php } ?>

    <form action="<?php echo URLROOT ?>/Users/recycleSellerRegister" method="post">
        <!-- Username -->
        <input type="text" name="username" id="username" class="username" required value="<?php echo $data['username'] ?>" placeholder="Username" />

        <!-- Name -->
        <input type="text" name="name" id="name" class="name" required value="<?php echo $data['name'] ?>" placeholder="Name" />

        <!-- Email -->
        <input type="email" name="email" id="email" class="email" required value="<?php echo $data['email'] ?>" placeholder="Email" />

        <!-- Contact number -->
        <input type="text" name="contact_no" id="contact_no" class="contact_no"required value="<?php echo $data['contact_no'] ?>" placeholder="Contact number" />

        <!-- Password -->
        <input type="password" name="password" id="password" class="password" required placeholder="Password" />

        <!-- Password Strength Indicator -->
        <div class="strength-text" id="strength-text"></div>

        <!-- Confirm Password -->
        <input type="password" name="confirm_password" id="confirm_password" class="confirm_password" required placeholder="Confirm Password" />

        <br><br>

        <!-- Submit -->
        <input type="submit" value="Sign Up" class="form-btn">

    </form>

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
