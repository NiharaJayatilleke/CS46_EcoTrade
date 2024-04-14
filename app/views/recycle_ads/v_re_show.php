<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php 
if($_SESSION['user_type'] != 'moderator') {
    require APPROOT . '/views/inc/components/topnavbar.php';
}
?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/v_buyer_view.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/seller_only_styles.css">

<div class="sad-main-container1">
    <div class="sad-main2"></div>
        <div class = "sad-item-name"><h1><?php echo $data['ad']->item_name ?><h1></div>
        <div class = "sad-p1"><p>Posted on <?php echo $data['ad']->created_at ?></p></div>

        <div class="sad-container2">
        <div class="sad-left-container">
        
            <div class="sad-big-photo">
                <!-- <img class="sad-ad-img" src="<php echo URLROOT?>/public/img/items/<php echo $data['ad']->item_image ?>" alt="Ad Image"> -->
                <a href="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" data-lightbox="sad-ad-img">
                    <img class="sad-ad-img" src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image">
                </a>
            </div>
            <div class="sad-small-images">
                <!-- <img id="s1" src="productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')"> -->
                <!-- <img id="s1" src="<php echo URLROOT?>/public/img/prodetails/productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')">

                <img id="s2" src="<php echo URLROOT?>/public/img/prodetails/productDetails2.jpeg" alt="Small Image 2" onclick="displayBigImage('/pics/productDetails2.jpeg')"> -->
                <!-- Add more small images as needed -->
            </div>
            <div class="sad-desMain">
                <div class="sad-heading">
                    <!-- <div class = "sad-price"><h2>Rs. <php echo $data['ad']->item_price ?></h2></div> -->
                    <div class = "sad-details">
                    <!-- <div class = "sad-condition">Condition: <php echo $data['ad']->item_condition ?></div> -->
                    <p>Quantity: 1</p>
                    <br>
                    </div>
                </div>

                <div class="sad-description">
                    <div class="sad-desHead">
                        <h3> Product Description</h1>
                    </div>
                    <div class="sad-desP">
                        <?php echo $data['ad']->item_desc ?>
                    </div>
                </div>
            </div>

            <div class="sad-line"></div>

            <div class="sad-bottom">
            <!-- <a class="sad-b1" href="#"> -->
                <button class="sad-b1" id = "rateBtn">
                    <!-- <img src="<php echo URLROOT?>/public/img/prodetails/promote.png" alt="promote"> -->
                    <!-- <i class="fas fa-ad"></i> Ad icon -->
                    <i class="fas fa-star"></i>
                    <p>Rate this Seller</p>
                </button>
            <!-- </a> -->
                <button class="sad-b1" onclick="reportAd()">
                    <!-- <img src="<?php echo URLROOT?>/public/img/prodetails/report.png" alt="report"> -->
                    <i class="fas fa-flag"></i>
                    <p>Report this Ad</p>
                </button>
                <button class="sad-b1" id="saveAdBtn" onclick=" addToWishList() " >
                    <i class="fas fa-heart" ></i>
                    <p>Save this Ad</p>
                </button>
                
            </div>
        
    </div>

    <div class="sad-right-container">
        <div class="sad-b3">
            <!-- <img class="sad-i1" src="<?php echo URLROOT?>/public/img/prodetails/merchant.png" alt="merchant"> -->
            <i class="fas fa-store fa-lg"></i>
            <div class="sad-b3-p">
            <p>Sold by <?php echo $data['ad']->seller_name?></p>
            </div>
        </div>

        <div class="sad-b3">
            <!-- <img class="i1" src="<?php echo URLROOT?>/public/img/prodetails/location1.png" alt="location"> -->
            <!-- <i class="fas fa-map-pin"></i> -->
            <i class="fas fa-map-marker-alt fa-lg"></i>
            <div class="sad-b3-p">
            <p><?php echo $data['ad']->item_location?></p>
            </div>
        </div>

        <div class="sad-b3">
            <!-- <img class="sad-b3-i" src="<php echo URLROOT?>/public/img/prodetails/tel.png" alt="telephone"> -->
            <i class="fas fa-phone fa-lg"></i>
            <div class="sad-b3-p">
            <!-- <button id="show-number" class="number" data-number="php echo $data['ad']->number?>"> Click to show phone number</button> -->
            <button id="show-number" class="sad-number" data-number="<?php echo $data['number']?>"> Contact Seller</button>
            <!-- <script>console.log(document.querySelector('#show-number').dataset.number);</script> -->
            </div>
        </div>

        <!-- Update Ad, Remove Ad -->
        <?php if ($_SESSION['user_id'] == $data['ad']->seller_id) : ?>
        <div class="sad-edit-delete">
            <a href = "<?php echo URLROOT?>/RecycleItemAds/edit/<?php echo $data['ad']->r_id?>"><button class="sad-edit-btn" title="edit ad"><i class="fas fa-edit"></i><p>Update Ad</p></button></a>
            <button onclick="confirmDelete('<?php echo URLROOT?>/RecycleItemAds/delete/<?php echo $data['ad']->r_id ?>')" class="sad-delete-btn" title="delete ad"><i class="fas fa-trash-alt"></i><p>Remove Ad</p></button></a>
        </div>
        <?php endif; ?>
    </div>
</div>
</div>

<!-- <br> -->
<div class="sad-main-container2">
<div class="sad-main-container3-left">
<!-- Message Sellers (Q&A) -->
<form method="post">
    <div class = "message-seller-container">
        <div class = "message-header">
            <h3>Message Seller</h3>
        </div>

        <!-- Message Input -->
        <div class = "message-input">
            <input type = "text" class = "message-input-field" name = "send-message" id = "send-message" placeholder = "Type your message here...">
            <!-- <button class = "message-btn" id = "message-btn" type = "submit">Send</button> -->
            <input type="submit" value="Send" class = "message-btn" id = "message-btn"> 
        </div>

        <!-- Testing -->
        <!-- <div id = "test"></div> -->

        <!-- Message Thread -->
        <div id = "results"></div>

    </div>  

</form>
</div>

<div class="sad-main-container3-right">
    <div class="sad-more-ads-title"><h2>Explore more ads</h2></div>

</div>
</div>

<script type ="text/JavaScript">
    var URLROOT ="<?php echo URLROOT; ?>"
    var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
</script>

<!-- JS for messages -->
<!-- <script type="text/JavaScript" src="<php echo URLROOT; ?>/js/ads/message_reply.js"></script> -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/message_load.js"></script>

<!-- JS for buyer messages/notifications -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/buyer_notifs.js"></script>

<!-- JS for other interactions -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/other_interactions.js"></script>

<!-- JS for Reporting Ads -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/report_ad.js"></script>

<!-- JS for rating seller -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/rate_sellers.js"></script>

<?php require APPROOT.'/views/inc/components/footer.php'; ?>


    




