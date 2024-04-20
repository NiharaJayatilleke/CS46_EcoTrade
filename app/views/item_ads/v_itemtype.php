<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <!-- <form action="<?php echo URLROOT?>/ItemAds/itemType" method="POST" enctype="multipart/form-data"> -->

        <div class="type-background"></div>
        <!-- <div class="type-container">
            <!-- item_type 
            <div class="type-input-type-title">Please select the item type</div>
            <div class="type-input-type">
            <input type="radio" class="type-radio" id="secondhand" name="item_type" value="secondhand">
            <label for="secondhand"><p class = "type-name">Secondhand Item</label><br>
            </div>
            <br><p> Sell items you no longer need! These are preowned goods from your home. Buyers can contact you directly to purchase your items.</p>
            <div class="type-input-type">
            <input type="radio" class="type-radio" id="recycle" name="item_type" value="recycle">
            <label for="recycle"><p class = "type-name">Recyclable Item</label><br>
            </div>
            <br><p> Ready to recycle? Post items here! These are household items ready to be recycled. A recycle collector will offer a price for your item once you post an ad.</p>

            <button class="continue" type="submit"><i class="fas fa-arrow-right"></i></button>       
        </div> -->

        <div class="type-container">
            <div class="type-input-type" id="secondhand">

                <h2>Secondhand Item</h2>
                <p>Let's find a new home for your cherished household items!</p>
                <!-- <p>Let us assist you in finding a new home for your cherished household items, sell and profit while breathing new life into your pre-loved possessions!</p> -->
            </div>
            <div class="type-input-type" id="recycle">

                <h2>Recyclable Item</h2>
                <p>A simple solution to all your recyclable household items!</p>
                <!-- <p>A simple solution to all your recyclable household items. No matter the size, post your ad and attract recycling collectors.  Once your ad is live, collectors can offer a price for your items, turning your recyclables into profit."</p> -->
            </div>
        </div>
    <!-- </form> -->

    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/item_type.js"></script>
</body>
</html>

<!-- <php require APPROOT.'/views/inc/components/footer.php'; ?> -->