<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <h2>Hi <?php echo $_SESSION['user_name']; ?>, Welcome to the Secondhand Marketplace</h2>
    <h2>View our Ads here</h2>

    <?php foreach($data['ads'] as $ad): ?>
    <div class = "ad-index-container">
        <div class = "ad-header">
            <div class = "ad-user-name"><?php echo $ad->user_name ?></div>
            <div class = "ad-created-at"><?php echo $ad->item_created_at ?></div>
            <div class = "ad-item-name"><h2><?php echo $ad->item_name ?><h2></div>
        </div>
        <div class = "ad-body">
            <div class = "ad-body-desc"><?php echo $ad->item_desc ?></div>
        </div>
        <div class = "ad-footer">
            <div class = "ad-price"><?php echo $ad->item_price ?></div>
            <?php if($ad->user_id == $_SESSION['user_id']): ?> 
                <div class = "post-control-btns">
                    <a href = "<?php echo URLROOT?>/Item_Ads/edit/<?php echo $ad->ad_id?>"><button class="ad-edit-btn">EDIT</button></a>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php endforeach; ?>

<?php require APPROOT.'/views/inc/footer.php'; ?>


    <!-- <div class = "ad-index-container">
        <div class = "ad-header">
            <div class = "ad-header-title"><h2>Sofa<h2></div> 
        </div>
        <div class = "ad-body">
            <div class = "ad-body-image">
                <a href=""><img src="../public/img/ad_image.jpg" alt="sofa ad" width="400" height="300"></a>
            </div>
            <div class = "ad-body-desc">This sofa features plush cushioning and a timeless design that complements any interior decor. The durable upholstery has gracefully withstood the test of time, providing a comfortable and inviting seating area. With plenty of life left, this pre-owned sofa offers an affordable yet charming way to enhance the ambiance of your home. It's the perfect choice for those seeking both relaxation and a touch of elegance in their living room."</div>
        </div>
        <div class = "ad-footer">
            <div class = "ad-price">Rs. 50,000</div>
        </div>
    </div> -->