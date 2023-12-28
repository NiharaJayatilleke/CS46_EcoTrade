<!-- <?php require APPROOT.'/views/inc/header.php'; ?>
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="register-form-container" style="margin-top: 10vh"><br>
        <div class="login-form-header">
        <h1><center>Who are you?<center></h1><br><br>
        </div>
        <?php if (!empty($data['err'])){?>
        <div class="error-msg">
            <span class="form-invalid"><?php echo $data["err"] ?></span>
        </div>
        <?php } ?>

        <div class="type-select">
            <div class="platform1">
            <a href="<?php echo URLROOT ?>/users/pBuyerRegister">
            <input type="submit" value="Secondhand Buyer" class="form-btn1"><br><br>
            </a>

            <a href="<?php echo URLROOT ?>/users/pSellerRegister">
            <input type="submit" value="Secondhand Seller" class="form-btn1"><br><br>
            </a>
            </div>

            <div class="platform2">
            <a href="<?php echo URLROOT ?>/users/rSellerRegister">
            <input type="submit" value="Recycle item Seller" class="form-btn1"><br><br>
            </a>

            <a href="<?php echo URLROOT ?>/users/rCollectorRegister">
            <input type="submit" value="Recycle item Collector" class="form-btn1"><br><br>
            </a>

            <a href="<?php echo URLROOT ?>/users/rCenterRegister">
            <input type="submit" value="Recycle Center" class="form-btn1"><br><br>
            </a>
            </div>
        </div>

        <div class="other-options1">
            <p><center>Do you already have an account?<a href="<?php echo URLROOT ?>/users/login">Login</a></center><br><br></p>
        </div>
    </div>
    
<?php require APPROOT.'/views/inc/footer.php'; ?>
 -->
