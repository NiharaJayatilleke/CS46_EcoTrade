<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="bgrc">
        <img loading="lazy" src="../public/img/recenters/laptop-1205256_1280.jpg" class="img-765" />
        <div class="ad-background1">
            <div class="ad-container1">
                <div class="ad-form-header1">
                    <center><h2>Edit Your Ad</h2></center>
                </div>

                <form action="<?php echo URLROOT; ?>/RecycleCenters/editAd/<?php echo $data['ad_id']; ?>" method="POST" enctype="multipart/form-data">
                    <!-- Display item category without allowing changes -->
                    <div class="ad-form-input-title1">Category</div>
                    <input type="text" class="ad_item_category1" value="<?php echo $data['item_category']; ?>" disabled>

                    <!-- item_description -->
                    <div class="ad-form-input-title1">Description</div>
                    <textarea name="item_desc" placeholder="Your item's story, your sale's success!" id="item_desc" class="ad_item_desc" rows="10" cols="59"><?php echo $data['item_desc']; ?></textarea>

                    <!-- location -->
                    <div class="ad-form-input-title1">Location</div>
                    <input type="text" name="item_location" id="item_location" class="ad_item_location1" value="<?php echo $data['item_location']; ?>" >
                    <span class="ad-form-invalid"><?php echo $data['item_location_err']; ?></span>

                    <!-- Quantity -->
                    <div class="ad-form-input-title1">Quantity</div>
                    <input type="text" name="item_quantity" id="item_quantity" class="ad_item_quantity1" value="<?php echo $data['item_quantity']; ?>" >
                    <span class="ad-form-invalid"><?php echo $data['item_quantity_err']; ?></span>

                    <!-- submit button -->
                    <input type="submit" value="Update Ad" class="ad-form-btn1">
                </form>
            </div>
        </div>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?> 
