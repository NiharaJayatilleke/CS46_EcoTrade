<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/filter_sidebar.css">    

    <div class="wrapper" >
        <div class="filter-sidebar">
            <!-- <div class="selectheading">Categories</div> -->
            <ul class="indicator" id='category-filter'>
                <li><input type="checkbox" data-filter="furniture">Furniture</li>
                <li><input type="checkbox" data-filter="electronics">Electronics</li>
                <li><input type="checkbox" data-filter="clothing">Clothing</li>
                <li><input type="checkbox" data-filter="books">Books</li>
                <li><input type="checkbox" data-filter="kitchenware">Kitchenware</li>
                <li><input type="checkbox" data-filter="home_deco">Home Deco</li>
                <li><input type="checkbox" data-filter="sportsEquipment">Sports Equipment</li>
                <li><input type="checkbox" data-filter="appliances">Appliances</li>
                <li>
                <label for="otherCategInput">Other Category:</label>
                <input type="text" id="otherCategInput" name="otherCategoryInput" class="item_other_category">
                </li>
            </ul>
            <!-- <div class="selectheading">Price</div> -->
            <div class="filter-price">
                <label for="min-price">Min Price</label>
                <label for="max-price">Max Price</label>
                <input type="text" id="minPrice">
                <input type="text" id="maxPrice">

            </div>
           
            <ul class="indicator" id='condition-filter'>
            
                <li><input type="checkbox" data-filter="Brand New">Brand New</li>
                <li><input type="checkbox" data-filter="Like New">Like New</li>
                <li><input type="checkbox" data-filter="Very Good">Very Good</li>
                <li><input type="checkbox" data-filter="Good">Good</li>
                <li><input type="checkbox" data-filter="Fair">Fair</li>
                <li><input type="checkbox" data-filter="Poor">Poor</li>
            
            </ul>
            <!-- </div> -->
            <!-- </div> -->
            
        </div>
        <div class="ad-right-container">
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
    <?php 
        usort($data['ads'], function($a, $b) {
            // $a_has_pv = isset($a->feature_package) && $a->feature_package == 'PV' && !$a->is_package_over;
            // $b_has_pv = isset($b->feature_package) && $b->feature_package == 'PV' && !$b->is_package_over;
            // return $b_has_pv - $a_has_pv;
            $a_has_pv = isset($a->feature_package) && $a->feature_package == 'PV' && $a->remaining_time > 0;
            $b_has_pv = isset($b->feature_package) && $b->feature_package == 'PV' && $b->remaining_time > 0;
            

            // If both ads have a 'PV' feature that is not over, compare their remaining time
            if ($a_has_pv && $b_has_pv) {
                return $a->remaining_time <=> $b->remaining_time;
            }

            // If only one ad has a 'PV' feature that is not over, that ad should come first
            if ($a_has_pv) return -1;
            if ($b_has_pv) return 1;

            // If neither ad has a 'PV' feature that is not over, their order doesn't matter
            return 0;
            
        });

        // print_r($data['ads']);
        $uniqueIds = array_unique(array_column($data['ads'], 'ad_id'));
        // print_r($uniqueIds);
        $uniqueAds = array_intersect_key($data['ads'], $uniqueIds);

        // usort($data['ads'], function($a, $b) {
        //     $a_has_pv = isset($a->feature_package) && $a->feature_package == 'PV' && $a->remaining_time > 0;
        //     $b_has_pv = isset($b->feature_package) && $b->feature_package == 'PV' && $b->remaining_time > 0;
        //     $a_has_ag = isset($a->feature_package) && $a->feature_package == 'AG';
        //     $b_has_ag = isset($b->feature_package) && $b->feature_package == 'AG';
        
        //     // If both ads have an 'AG' feature, compare their 'PV' features
        //     if ($a_has_ag && $b_has_ag) {
        //         if ($a_has_pv && $b_has_pv) {
        //             return $a->remaining_time <=> $b->remaining_time;
        //         }
        //         if ($a_has_pv) return -1;
        //         if ($b_has_pv) return 1;
        //     }
        
        //     // If only one ad has an 'AG' feature, that ad should come first
        //     if ($a_has_ag) return -1;
        //     if ($b_has_ag) return 1;
        
        //     // If neither ad has an 'AG' feature, compare their 'PV' features
        //     if ($a_has_pv && $b_has_pv) {
        //         return $a->remaining_time <=> $b->remaining_time;
        //     }
        //     if ($a_has_pv) return -1;
        //     if ($b_has_pv) return 1;
        
        //     // If neither ad has a 'PV' feature, their order doesn't matter
        //     return 0;
        // });

        // $uniqueAds = [];
        // foreach ($data['ads'] as $ad) {
        //     $uniqueKey = $ad->ad_id . '-' . $ad->feature_package;
        //     $uniqueAds[$uniqueKey] = $ad;
        // }
        // $data['ads'] = array_values($uniqueAds);
        //>

        foreach($uniqueAds as $ad): ?>
        <!-- foreach($data['ads'] as $ad): > -->
            <a class = "ad-show-link" href="<?php echo URLROOT;?>/ItemAds/show/<?php echo $ad->ad_id?>">
                <div class = "ad-index-container <?php echo (isset($ad->feature_package) && $ad->feature_package == 'PV' && $ad->remaining_time > 0) ? 'ad-pv-package' : '' ?>"
                data-price="<?php echo $ad->item_price ?>"
                data-condition="<?php echo $ad->item_condition ?>"
                data-category="<?php echo $ad->item_category ?>"
                data-condition="<?php echo $ad->item_condition ?>">

                    <div class = "ad-header">
                        <div class = "ad-body-image">
                            <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Ad Image" width="100" height="80">
                        </div>
                        <!-- <php if($ad->seller_id == $_SESSION['user_id']): ?> 
                            <div class = "post-control-btns">
                                <a href = "<php echo URLROOT?>/ItemAds/edit/<?php echo $ad->ad_id?>"><button class="ad-edit-btn" title="edit ad"><i class="fas fa-edit"></i></button></a>
                                <a href = "<php echo URLROOT?>/ItemAds/delete/<?php echo $ad->ad_id?>"><button class="ad-delete-btn" title="delete ad"><i class="fas fa-trash-alt"></i></button></a>
                                <a href = "<php echo URLROOT?>/ItemAds/report/<?php echo $ad->ad_id?>"><button class="ad-report-btn" title="report ad"><i class="fas fa-flag"></i></button></a> 
                            </div>
                        <php endif; ?> -->
                        <div class = "ad-item-name"><h3><?php echo $ad->item_name ?><h3>
                        <?php if (isset($ad->feature_package) && $ad->feature_package == 'AG'): ?>
                            <img src="<?php echo URLROOT?>/public/img/itemAds/hot.jpeg" alt="AG Marker" class="ad-ag-marker";>
                        <?php endif; ?>
                        </div>

                        <div class = "ad-user-name">Seller: <?php echo $ad->seller_name ?></div>
                        <div class = "ad-created-at"><?php echo convertTime($ad->item_created_at); ?></div>
                        <!-- <h3><php echo $ad->item_category ?><h3>
                        <h3><php echo $ad->item_condition ?><h3> -->
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
        <div id="noResults" style="display:none;">
            <h1>No Results Found</h1>
        </div>
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




