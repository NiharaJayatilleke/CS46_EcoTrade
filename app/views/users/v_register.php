<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>
    <div class="form-container" style="margin-top: 10vh">
        <h1>User Type Selection</h1>
        <?php if (!empty($data['err'])){?>
        <div class="error-msg">
            <span class="form-invalid"><?php echo $data["err"] ?></span>
        </div>
        <?php } ?>

        <div class="type-select">
            <a href="<?php echo URLROOT ?>/users/pBuyerRegister">
                <div class="type-select-btn">
                    Secondhand Buyer
                </div>
            </a>

            <a href="<?php echo URLROOT ?>/users/pSellerRegister">
                <div class="type-select-btn">
                Secondhand Seller
                </div>
            </a>

            <a href="<?php echo URLROOT ?>/users/rSellerRegister">
                <div class="type-select-btn">
                    Recycle item Seller
                </div>
            </a>

            <a href="<?php echo URLROOT ?>/users/rCollectorRegister">
                <div class="type-select-btn">
                Recycle item Collector
                </div>
            </a>

            <a href="<?php echo URLROOT ?>/users/rCenterRegister">
                <div class="type-select-btn">
                Recycle Center
                </div>
            </a>
        </div>

        <div class="other-options">
            <p>If you already have an account? <a href="<?php echo URLROOT ?>/users/login">Login</a></p>
        </div>
    </div>

    <!--?xml version="1.0" standalone="no"?-->
    <!-- <div class="svg">
        <img class="svg-1" src="<?php echo URLROOT ?>/images/svg-1.png" alt="">
        <img class="svg-2" src="<?php echo URLROOT ?>/images/svg-7.png" alt="">
    </div> -->
<?php require APPROOT.'/views/inc/footer.php'; ?>

