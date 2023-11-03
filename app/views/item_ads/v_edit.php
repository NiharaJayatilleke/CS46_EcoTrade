<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="ad-container">
        <div class="form-header">
        <center><h2>Edit Ad</h2></center>
        </div>

        <form action="<?php echo URLROOT?>/Item_Ads/edit/<?php echo $data['p_id']; ?>" method="POST" enctype="multipart/form-data">
            <!-- item_name -->
            <div class="form-input-title">Item Name</div>
            <input type="text" name="item_name" id="item_name" class="item_name" value="<?php echo $data['item_name']; ?>" readonly>
            <span class="form-invalid"><?php echo $data['item_name_err']; ?></span>

            <!-- item_category -->
            <div class="form-input-title">Category</div>
            <!-- <label for="item_category">Item Category  </label> -->
            <select name="item_category" id="item_category" class="item_category">
                <option value="furniture">Furniture</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="books">Books</option>
                <option value="kitchenware">Kitchenware</option>
                <option value="home_deco">Home Deco</option>
                <option value="sports_equip">Sports Equipment</option>
                <option value="appliances">Appliances</option>
                <option value="other">Other</option>
            </select>

            <!-- <input type="text" name="item_category" id="item_category" class="item_category" value="<?php echo $data['item_category']; ?>"> -->
            <span class="form-invalid"><?php echo $data['item_category_err']; ?></span>

            <!-- item_description -->
            <div class="form-input-title">Description</div>
            <textarea name="item_desc" placeholder="Your item's story, your sale's success!" id="item_desc" class="item_desc" rows = "10" cols = "59"><?php echo $data['item_desc']; ?></textarea>

            <p>Upload an Image</p>
            <!-- item images -->
            <div class = "form-drag-area" id="form-drag-area">
                <div class = "icon">
                    <?php if($data['item_img_name'] != null): ?>
                        <img id = "item_img_placeholder" name = "item_images" src = "<?php echo URLROOT; ?>/img/items/<?php echo $data['item_img_name']; ?>" alt="Item Image" width = "40px" height = "40px"></img>
                    <?php else: ?> 
                        <img id = "item_img_placeholder" src = "<?php echo URLROOT; ?>/img/items/placeholder.png" alt="placeholder" width = "40px" height = "40px"></img>
                    <?php endif; ?>
                </div>
                <div class="form-drag-area-text">Drag and drop files here</div>
                <div class="form-drag-area-or">or</div>
                <div class="form-drag-area-btn">Browse Files</div>
                    <input type="file" name="item_images" id="item_images" class="item_images" style ="display:none">
                
                <div class="form-validation">
                    <span class="form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div>

            <!-- price -->
            <div class="form-input-title">Price</div>
            <input type="number" name="item_price" id="item_price" class="item_price" value="<?php echo $data['item_price']; ?>" >
            <span class="form-invalid"><?php echo $data['item_price_err']; ?></span>

            <!-- location -->
            <div class="form-input-title">Location</div>
            <input type="text" name="item_location" id="item_location" class="item_location" value="<?php echo $data['item_location']; ?>" >
            <span class="form-invalid"><?php echo $data['item_location_err']; ?></span>

            <!-- selling_format -->
            <div class="form-input-title">Please select your preferred way of selling</div>
            <input type="radio" name="selling_format" id="auction" class="selling_format" value="auction" <?php if ($data['selling_format'] === 'auction') { echo 'checked'; } ?>>
            <label for="auction">Auction</label>
            <input type="radio" name="selling_format" id="buy_now" class="selling_format" value="buy_now" <?php if ($data['selling_format'] === 'buy_now') { echo 'checked'; } ?>>
            <label for="buy_now">Buy It Now</label><br>
            <span class="form-invalid"><?php echo $data['selling_format_err']; ?></span>

            <!-- negotiable -->
            <div class="form-input-title">Is the price negotiable?</div>
            <input type="radio" name="negotiable" id="yes" class="negotiable" value="yes" <?php if ($data['negotiable'] === 'yes') { echo 'checked'; } ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="negotiable" id="no" class="negotiable" value="no" <?php if ($data['negotiable'] === 'no') { echo 'checked'; } ?>>
            <label for="no">No</label><br> 
            <span class="form-invalid"><?php echo $data['negotiable_err']; ?></span>

            <!-- submit button -->
            <input type="submit" value="Update" class="form-btn">
            
        </form>
    </div>

    <!-- Javascript for image upload -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/ads.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>