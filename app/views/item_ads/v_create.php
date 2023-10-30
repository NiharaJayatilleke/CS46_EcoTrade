<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="ad-container">
        <div class="form-header">
        <center><h2>Fill up the form to post your ad</h2></center>
        </div>

        <form action="<?php echo URLROOT?>/Item_Ads/itemAd" method="POST">
            <!-- item_name -->
            <div class="form-input-title">Item Name</div>
            <input type="text" name="item_name" id="item_name" class="item_name" value="<?php echo $data['item_name']; ?>">
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
                <option value="other">Other</option>
            </select>

            <!-- <input type="text" name="item_category" id="item_category" class="item_category" value="<?php echo $data['item_category']; ?>"> -->
            <span class="form-invalid"><?php echo $data['item_category_err']; ?></span>

            <!-- item_description -->
            <div class="form-input-title">Description</div>
            <textarea name="item_desc" placeholder="Your item's story, your sale's success!" id="item_desc" class="item_desc" value="<?php echo $data['item_desc']; ?>" rows = "10" cols = "59"></textarea>

            <p>Upload Photos</p><br>

            <!-- price -->
            <div class="form-input-title">Price</div>
            <input type="text" name="item_price" id="item_price" class="item_price" value="<?php echo $data['item_price']; ?>" >
            <span class="form-invalid"><?php echo $data['item_price_err']; ?></span>

            <!-- location -->
            <div class="form-input-title">Location</div>
            <input type="text" name="item_location" id="item_location" class="item_location" value="<?php echo $data['item_location']; ?>" >
            <span class="form-invalid"><?php echo $data['item_location_err']; ?></span>


            <!-- RADIO BUTTONS: WILL BE UPDATED SOON -->
            <!-- Is the Item open for Auction(bidding)? 
            <div class="form-input-title">Please select your preferred way of selling</div>
            <input type="radio" name="selling_format" id="auction" class="selling_format" value="<?php echo $data['auction']; ?>">
            <label for="auction">Auction</label>
            <input type="radio" name="selling_format" id="buy_now" class="selling_format" value="<?php echo $data['buy_now']; ?>">
            <label for="buy_now">Buy It Now</label><br>
            <span class="form-invalid"><?php echo $data['selling_format_err']; ?></span>

             Is the price negotiable? 
            <input type="checkbox" name="negotiable" id="negotiable" class="negotiable" value="<?php echo $data['negotiable']; ?>">
            <label for="negotiable"> Yes</label> 

            <div class="form-input-title">Is the price negotiable?</div>
            <input type="radio" name="negotiable" id="yes" class="negotiable" value="<?php echo $data['yes']; ?>">
            <label for="yes">Yes</label>
            <input type="radio" name="negotiable" id="no" class="snegotiable" value="<?php echo $data['no']; ?>">
            <label for="no">No</label><br> 
            span class="form-invalid"><?php echo $data['negotiable_err']; ?></span> -->
          
            


            <!-- WITHOUT RADIO BUTTONS -->
            <div class="form-input-title">Please enter your preferred way of selling</div>
            <input type="text" name="selling_format" id="selling_format" class="selling_format" value="<?php echo $data['selling_format']; ?>" >
            <span class="form-invalid"><?php echo $data['selling_format_err']; ?></span>

            <div class="form-input-title">Is the price negotiable?</div>
            <input type="text" name="negotiable" id="negotiable" class="negotiable" value="<?php echo $data['negotiable']; ?>" >
            <span class="form-invalid"><?php echo $data['negotiable_err']; ?></span> 

            <!-- submit button -->
            <input type="submit" value="Post Ad" class="form-btn">
            
        </form>
    </div>

<?php require APPROOT.'/views/inc/footer.php'; ?>