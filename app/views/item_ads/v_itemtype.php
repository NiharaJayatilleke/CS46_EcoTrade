<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <form action="<?php echo URLROOT?>/ItemAds/itemType" method="POST" enctype="multipart/form-data">

        <div class="type-container">
            <!-- item_type -->
            <div class="input-type-title">Please select the item type</div>
            <input type="radio" id="secondhand" name="item_type" value="secondhand">
            <label for="secondhand">Secondhand Item</label><br>
            <input type="radio" id="recycle" name="item_type" value="recycle">
            <label for="recycle">Recyclable item</label><br>

            <button class="continue" type="submit"><i class="fas fa-arrow-right"></i></button>       
        </div>

    <?php require APPROOT.'/views/inc/components/footer.php'; ?>