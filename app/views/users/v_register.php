<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="register-form-container" style="margin-top: 10vh"><br>
        <div class="register-form-header">
        <h1><center>Who are you?<center></h1><br>
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
    

    <!--?xml version="1.0" standalone="no"?-->
    <!-- <div class="svg">
        <img class="svg-1" src="<?php echo URLROOT ?>/images/svg-1.png" alt="">
        <img class="svg-2" src="<?php echo URLROOT ?>/images/svg-7.png" alt="">
    </div> -->
<?php require APPROOT.'/views/inc/footer.php'; ?>

