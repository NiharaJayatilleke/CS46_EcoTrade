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
            <option value="" <?php echo $data['item_category'] == '' ? 'selected' : ''; ?>>Select a category</option>
            <option value="furniture" <?php echo $data['item_category'] == 'furniture' ? 'selected' : ''; ?>>Furniture</option>
            <option value="electronics" <?php echo $data['item_category'] == 'electronics' ? 'selected' : ''; ?>>Electronics</option>
            <option value="clothing" <?php echo $data['item_category'] == 'clothing' ? 'selected' : ''; ?>>Clothing</option>
            <option value="books" <?php echo $data['item_category'] == 'books' ? 'selected' : ''; ?>>Books</option>
            <option value="kitchenware" <?php echo $data['item_category'] == 'kitchenware' ? 'selected' : ''; ?>>Kitchenware</option>
            <option value="home_deco" <?php echo $data['item_category'] == 'home_deco' ? 'selected' : ''; ?>>Home Deco</option>
            <option value="sportsEquipment" <?php echo $data['item_category'] == 'sportsEquipment' ? 'selected' : ''; ?>>Sports Equipment</option>
            <option value="appliances" <?php echo $data['item_category'] == 'appliances' ? 'selected' : ''; ?>>Appliances</option>
            <option value="other" <?php echo $data['item_category'] == 'other' ? 'selected' : ''; ?>>Other</option>
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
            <textarea name="item_desc" 
                placeholder = "Eg: The coffee table, used for three years, showcases minor scratches but remains sturdy and fully functional, has a convenient lower shelf. Crafted from solid wood with regular cleaning, it's sold as is." 
            id="item_desc" class="ad_item_desc" rows = "10" cols = "59"><?php echo $data['item_desc']; ?></textarea>
            <!-- placeholder="Your item's story, your sale's success!  -->
            <!-- "You can include details such as,&#13;&#10;&#13;&#10; Physical appearance: Scratches, dents, wear.&#13;&#10;&#13;&#10; Functionality: Fully operational or any issues.&#13;&#10;&#13;&#10; Features, measurements, material, age and packaging."  -->
            <!-- "Eg: The coffee table, used for three years, showcases minor scratches but remains sturdy and fully functional, has a convenient lower shelf. Crafted from solid wood with regular cleaning, it's sold as is." -->

            <!-- item_condition -->
            <div class="ad-form-input-title">Condition</div>
            <!-- <input type="text" name="item_condition" id="item_condition" class="ad_item_condition" value="<?php echo $data['item_condition']; ?>"> -->
            <select name="item_condition" id="item_condition" class="ad_item_condition">
            <option value="" <?php echo $data['item_condition'] == '' ? 'selected' : ''; ?>>Select the condition</option>
                <option value="Brand New" <?php echo $data['item_condition'] == 'Brand New' ? 'selected' : ''; ?>>Brand New - Never Used</option>
                <option value="Like New" <?php echo $data['item_condition'] == 'Like New' ? 'selected' : ''; ?>>Like New - Barely Used</option>
                <option value="Very Good" <?php echo $data['item_condition'] == 'Very Good' ? 'selected' : ''; ?>>Very Good - Slightly Used with Minor Signs of Wear</option>
                <option value="Good" <?php echo $data['item_condition'] == 'Good' ? 'selected' : ''; ?>>Good - Used with Some Signs of Wear</option>
                <option value="Fair" <?php echo $data['item_condition'] == 'Fair' ? 'selected' : ''; ?>>Fair - Used with Visible Signs of Wear</option>
                <option value="Poor" <?php echo $data['item_condition'] == 'Poor' ? 'selected' : ''; ?>>Poor - Heavily Used with Significant Wear or Damages</option>
            </select>
            <span class="ad-form-invalid"><?php echo $data['item_condition_err']; ?></span>

            <!-- quantity -->
            <div class="ad-form-input-title">Quantity</div>
            <input type="number" name="item_quantity" id="item_quantity" class="ad_item_quantity" value="<?php echo $data['item_quantity']; ?>" >
            <span class="ad-form-invalid"><?php echo $data['item_quantity_err']; ?></span>

            <div class="ad-form-input-title">Upload Images (min:1, max:6)</div>
            <!-- item images -->
            <div class = "ad-form-drag-area" id="form-drag-area">
                <div class = "ad-icon">
                    <div id="image_container"></div> <!-- New image container -->
                    <img id = "item_img_placeholder" src = "" alt="placeholder"><i id = "item_img_placeholder_icon" class="fas fa-image fa-5x"></i></img>
                    <!-- <i id = "item_img_placeholder" class="fas fa-image fa-5x"></i> -->
                </div> 
                <div class="ad-form-drag-area-text">Drag and drop files here</div>
                <div class="ad-form-drag-area-or">or</div>
                <div class="ad-form-drag-area-btn">Browse Files</div>
                    <!-- <input type="file" name="item_images" id="item_images" class="ad_item_images" style ="display:none"> -->
                    <input type="file" name="item_images[]" id="item_images" class="ad_item_images" style ="display:none" multiple>
                
                <div class="ad-form-validation">
                    <span class="ad-form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div>

            <script>
                document.getElementById('item_images').addEventListener('change', function() {
                    if (this.files.length > 6) {
                        alert('You can only upload a maximum of 6 files');
                        this.value = '';
                    }
                });
            </script>

            <!-- ADDITIONAL IMAGES -->
            <!-- <div class="ad-form-input-title">Upload Additional Images</div> -->

            <div class = "ad-additional-images">
            <!-- additional image 1 
            <div class = "ad-form-drag-area1" id="form-drag-area1">
                <div class = "ad-icon">
                    <img id = "item_img_placeholder1" src = "" alt="placeholder"><i id = "item_img_placeholder_icon1" class="fas fa-image fa-5x"></i></img>
                    <!-- <i id = "item_img_placeholder" class="fas fa-image fa-5x"></i> 
                </div> 
                <div class="ad-form-drag-area-text1">Drag and drop</div>
                <div class="ad-form-drag-area-or">or</div>
                <div class="ad-form-drag-area-btn1">Browse</div>
                    <input type="file" name="item_images" id="item_images1" class="ad_item_images" style ="display:none">
                
                <div class="ad-form-validation">
                    <span class="ad-form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div>

            <!-- additional image 2 
            <div class = "ad-form-drag-area1" id="form-drag-area">
                <div class = "ad-icon">
                    <img id = "item_img_placeholder" src = "" alt="placeholder"><i id = "item_img_placeholder_icon" class="fas fa-image fa-5x"></i></img>
                    <!-- <i id = "item_img_placeholder" class="fas fa-image fa-5x"></i> 
                </div> 
                <div class="ad-form-drag-area-text">Drag and drop</div>
                <div class="ad-form-drag-area-or">or</div>
                <div class="ad-form-drag-area-btn">Browse</div>
                    <input type="file" name="item_images" id="item_images" class="ad_item_images" style ="display:none">
                
                <div class="ad-form-validation">
                    <span class="ad-form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div>

            <!-- additional image 3 
            <div class = "ad-form-drag-area1" id="form-drag-area">
                <div class = "ad-icon">
                    <img id = "item_img_placeholder" src = "" alt="placeholder"><i id = "item_img_placeholder_icon" class="fas fa-image fa-5x"></i></img>
                    <!-- <i id = "item_img_placeholder" class="fas fa-image fa-5x"></i> 
                </div> 
                <div class="ad-form-drag-area-text">Drag and drop</div>
                <div class="ad-form-drag-area-or">or</div>
                <div class="ad-form-drag-area-btn">Browse</div>
                    <input type="file" name="item_images" id="item_images" class="ad_item_images" style ="display:none">
                
                <div class="ad-form-validation">
                    <span class="ad-form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div> -->
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

            <!-- ad expiry -->
            <div class="ad-form-input-title">For how long do you wish to keep this ad?</div>
            <select name="item_expiry" id="item_expiry" class="ad_item_expiry">
            <option value="" <?php echo $data['item_expiry'] == '' ? 'selected' : ''; ?>>Select the duration</option>
            <option value="1" <?php echo $data['item_expiry'] == '1 month' ? 'selected' : ''; ?>>1 month</option>
            <option value="2" <?php echo $data['item_expiry'] == '2 months' ? 'selected' : ''; ?>>2 months</option>
            <option value="3" <?php echo $data['item_expiry'] == '3 months' ? 'selected' : ''; ?>>3 months</option>
            </select>
            <span class="ad-form-invalid"><?php echo $data['item_expiry_err']; ?></span>

            <!-- submit button -->
            <input type="submit" value="Post Ad" class="ad-form-btn">
            
        </form>
    </div>
    </div>

<!-- Javascript for image upload -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/image_upload.js"></script>

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

<!--  <php require APPROOT.'/views/inc/components/footer.php'; ?>  -->

</body>
</html>


