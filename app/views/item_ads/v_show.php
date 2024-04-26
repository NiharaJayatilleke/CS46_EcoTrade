<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php 
if($_SESSION['user_type'] != 'moderator') {
    require APPROOT . '/views/inc/components/topnavbar.php';
}
?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/v_buyer_view.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/seller_only_styles.css">
<?php require APPROOT.'/views/inc/header.php'; ?>

  <body>
    <div class="productpart69">
    <div class="desktop">
      <div class="rectangle"></div>
      <div class="rectangle1"></div>
      <div class="rectangle2"></div>
      <div class="frame"></div>
      <div class="frame1"></div>
      <section class="root-chakra-wrapper">
        <div class="root-chakra">
          <div class="rectangle3"></div>
          <div class="rectangle-parent">
          <a href="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" data-lightbox="rectangle-parent">
                    <img class="rectangle-parent" src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image">
                </a>            
                <div class="rectangle4"></div>
            <!--<div class="rectangle-group">-->
           
              <div class="rectangle5"></div>
              <button class="item-details">
                <div class="rectangle6"></div>
                <div class="frame2"></div>
                <div class="item-description">1/6</div>
              </button>
              <div class="frame3"></div>
              <div class="frame4"></div>
            </div>
            <div class="image-gallery">
              <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Image 3" class="image-grid">
              
              
              <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Image 3" alt="Image 3" class="image-grid">
              <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Image 3" alt="Image 3" class="image-grid1">
              <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Image 3" alt="Image 3" class="image-grid2">
              <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Image 3" alt="Image 3" class="image-grid3">
            
          </div>
          <div class="frame5"></div>
          <div class="frame6"></div>
          <div class="frame7"></div>
          <div class="action-area-wrapper">
            <div class="action-area">
              <div class="price-info">
                <div class="vehicle-details">
                  <div class="honda-dio-2018"><?php echo $data['ad']->item_name ?></div>
                  <div class="price-tag">
                    <div class="price-value"></div>
                  </div>
                </div>
                <div class="contact-info">
                  <div class="contact-details">
                    <div class="location-details">
                      <div class="posted-2603"><?php echo $data['ad']->item_created_at ?></div>
                      <div class="kalutara-matugama"><?php echo $data['ad']->item_location?></div>
                    </div>
                    <!-- <div class="views">1050 views</div> -->
                  </div>
                </div>
                <div class="additional-details">
                  <div class="specs-summary">
                    <div class="summary-grid">
                      <div class="summary-pair"></div>
                      <div class="summary-pair1"></div>
                      <div class="vehicle-specs">
                        <div class="specs-pair">
                          <div class="honda"><?php echo $data['ad']->item_condition ?></div>
                          <div class="make">Condition</div>
                        </div>
                        <div class="specs-pair1">
                          <div class="dio"><?php echo $data['ad']->item_quantity ?></div>
                          <div class="model">Quantity</div>
                        </div>
                      </div>
                    </div>
                    <div class="payment-options">
                      <div class="payment-pair"></div>
                      <div class="payment-pair1"></div>
                      <div class="honda-dio-2019">
                      <?php echo $data['ad']->item_desc ?>
                      </div>
                    </div>
                  </div>
                  <!-- <button class="contact-seller"> -->
                    <!-- <div class="rectangle8"></div>
                    <div class="frame8"></div> -->
                    <button id="show-number" class="contact-seller" data-number="<?php echo $data['number']?>">Contact Seller</button>
<!-- 
                    <div class="show-contact">Show contact</div>
                  </button> -->
                </div>
              </div>
              <div class="offer-grid-parent">
                <!-- <div class="offer-grid"></div>
                <div class="offer-grid1"></div>
                <div class="offer-grid2"></div>
                <div class="offer-grid3"></div> -->
                <div class="offer-buttons">
                <!-- <button class="make-offer-button" id="saveAdBtn" onclick=" addToWishList() " >
                    <i class="fas fa-heart" ></i>
                    <p>Save this Ad</p>
                </button> -->
                <!-- <button class="make-offer-button">
                    <div class="rectangle9"></div>
                    <div class="make-an-offer">Make an offer</div>
                  </button> -->
                  <!-- <button class="make-offer-button">
                    <div class="rectangle9"></div>
                    <div class="make-an-offer">Make an offer</div>
                  </button> -->
      <!-- First 'Make an offer' button with unique class -->
<!-- First 'Make an offer' button -->
<!-- First 'Make an offer' button -->
                <button class="make-offer-button button1" id = "rateBtn">
                    <!-- <img src="<php echo URLROOT?>/public/img/prodetails/promote.png" alt="promote"> -->
                    <!-- <i class="fas fa-ad"></i> Ad icon -->
                    
                    <i class="fas fa-star"></i>&nbsp;&nbsp;
                    <p>Rate this Seller</p>
                </button>
<!-- <button class="make-offer-button button1">
  <div class="rectangle9"></div>
  <div class="make-an-offer">Make an offer</div>
</button> -->

<!-- Second 'Make an offer' button -->
                <button class="make-offer-button button2" onclick="reportAd()">
                    <!-- <img src="<//?php echo URLROOT?>/public/img/prodetails/report.png" alt="report"> -->
                    <i class="fas fa-flag"></i>&nbsp;&nbsp;
                    <p>Report this Ad</p>
                </button>
<!-- <button class="make-offer-button button2">
  <div class="rectangle9"></div>
  <div class="make-an-offer">Make an offer</div>
</button> -->

<!-- Third 'Make an offer' button -->
                <button class="make-offer-button button3" id="saveAdBtn" onclick=" addToWishList() " >
                <i class="fas fa-heart"></i>&nbsp;&nbsp;<p>Save this Ad</p>
                </button>
<!-- <button class="make-offer-button button3">
  <div class="rectangle9"></div>
  <div class="make-an-offer">Make an offer</div>
</button> -->


              </div>
            </div>
          </div>
        </div>

  <div class= "messagepart69">
    <div class="macbook-pro-16-1">
      <div class="rectangle-parent">
        <div class="rectangle"></div>
        <div class="rectangle-group365">
          <div class="rectangle1"></div>
          <div class="questions-about-this">
            Questions About This Product (39)
          </div>
        </div>
        <div class="rectangle-container">
          <div class="rectangle2"></div>
          <div class="frame-parent">
            <div class="login-parent">
              <div class="login">Login</div>
              <div class="or-wrapper">
                <div class="or">or</div>
              </div>
              <div class="register">Register</div>
              <div class="to-ask-questions-to-seller-wrapper">
                <div class="to-ask-questions">to ask questions to seller</div>
              </div>
            </div>
            <div class="frame-group">
              <div class="other-questions-answered-by-gl-parent">
                <div class="other-questions-answered">
                  Other questions answered by Global Creations
                </div>
                <div class="div">(39)</div>
              </div>
              <div class="rectangle3"></div>
              <div class="rectangle4"></div>
            </div>
          </div>
          <div class="frame-container">
            <div class="frame-div">
              <div class="group-parent">
                <img
                  class="group-icon"
                  loading="lazy"
                  alt=""
                  src="../../public/img/itemAds/Group1.png"
                />
                

                <div class="meke-stokes-iwarada-parent">
                  <div class="meke-stokes-iwarada">Meke stokes iwarada</div>
                  <div class="chavindu-s-">chavindu s. - 4 days ago</div>
                </div>
              </div>
              <div class="group-group">
                <img
                  class="group-icon1"
                  loading="lazy"
                  alt=""
                  src="../../public/img/itemAds/Group.png"
                />

                <div class="na-sir-parent">
                  <div class="na-sir">na sir</div>
                  <div class="global-creations-">
                    Global Creations - answered within 11 hours
                  </div>
                </div>
              </div>
            </div>
            <div class="rectangle5"></div>
            <div class="rectangle6"></div>
          </div>
          <div class="frame-parent1">
            <div class="group-container">
              <img
                class="group-icon2"
                loading="lazy"
                alt=""
                src="../../public/img/itemAds/Group1.png"
              />

              <div class="meke-blue-light-filter-eka-gan-parent">
                <div class="meke-blue-light">
                  Meke blue light filter eka ganne kohomada
                </div>
                <div class="sameera-r-">Sameera R. - 2 weeks ago</div>
              </div>
            </div>
            <div class="rectangle7"></div>
            <div class="frame-parent2">
              <div class="group-wrapper">
                <img
                  class="group-icon3"
                  loading="lazy"
                  alt=""
                  src="../../public/img/itemAds/Group.png"
                />
              </div>
              <div class="sir-store-ekta-msg-ekk-send-kr-parent">
                <div class="sir-store-ekta">
                  sir store Ekta msg ekk send krnna
                </div>
                <div class="global-creations-1">
                  Global Creations - answered within 42 minutes
                </div>
              </div>
            </div>
            <div class="rectangle8"></div>
          </div>
          <div class="frame-wrapper">
            <div class="frame-parent3">
              <div class="group-parent1">
                <img
                  class="group-icon4"
                  loading="lazy"
                  alt=""
                  src="../../public/img/itemAds/Group1.png"
                />

                <div class="mama-ada-oder-kaloth-april-5ta-parent">
                  <div class="mama-ada-oder">
                    Mama ada oder kaloth april 5ta kalin ganna puluwanda
                  </div>
                  <div class="sameera-3">Sameera - 3 weeks ago</div>
                </div>
              </div>
              <div class="group-parent2">
                <img
                  class="group-icon5"
                  loading="lazy"
                  alt=""
                  src="../../public/img/itemAds/Group.png"
                />

                <div class="normally-3-working-days-sir-parent">
                  <div class="normally-3-working">
                    normally 3 working days sir
                  </div>
                  <div class="global-creations-2">
                    Global Creations - answered within 2 days
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="frame-parent4">
            <div class="rectangle-wrapper">
              <div class="rectangle9"></div>
            </div>
            <div class="rectangle-parent1">
              <div class="rectangle10"></div>
              <div class="div1">1</div>
            </div>
            <div class="rectangle-parent2">
              <div class="rectangle11"></div>
              <div class="div2">2</div>
            </div>
            <div class="rectangle-parent3">
              <div class="rectangle12"></div>
              <div class="div3">3</div>
            </div>
            <div class="rectangle-parent4">
              <div class="rectangle13"></div>
              <div class="div4">4</div>
            </div>
            <div class="wrapper">
              <div class="div5">...</div>
            </div>
            <div class="rectangle-parent5">
              <div class="rectangle14"></div>
              <div class="div6">13</div>
            </div>
            <div class="rectangle-frame">
              <div class="rectangle15"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
      </section>
  
      <div class="contact-options">
        <div class="contact-area">
          <div class="rectangle10"></div>
          <div class="rs-parent">
            <h1 class="rs">Rs. </h1>
            <div class="price-symbol"> <?php echo $data['ad']->item_price ?></div>
          </div>
          <div class="call-back-option">
            <div class="rectangle11"></div>
            <div class="request-call-back">
            <?php if ($data['ad']->negotiable == "yes") : ?>
                        <p class = "sad-neg">Negotiable</p>
                    <?php else : ?>
                        <p class = "sad-neg">Non-Negotiable</p>
                    <?php endif; ?>
                    </div>
            <!-- <div class="request-call-back">Request call back</div> -->
          </div>
        </div>
        <div class="seller-info">
          <div class="seller-details">
            <div class="rectangle12"></div>
            <div class="group"></div>
            <div class="seller-name-area">
              <div class="sudu"><?php echo $data['ad']->seller_name?></div>
            </div>
            <div class="seller-profile">
              <img src="<?php echo URLROOT?>/public/img/prodetails/merchant.png" alt="Image 3" class="profile-picture">

              <div class="profile-actions">
                <div class="action-grid">
                  <div class="action-button">
                    <div class="action-button-icon"></div>
                    <div class="view-seller">View Seller</div>
                  </div>
                  <div class="action-button1">
                    <div class="action-button-icon1"></div>
                    <div class="frame9"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="seller-contact-button">
            <!-- <button id="show-number" class="contact-seller" data-number="<?php echo $data['number']?>">Contact Seller</button> -->

              <button id="show-number1" class="contact-button-area" data-number="<?php echo $data['number']?>">Contact Seller</button>
        

            </div>
            <button class="chat-button">
              <div class="rectangle14"></div>
              <div class="frame11"></div>
              <div class="start-chat">Start chat</div>
            </button>
          </div>
        </div>
        <div class="admin-options">
          <div class="rectangle15"></div>
          <button class="admin-actions">
            <div class="rectangle16"></div>
            <div class="mark-unavailable">Mark unavailable</div>
          </button>
          <button class="admin-actions1" onclick="reportAd()">
            <div class="rectangle17"></div>
            <div class="frame12"></div>
            <div class="report-abuse">Report Abuse</div>
          </button>
        </div>
        <div class="safety-info">
          <div class="rectangle18"></div>
          <div class="safety-title">
            <div class="safety-tips">Safety tips</div>
          </div>
          <div class="avoid-sending-any">Avoid sending any prepayments</div>
          <div class="meet-with-the">
            Meet with the seller at a safe public place
          </div>
          <div class="inspect-what-youre">
            Inspect what you're going to buy to make sure it's what you need
          </div>
          <div class="check-all-the">
            Check all the docs and only pay if you're satisfied
          </div>
        </div>
        <div class="rectangle-container">
          <div class="rectangle19"></div>
          <button class="promo-area">
            <div class="rectangle20"></div>
            <div class="post-ad-like">Post Ad Like This</div>
          </button>
        </div>
      </div>

      <script type ="text/JavaScript">
    var URLROOT ="<?php echo URLROOT; ?>"
    var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
</script>


      <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/message_load.js"></script>

      

<!-- JS for buyer messages/notifications -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/buyer_notifs.js"></script>

<!-- JS for Offers -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/offers.js"></script>

<!-- JS for Bids -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/bids.js"></script>

<!-- JS for other interactions -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/other_interactions.js"></script>

<!-- JS for Reporting Ads -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/report_ad.js"></script>

<!-- JS for rating seller -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/rate_sellers.js"></script>

<script>
    var currentUserId = <?php echo json_encode($_SESSION['user_id']); ?>;
    var sellerId = <?php echo json_encode($data['ad']->seller_id); ?>;
</script>

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

        


    




