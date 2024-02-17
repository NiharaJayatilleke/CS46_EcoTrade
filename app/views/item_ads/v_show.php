<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/v_buyer_view.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/seller_only_styles.css">

<div class="sad-main-container1">
    <div class="sad-main2"></div>
        <div class = "sad-item-name"><h1><?php echo $data['ad']->item_name ?><h1></div>
        <div class = "sad-p1"><p>Posted on <?php echo $data['ad']->item_created_at ?></p></div>

        <div class="sad-container2">
        <div class="sad-left-container">
        
            <div class="sad-big-photo">
                <!-- <img class="sad-ad-img" src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image"> -->
                <a href="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" data-lightbox="sad-ad-img">
                    <img class="sad-ad-img" src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image">
                </a>
            </div>
            <div class="sad-small-images">
                <!-- <img id="s1" src="productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')"> -->
                <!-- <img id="s1" src="<?php echo URLROOT?>/public/img/prodetails/productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')">

                <img id="s2" src="<?php echo URLROOT?>/public/img/prodetails/productDetails2.jpeg" alt="Small Image 2" onclick="displayBigImage('/pics/productDetails2.jpeg')"> -->
                <!-- Add more small images as needed -->
            </div>
            <div class="sad-desMain">
                <div class="sad-heading">
                    <div class = "sad-price"><h2>Rs. <?php echo $data['ad']->item_price ?></h2></div>
                    <div class = "sad-details">
                    <?php if ($data['ad']->negotiable == "yes") : ?>
                        <p class = "sad-neg">Negotiable</p>
                    <?php else : ?>
                        <p class = "sad-neg">Non-Negotiable</p>
                    <?php endif; ?>
                    <div class = "sad-condition">Condition: <?php echo $data['ad']->item_condition ?></div>
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
                <button class="sad-b1">
                    <!-- <img src="<?php echo URLROOT?>/public/img/prodetails/promote.png" alt="promote"> -->
                    <!-- <i class="fas fa-ad"></i> Ad icon -->
                    <i class="fas fa-bullhorn"></i>
                    <p>Promote this Ad</p>
                </button>
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
            <script>console.log(document.querySelector('#show-number').dataset.number);</script>
            </div>
        </div>
        
        <div class = "sad-btns">
            <!-- offer and bid icons are disabled for seller and only allowed if seller has chosen to -->
            <?php if($data['ad']->negotiable == 'yes' && empty($data['accepted_offer'])): ?>
                <!-- <input type="submit" class="offer" id="make-offer" value="Make Offer" php echo ($_SESSION['user_id'] == $data['ad']->seller_id) ? 'disabled' : '' ?>> -->
                <input type="submit" class="offer" id="make-offer" value="Make Offer" <?php echo ($_SESSION['user_id'] == $data['ad']->seller_id) ? 'style="display: none;"' : '' ?>>
            <?php endif; ?>

            <?php if($data['ad']->selling_format == 'auction' && $data['remaining_time'] != 'Auction Ended'):?>
                <button type="button" class="bid" id="place-bid"<?php echo ($_SESSION['user_id'] == $data['ad']->seller_id) ? 'style="display: none;"' : '' ?>>Place Bid</button>
            <?php endif; ?>
        </div>

        <div class = "Offers-Bids">
        <!-- HTML for displaying the accepted offer price -->
        <?php if (isset($data['accepted_offer']->offer_status) == 'accepted') : ?>
            <br><div class="accepted-offer">
                <p class="accepted-offer-message">The seller is willing to accept an offer of Rs.<span id="accepted-offer-price"><?php echo $data['accepted_offer']->offer_amount; ?></span></p>
                <!-- <p class="accepted-offer-message">The seller is willing to accept an offer of Rs.<span id="accepted-offer-price"></span></p> -->
            </div><br>
        <?php endif; ?>
        
        <!-- <div class = "Offers-Bids"> -->
        <!-- HTML for sellers to accept or reject offers -->
        <div class='offers-list'> 
        <!-- php if ($_SESSION['user_id'] == $data['ad']->seller_id && !empty($data['offers'])) : ?> -->
            <!-- php $acceptedOffer = array_search('accepted', array_column($data['offers'], 'offer_status')); ?>  -->
        <?php if ($_SESSION['user_id'] == $data['ad']->seller_id && empty($data['accepted_offer']) && $data['ad']->negotiable == "yes") : ?>
        <?php if (!empty($data['offers'])) : ?>
            <div class="offer-title"><h3>Highest Offers</h3></div>
            <?php 
            $count = 0;
            foreach ($data['offers'] as $offer) : 
                if ($count == 3) break;
            ?>
                <div class="offer-details" data-offer-id="<?php echo $offer->offer_id; ?>">
                    <p class="offer-message">New Offer: Rs.<?php echo $offer->offer_amount; ?></p>
                    <div class="offer-buttons">
                    <button class="accept-offer">Accept</button>
                    <button class="reject-offer">Reject</button>
                    </div>
                </div>
            <?php 
                $count++;
            endforeach; ?>
        <?php endif; ?>
        <?php endif; ?>
        </div>

        <!-- HTML for displaying the bids -->
        <?php if ($data['ad']->selling_format == 'auction' && $_SESSION['user_id'] == $data['ad']->seller_id) : ?>
        <br>
        <div class="offer-title"><h3>Bidding Overview</h3></div>
        <div class="bid-info">
            <p>Time Remaining: <span id="timeRemaining"><?php echo $data['remaining_time'];?> </span></p>
            <div class="bid-stats">
                <p>Number of Bids: <span id="numBids"><?php echo $data['bid_count'];?></span></p>
                <!-- <p>Average Bid Value: Rs. <span id="avgBidValue">3500</span></p> -->
            </div>
            <?php if ($_SESSION['user_id'] == $data['ad']->seller_id && $data['remaining_time'] == 'Auction Ended') : ?>
                <button id="reopenBidding">Reopen Bidding</button><br>
            <?php endif; ?>
        </div>
        <?php endif; ?>
        
        <!-- <h3>Bid Details</h3> -->
        <div ul class="bid-list">
        <?php if ($_SESSION['user_id'] == $data['ad']->seller_id && $data['ad']->selling_format == "auction") : ?>
        <?php if (count($data['bids']) > 0): ?>
            <div class="offer-title"><h3>Highest Bids</h3></div>
            <?php $count = 0;
            foreach ($data['bids'] as $bid) : 
                if ($count == 3) break;
            ?>
                <!-- <php var_dump($bid); ?> -->
                <li class="bid-list-item" id="bid-<?php echo $bid->bid_id; ?>"> Bidder: <?php echo $bid->username; ?> 
                <a href="#" onclick="notifyBidder('<?php echo $bid->username; ?> ', '<?php echo $data['ad']->item_name ?>', '<?php echo $bid->user_id ?>')"><i class="fas fa-envelope"></i></a> | 
                Bid Value: Rs. <?php echo $bid->bid_amount; ?>
                <!-- <a href="#" onclick="return confirm('Are you sure you want to delete this bid? You won\'t be able to view it again once deleted.')"><i class="fas fa-trash"></i></a></li> -->
                <a href="#" id="delete-button" class="delete-button" data-bid-id="<?php echo $bid->bid_id; ?>"><i class="fas fa-trash"></i></a></li>
            <?php 
                $count++;
            endforeach; ?>
        </ul>
        <?php endif; ?>
        <?php endif; ?>
        </div> 
        </div>  
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



<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<!-- SweetAlert2 -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->

<script type ="text/JavaScript">
    var URLROOT ="<?php echo URLROOT; ?>"
    var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
</script>

<!-- JS for messages -->
<!-- <script type="text/JavaScript" src="<php echo URLROOT; ?>/js/ads/message_reply.js"></script> -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/message_load.js"></script>

<!-- JS for Offers -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/offers.js"></script>

<!-- JS for Bids -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/bids.js"></script>

<!-- JS for other interactions -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/other_interactions.js"></script>

<!-- JS for Reporting Ads -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/report_ad.js"></script>

<script>
    const id = <?php echo $data['ad']->ad_id ?>;
    const heartIcon = document.querySelector('#saveAdBtn i');
    
    // ------------------------------Fetch request to check if ad is in wishlist------------------------------
    fetch("http://localhost/ecotrade/Wishlist/isInWishlist", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      credentials: "include",
      body: 'ad_id='+id,
    }).then(response => response.text())
        .then(text => {
            if (text == 1) {
                heartIcon.classList.add('clicked');
            } else {
                heartIcon.classList.remove('clicked');
            }
        }
    )
    .catch((error) => {
        console.error("An error occurred:", error);
    });


    // ---------------------- Fetch request to add ad to wishlist ----------------------
    function addToWishList() {
        heartIcon.classList.toggle('clicked');


        fetch("http://localhost/ecotrade/Wishlist/addToWishList", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        credentials: "include",
        body: 'ad_id='+id,
        }).then(response => response.text())
        .then(text => {console.log(text);})
        .catch((error) => {console.error("An error occurred:", error);});
        
    }


    
</script>


<script>

    

    



    
</script>
<?php require APPROOT.'/views/inc/components/footer.php'; ?>


    



