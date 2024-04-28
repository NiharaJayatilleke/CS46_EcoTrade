<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <div class="ad-background">
    <div class="ad-container">
        <div class="ad-form-header">
        <!-- <center><h2>Fill up the form to post your ad</h2></center> -->
        <center><h2>Let's start building your ad</h2></center>
        </div>

        <form action="<?php echo URLROOT?>/RecycleItemAds/recycleItemAd" method="POST" enctype="multipart/form-data">

            <!-- item_name -->
            <div class="ad-form-input-title">Item Name</div>
            <input type="text" name="item_name" id="item_name" class="ad_item_name" value="<?php echo $data['item_name']; ?>">
            <span class="form-invalid"><?php echo $data['item_name_err']; ?></span>

            <!-- item_category -->
            <div class="ad-form-input-title">Category</div>
            <!-- <label for="item_category">Item Category  </label> -->
            <select name="item_category" id="item_category" class="ad_item_category">
            <option value="">Select a category</option>
                <option value="cardboard">Carboard</option>
                <option value="paper">Paper</option>
                <option value="electronics">Electronics</option>
                <option value="glass">Glass</option>
                <option value="plastic">Plastic</option>
                <option value="aluminium">Aluminium</option>
                <option value="wood">Wood</option>
                <option value="metal">Metal</option>
                <option value="clothing">Clothing</option>
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

            <!-- <div class="ad-form-input-title">Upload an Image</div>
            <!-- item images
            <div class = "ad-form-drag-area" id="form-drag-area">
                <div class = "ad-icon">
                    <img id = "item_img_placeholder" src = "<?php echo URLROOT;?>/public/img/itemAds/placeholder.png" alt="placeholder" width = "40px" height = "40px"></img>
                </div> 
                <div class="ad-form-drag-area-text">Drag and drop files here</div>
                <div class="ad-form-drag-area-or">or</div>
                <div class="ad-form-drag-area-btn">Browse Files</div>
                    <input type="file" name="item_images" id="item_images" class="ad_item_images" style ="display:none">
                
                <div class="ad-form-validation">
                    <span class="ad-form-invalid"><?php echo $data['item_images_err']; ?></span>
                </div>
            </div> -->

            <!-- item images -->
            <div class="ad-form-input-title">Upload Images (min:1, max:6)</div>

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

            <!-- price -->
            <!-- <div class="form-input-title">Price</div> 
            <input type="number" name="item_price" id="item_price" class="item_price" value="<?php echo $data['item_price']; ?>" >
            <span class="form-invalid"><?php echo $data['item_price_err']; ?></span>  -->

            <!-- location -->
            <div class="ad-form-input-title">Location</div>
            <input type="text" name="item_location" id="item_location" class="ad_item_location" value="<?php echo $data['item_location']; ?>" >
            <span class="ad-form-invalid"><?php echo $data['item_location_err']; ?></span>

            <!-- District -->
            <!-- <label>Select District <span class="required">*</span></label> -->
            <div class="ad-form-input-title">District</div>                            
                <select name="item_district" id="item_district" class="ad_item_district" >
                    <option value="">Select the district</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Kalutara">Kalutara</option>
                    <option value="Kandy">Kandy</option>
                    <option value="Matale">Matale</option>
                    <option value="Nuwara Eliya">Nuwara Eliya</option>
                    <option value="Galle">Galle</option>
                    <option value="Matara">Matara</option>
                    <option value="Hambantota">Hambantota</option>
                    <option value="Jaffna">Jaffna</option>
                    <option value="Kilinochchi">Kilinochchi</option>
                    <option value="Mannar">Mannar</option>
                    <option value="Vavuniya">Vavuniya</option>
                    <option value="Mullaitivu">Mullaitivu</option>
                    <option value="Batticaloa">Batticaloa</option>
                    <option value="Ampara">Ampara</option>
                    <option value="Trincomalee">Trincomalee</option>
                    <option value="Kurunegala">Kurunegala</option>
                    <option value="Puttalam">Puttalam</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Ratnapura">Ratnapura</option>
                    <option value="Kegalle">Kegalle</option>
                </select>
            

            <br>
            <p>Upon examination of your recyclable items, our dedicated collector will determine a fair and suitable price, taking into consideration the condition and value of the products.</p>

            <!-- submit button -->
            <input type="submit" value="Post Ad" class="ad-form-btn">
            
        </form>
    </div>
    </div>

<!-- Javascript for image upload -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/image_upload.js"></script>

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

<!-- </body>
</html> -->
<?php require APPROOT.'/views/inc/components/footer.php'; ?> 