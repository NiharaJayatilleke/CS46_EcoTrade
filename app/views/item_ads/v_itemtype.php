<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <form action="<?php echo URLROOT?>/ItemAds/itemType" method="POST" enctype="multipart/form-data">

        <div class="type-background"></div>
        <div class="type-container">
            <!-- item_type -->
            <div class="type-input-type-title">Please select the item type</div>
            <div class="type-input-type">
            <input type="radio" class="type-radio" id="secondhand" name="item_type" value="secondhand">
            <label for="secondhand"><p class = "type-name">Secondhand Item</label><br>
            </div>
            <div class="type-input-type">
            <input type="radio" class="type-radio" id="recycle" name="item_type" value="recycle">
            <label for="recycle"><p class = "type-name">Recyclable Item</label><br>
            </div>

            <button class="continue" type="submit"><i class="fas fa-arrow-right"></i></button>       
        </div>

    <!-- <?php require APPROOT.'/views/inc/components/footer.php'; ?> -->