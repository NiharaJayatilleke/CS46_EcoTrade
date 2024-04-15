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
            <br><p> Sell items you no longer need! These are preowned goods from your home. Buyers can contact you directly to purchase your items.</p>
            <div class="type-input-type">
            <input type="radio" class="type-radio" id="recycle" name="item_type" value="recycle">
            <label for="recycle"><p class = "type-name">Recyclable Item</label><br>
            </div>
            <br><p> Ready to recycle? Post items here! These are household items ready to be recycled. A recycle collector will offer a price for your item once you post an ad.</p>

            <button class="continue" type="submit"><i class="fas fa-arrow-right"></i></button>       
        </div>
    </form>
</body>
</html>

<!-- <php require APPROOT.'/views/inc/components/footer.php'; ?> -->