<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/filter_sidebar.css">    

    <div class="wrapper" >
        <div class="filter-sidebar">
            <ul class="indicator">
                <li><input type="checkbox" data-filter="furniture">Furniture</li>
                <li><input type="checkbox" data-filter="electronics">Electronics</li>
                <li><input type="checkbox" data-filter="clothing">Clothing</li>
                <li><input type="checkbox" data-filter="books">Books</li>
                <li><input type="checkbox" data-filter="kitchenware">Kitchenware</li>
                <li><input type="checkbox" data-filter="home_deco">Home Deco</li>
                <li><input type="checkbox" data-filter="sportsEquipment">Sports Equipment</li>
                <li><input type="checkbox" data-filter="appliances">Appliances</li>

            </ul>
            <div class="filter-condition"></div>

        </div>
        <div class="container">
    <!-- <div class = "user-greeting">
        <p>Hi <b><?php echo $_SESSION['user_name']; ?></b>, Welcome to the Secondhand Marketplace!</p>
    </div>
    <?php flash('post_msg'); ?> -->

    <?php
    if (isset($_SESSION['user_name'])) {
        ?>
        <div class="user-greeting">
            <p>Hi <b><?php echo $_SESSION['user_name']; ?></b>, Welcome to the Secondhand Marketplace!</p>
        </div>
        <?php
    }
    flash('post_msg');
    ?>

    <?php if (!empty($data['ads'])) : ?>
    <div class = "ads-container">
        <?php foreach($data['ads'] as $ad): ?>
            <a class = "ad-show-link" href="<?php echo URLROOT;?>/ItemAds/show/<?php echo $ad->ad_id?>">
                <div class = "ad-index-container <?php echo $ad->item_category ?>">

                    <div class = "ad-header">
                        <div class = "ad-body-image">
                            <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Ad Image" width="100" height="80">
                        </div>
                        <?php if($ad->seller_id == $_SESSION['user_id']): ?> 
                            <div class = "post-control-btns">
                                <a href = "<?php echo URLROOT?>/ItemAds/edit/<?php echo $ad->ad_id?>"><button class="ad-edit-btn" title="edit ad"><i class="fas fa-edit"></i></button></a>
                                <a href = "<?php echo URLROOT?>/ItemAds/delete/<?php echo $ad->ad_id?>"><button class="ad-delete-btn" title="delete ad"><i class="fas fa-trash-alt"></i></button></a>
                                <a href = "<?php echo URLROOT?>/ItemAds/report/<?php echo $ad->ad_id?>"><button class="ad-report-btn" title="report ad"><i class="fas fa-flag"></i></button></a>
                            </div>
                        <?php endif; ?>
                        <div class = "ad-item-name"><h3><?php echo $ad->item_name ?><h3></div>
                        <div class = "ad-user-name">Seller: <?php echo $ad->seller_name ?></div>
                        <div class = "ad-created-at"><?php echo convertTime($ad->item_created_at); ?></div>
                    </div>
                    
                    <div class = "ad-body">
                        <div class = "ad-body-desc"><?php echo $ad->item_desc ?></div>
                        <div class = "ad-price">Rs. <?php echo $ad->item_price ?></div>
                    </div>

                    <div class = "ad-footer">
                        <div>
                            <a href = ""><button class="ad-contact-btn">Contact Seller</button></a>
                            <?php if($ad->negotiable == 'yes'): ?>
                                <a href = ""><button class="ad-offer-btn">Make Offer</button></a>
                            <?php endif; ?>
                            <?php if($ad->selling_format == 'auction'): ?> 
                                <a href = ""><button class="ad-bid-btn">Bid</button></a>
                            <?php endif; ?>
                            <!-- <a href = ""><button class="ad-wishlist-btn"><i class="fas fa-heart"></i></button></a> -->
                            <!-- <a href="#"><button class="ad-wishlist-btn"><img src="/img/icons/wishlist.png" alt="Wishlist Icon"></button></a> -->
                        </div>
                    </div>  
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    </div>
    
    <?php else : ?>
        <div style="font-size: 20px;margin: 30px 50px;">
        <p>No results found for <b>"<?php echo !empty($data['searchQuery']) ? htmlspecialchars($data['searchQuery']) : ''; ?>"</b> .</p>
        <p>Try checking your spelling or use more general terms</p>
        </div>
    <?php endif; ?>
    </div>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>
<script src="<?php echo URLROOT; ?>/js/ads/filter_sidebar.js"></script>


