<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_prodetails.css">

<div class="main-container1">
    <div class="main2"></div>
        <div class = "item-name"><h1><?php echo $data['ad']->item_name ?><h1></div>
        <div class = "p1"><p>Posted on <?php echo $data['ad']->item_created_at ?></p></div>

        <div class="container2">
        <div class="left-container">
        
            <div class="big-photo">
                <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image" width="100" height="80">
            </div>
            <div class="small-images">
                <!-- <img id="s1" src="productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')"> -->
                <img id="s1" src="<?php echo URLROOT?>/public/img/prodetails/productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')">

                <img id="s2" src="<?php echo URLROOT?>/public/img/prodetails/productDetails2.jpeg" alt="Small Image 2" onclick="displayBigImage('/pics/productDetails2.jpeg')">
                <!-- Add more small images as needed -->
            </div>
            <div class="desMain">
                <div class="heading">
                    <div class = "price"><h1>Rs. <?php echo $data['ad']->item_price ?></h1></div>
                    <p>Negotiable</p>
                    <p>Condition: Brand New</p>
                    <p>Quantity: 1</p>
                </div>

                <div class="description">
                    <div class="desHead">
                        <h3> Product Description</h1>
                    </div>
                    <div class="desP">
                        <?php echo $data['ad']->item_desc ?>
                    </div>
                </div>
            </div>

            <div class="line"></div>

            <div class="bottom">
                <button class="b1">
                    <img src="<?php echo URLROOT?>/public/img/prodetails/promote.png" alt="promote">
                    <p>Promote This Ad</p>
                </button>
                <button class="b1">
                    <img src="<?php echo URLROOT?>/public/img/prodetails/report.png" alt="report">
                    <p>Report This Ad</p>
                </button>
                <button class="b1">
                    <img src="<?php echo URLROOT?>/public/img/prodetails/save.png" alt="report">
                    <p>Save this Ad</p>
                </button>
            </div>
        
    </div>

    <div class="right-container">
        <div class="b1">
            <img class="i1" src="<?php echo URLROOT?>/public/img/prodetails/merchant.png" alt="merchant">
            <div class="b2">
            <p>Sold by <?php echo $data['ad']->seller_name?></p>
            </div>
        </div>

        <div class="b1">
        <img class="i1" src="<?php echo URLROOT?>/public/img/prodetails/location1.png" alt="location">
            <!-- <i class="fas fa-map-marker-alt"></i> -->
            <div class="b2">
            <p><?php echo $data['ad']->item_location?></p>
            </div>
        </div>

        <div class="b3">
            <img class="i1" src="<?php echo URLROOT?>/public/img/prodetails/tel.png" alt="telephone">
            <div class="b2">
            <!-- <button id="show-number" class="number" data-number="<?php echo $data['ad']->number?>"> Click to show phone number</button> -->
            <button id="show-number" class="number" data-number="0771717368"> Contact Seller</button>
            </div>
        </div>
        
        <div class = "btns">
            <!-- offer and bid icons are disabled for seller and only allowed if seller has chosen to -->
            <?php if($data['ad']->negotiable == 'yes'): ?>
                <input type="submit" class="offer" id="make-offer" value="Make Offer" <?php echo ($_SESSION['user_id'] == $data['ad']->seller_id) ? 'disabled' : '' ?>>
            <?php endif; ?>

            <?php if($data['ad']->selling_format == 'auction'): ?>
                <input type="submit" class="bid" id="place-bid" value="Place Bid" <?php echo ($_SESSION['user_id'] == $data['ad']->seller_id) ? 'disabled' : '' ?>>
            <?php endif; ?>
        </div>

        <!-- HTML for displaying the accepted offer price -->
        <br><div class="accepted-offer" style="display: none;">
            <p class="accepted-offer-message">The seller is willing to accept an offer of Rs.<span id="accepted-offer-price"></span></p>
        </div><br>
        
        <!-- HTML for sellers to accept or reject offers -->
        <?php if ($_SESSION['user_id'] == $data['ad']->seller_id && !empty($data['offers'])) : ?>
            <h3>Offers</h3>
            <?php foreach ($data['offers'] as $offer) : ?>
                <div class="offer-details" data-offer-id="<?php echo $offer->offer_id; ?>">
                    <p class="offer-message">New Offer: Rs.<?php echo $offer->offer_amount; ?></p>
                    <button class="accept-offer">Accept</button>
                    <button class="reject-offer">Reject</button>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
            
    </div>
</div>

<br><br>
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

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script type ="text/JavaScript">
    var URLROOT ="<?php echo URLROOT; ?>"
    var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
</script>

<!-- JS for messages -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/messages.js"></script>

<!-- JS for Offers -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/offers.js"></script>

<!-- JS for Bids -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/bids.js"></script>

<!-- JS for other interactions -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/other_interactions.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>


    



