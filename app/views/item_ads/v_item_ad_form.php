<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="form-container">
        <div class="form-header">
        <center><h1>Fill up the from to post your ad</h1></center>
        <!-- <p><b>Welcome to EcoTrade! Please sign up to continue.</b></p> -->
        </div>
        <form action="<?php echo URLROOT?>/ItemAds/itemAd" method="POST">
            <!-- item_name -->
            <div class="form-input-title">Item Name</div>
            <input type="text" name="item_name" id="item_name" class="item_name" value="<?php echo $data['item_name']; ?>">
            <span class="form-invalid"><?php echo $data['item_name_err']; ?></span>

            <!-- item_category -->
            <div class="form-input-title">Category</div>
            <input type="text" name="item_category" id="item_category" class="item_category" value="<?php echo $data['item_category']; ?>">
            <span class="form-invalid"><?php echo $data['item_category_err']; ?></span>

            <!-- item_description -->
            <div class="form-input-title">Description</div>
            <input type="text" name="item_desc" placeholder="Your item's story, your sale's success!" id="item_desc" class="item_desc" value="<?php echo $data['item_desc']; ?>">
            <!-- <span class="form-invalid"><?php echo $data['item_desc_err']; ?></span> -->

            <!-- price -->
            <div class="form-input-title">Price</div>
            <input type="text" name="item_price" id="item_price" class="item_price" value="<?php echo $data['item_price']; ?>" >
            <span class="form-invalid"><?php echo $data['item_price_err']; ?></span>

            <!-- location -->
            <div class="form-input-title">Location</div>
            <input type="text" name="item_location" id="item_location" class="item_location" value="<?php echo $data['item_location']; ?>" >
            <span class="form-invalid"><?php echo $data['item_location_err']; ?></span>

            <!-- submit button -->
            <input type="submit" value="Post Ad" class="form-btn">
            
        </form>
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?>