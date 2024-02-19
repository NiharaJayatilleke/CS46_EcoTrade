<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="ad-background">
    <div class="ad-container">
        <div class="ad-form-header">
        <center><h2>Let's start building your ad</h2></center>
        </div>

        

        <form action="<?php echo URLROOT?>/ItemAds/itemAd" method="POST" enctype="multipart/form-data">

            <!-- item_name -->
            <div class="ad-form-input-title">Item Name</div>
            <input type="text" name="item_name" id="item_name" class="ad_item_name" value="<?php echo $data['item_name']; ?>">
            <span class="ad-form-invalid"><?php echo $data['item_name_err']; ?></span>

            <!-- item_category -->
            <div class="ad-form-input-title">Category</div>
            <!-- <label for="item_category">Item Category  </label> -->
            <select name="item_category" id="item_category" class="ad_item_category">
                <option value="" selected>Select a category</option>
                <option value="furniture">Furniture</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="books">Books</option>
                <option value="kitchenware">Kitchenware</option>
                <option value="home_deco">Home Deco</option>
                <option value="sportsEquipment">Sports Equipment</option>
                <option value="appliances">Appliances</option>
                <option value="other">Other</option>
            </select>

            <!-- Additional input for 'Other' category -->
            <div id="otherCategory" style="display: none;">
                <label for="otherCategoryInput"><p class = "ad_item_other_label">Please specify the category:</label>
                <input type="text" id="otherCategoryInput" name="otherCategoryInput" class="ad_item_other_category">
            </div>

            <!-- <input type="text" name="item_category" id="item_category" class="item_category" value="<?php echo $data['item_category']; ?>"> -->
            <span class="ad-form-invalid"><?php echo $data['item_category_err']; ?></span>

            <!-- item_description -->
            <div class="ad-form-input-title">Description</div>
            <textarea name="item_desc" placeholder="Your item's story, your sale's success!" id="item_desc" class="ad_item_desc" rows = "10" cols = "59"><?php echo $data['item_desc']; ?></textarea>

            <!-- item_condition -->
            <div class="ad-form-input-title">Condition</div>
            <!-- <input type="text" name="item_condition" id="item_condition" class="ad_item_condition" value="<?php echo $data['item_condition']; ?>"> -->
            <select name="item_condition" id="item_condition" class="ad_item_condition">
                <option value="">Select the condition</option>
                <option value="Brand New">Brand New - Never Used</option>
                <option value="Like New">Like New - Barely Used</option>
                <option value="Very Good">Very Good - Slightly Used with Minor Signs of Wear</option>
                <option value="Good">Good - Used with Some Signs of Wear</option>
                <option value="Fair">Fair - Used with Visible Signs of Wear</option>
                <option value="Poor">Poor - Heavily Used with Significant Wear or Damages</option>
            </select>
            <span class="ad-form-invalid"><?php echo $data['item_condition_err']; ?></span>

            <!-- quantity -->
            <div class="ad-form-input-title">Quantity</div>
            <input type="number" name="item_quantity" id="item_quantity" class="ad_item_quantity" value="<?php echo $data['item_quantity']; ?>" >
            <span class="ad-form-invalid"><?php echo $data['item_price_err']; ?></span>

            <div class="ad-form-input-title">Upload an Image</div>
            <!-- item images -->
            <div class = "ad-form-drag-area" id="form-drag-area">
                <div class = "ad-icon">
                    <img id = "item_img_placeholder" src = "" alt="placeholder"><i id = "item_img_placeholder_icon" class="fas fa-image fa-5x"></i></img>
                    <!-- <i id = "item_img_placeholder" class="fas fa-image fa-5x"></i> -->
                </div> 
                <div class="ad-form-drag-area-text">Drag and drop files here</div>
                <div class="ad-form-drag-area-or">or</div>
                <div class="ad-form-drag-area-btn">Browse Files</div>
                    <input type="file" name="item_images" id="item_images" class="ad_item_images" style ="display:none">
                
                <div class="ad-form-validation">
                    <span class="ad-form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div>

            <!-- price -->
            <div class="ad-form-input-title">Price in LKR</div>
            <input type="number" name="item_price" id="item_price" class="ad_item_price" value="<?php echo $data['item_price']; ?>" >
            <span class="ad-form-invalid"><?php echo $data['item_price_err']; ?></span>

            <!-- location -->
            <div class="ad-form-input-title">Location</div>
            <input type="text" name="item_location" id="item_location" class="ad_item_location" value="<?php echo $data['item_location']; ?>" >
            <span class="ad-form-invalid"><?php echo $data['item_location_err']; ?></span>

            <!-- selling_format -->
            <div class="ad-form-input-title">Preferred way of selling</div>
            <input type="radio" name="selling_format" id="auction" class="ad_selling_format" value="auction" <?php if ($data['selling_format'] === 'auction') { echo 'checked'; } ?>>
            <label for="auction">Auction</label>
            <input type="radio" name="selling_format" id="buy_now" class="ad_selling_format" value="buy_now" <?php if ($data['selling_format'] === 'buy_now') { echo 'checked'; } ?>>
            <label for="buy_now">Buy It Now</label><br>
            <span class="ad-form-invalid"><?php echo $data['selling_format_err']; ?></span>

            <!-- Hidden form for auction details -->
                <div id="auction_details" style="display: <?php echo ($data['selling_format'] === 'auction' || $data['show_auction_fields']) ? 'block' : 'none'; ?>;">
                <!-- <div id="auction_details" style="display: block;"> -->
                    <br><br><label for="duration"><p class = "ad_auction_duration">Auction Duration:</p></label>
                    <select id="duration" name="duration" class="ad_duration">
                        <option value="">Select the duration</option>
                        <option value="1">1 day</option>
                        <option value="3">3 days</option>
                        <option value="5">5 days</option>
                        <option value="7">1 week</option>
                        <option value="14">2 weeks</option>
                        <!-- <option value="30">1 month</option> -->
                    </select>
                    <span class="ad-form-invalid"><?php echo $data['duration_err']; ?></span><br><br>
                    <!-- <label for="end_time">Auction End Time:</label>
                    <input type="datetime-local" id="end_time" name="end_time"><br> -->
                    <label for="starting_bid"><p class="ad_auction_starting_bid">Starting Bid:</p></label>
                    <input type="number" id="starting_bid" name="starting_bid" class="ad_starting_bid"><br>
                    <span class="ad-form-invalid"><?php echo $data['starting_bid_err']; ?></span><br>
                </div>
            

            <!-- negotiable -->
            <!-- <div class="ad-form-input-title">Is the price negotiable? </div> -->
            <div class="ad-form-input-title">Do you wish to accept offers? </div>
            <input type="radio" name="negotiable" id="yes" class="ad_negotiable" value="yes" <?php if ($data['negotiable'] === 'yes') { echo 'checked'; } ?>>
            <label for="yes">Yes</label>
            <input type="radio" name="negotiable" id="no" class="ad_negotiable" value="no" <?php if ($data['negotiable'] === 'no') { echo 'checked'; } ?>>
            <label for="no">No</label><br> 
            <span class="ad-form-invalid"><?php echo $data['negotiable_err']; ?></span><br>

            <!-- submit button -->
            <input type="submit" value="Post Ad" class="ad-form-btn">
            
        </form>
    </div>
    </div>

<!-- Javascript for image upload -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/ads.js"></script>

<!-- Javascript for auction details -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/bidding_details.js"></script>

<script>
    // Get the category select and the 'Other' category input
    var categorySelect = document.getElementById('item_category');
    var otherCategoryInput = document.getElementById('otherCategory');

    // Add an event listener to the category select
    categorySelect.addEventListener('change', function() {
        // If the 'Other' option is selected, show the 'Other' category input
        if (categorySelect.value == 'other') {
            otherCategoryInput.style.display = 'block';
        } else {
            otherCategoryInput.style.display = 'none';
        }
    });
</script>

<!-- <?php require APPROOT.'/views/inc/footer.php'; ?> -->

</body>
</html>

