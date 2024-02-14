
<?php require APPROOT . '/views/inc/components/sidebar.php';?><div class="topnav">
  

  <div class="items">
    <div class="item logo">
      <a href="<?php echo URLROOT ?>/Pages/index">
        <img src="<?php echo URLROOT?>/public/img/index/logo1.png" alt="Logo" class="logo" width="80" height="30">
      </a>
    </div>
  	
    <div class="search-container-wrapper">
      <?php if (strpos($_SERVER['REQUEST_URI'], '/ItemAds/index') !== false || 
          (strpos($_SERVER['REQUEST_URI'], '/Search/SearchAd') !== false && 
           isset($_GET['category']) && isset($_GET['search']))): ?>
                <form action="<?php echo URLROOT; ?>/Search/SearchAd" method="GET">
                    <div class="search-container-index">
                        <select name="category" class="search-category-index">
                            <option value="" selected>All</option>
                            <div class="selectad-category">
                                <option value="furniture">Furniture</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="books">Books</option>
                                <option value="kitchenware">Kitchenware</option>
                                <option value="home_deco">Home Deco</option>
                                <option value="sports_equip">Sports Equipment</option>
                                <option value="appliances">Appliances</option>
                                <!-- <option value="other">Other</option> -->
                            </div>
                        </select>
                        <input class="search-input-index" name="search" placeholder="Search in EcoTrade">
                        <button class="search-button-index">
                            <img src="<?php echo URLROOT; ?>/public/img/index/search.png" alt="search" class="search-icon-index">
                        </button>
                    </div>
                </form>
                <?php endif; ?>
              </div>

    <div class="links">
      <div class="item"><a href="<?php echo URLROOT ?>/Pages/index">Home</a></div>
      <?php if (!isset($_SESSION['user_id'])) : ?>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/login">Login</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/register">Sign Up</a></div>
      <?php endif; ?>
      <!-- <div class="item"><a href="<?php echo URLROOT ?>/ItemAds/itemAd">Post Ad</a></div> -->
      <div class="item">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="<?php echo URLROOT ?>/ItemAds/itemType">Post Ad</a>
                <?php else : ?>
                    <a href="<?php echo URLROOT ?>/Users/login">Post Ad</a>
                <?php endif; ?>
      </div>
    <?php if (isset($_SESSION['user_id'])) : ?>
      <!-- <div class="item"><a href="<?php echo URLROOT ?>/Wishlist/index">Saved Ads</a></div> -->

      <div class="item">
      <a href="<?php echo URLROOT ?>/Wishlist/index"> 
          <img src="<?php echo URLROOT?>/public/img/index/wishlisticon.png" alt="wishlist" class="wishlistitem">
          <span class="wishlist-count" id="wishlist-count">0</span>
        </a>
      </div>

     <div class="item">
      <!-- Notifications -->
      <div class="notif-dropdown">
        <div class="notif-wrapper">
          <a href="#" class="dropdown-toggle">
              <i class="fas fa-bell"></i>
              <!-- <i class="fa-solid fa-circle" style="color: #ff0000"></i> -->
              <!-- <span class="wishlist-count">15</span> -->
              <!-- <span class="notification-count"><php echo $numberOfNotifications; ?></span> -->
              <span class="caret"></span>
          </a>
          <div class="notif-dropdown-menu" >
              <!-- Fetch notifications from the database and display them here -->
                <!-- <a href="#" class="notif-dropdown-item">
                <?php echo $notification['message']; ?>
                </a> -->

                <div class="notif-dropdown-item">
                  <div class="message"><?php echo $notification['message']; ?></div>
                  <a href="<?php echo URLROOT ?>/ItemAds/show/<?php echo $notification['ad_id']; ?>" class="view-ad-link" data-ad-id="<?php echo $notification['ad_id']; ?>">View Ad</a>
                </div>
          </div>
        </div>
      </div>
      </div> 
      <div class="item user-dropdown" >
        <div class="sidebr" >
          <div class="profile-image" id="profile-image">
          <?php
            // if the user has uploaded an image display it . other wise display the default image
            if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
                echo '<img src="' . URLROOT . '/public/img/profilepic/' . $_SESSION['user_image'] . '" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
            } else {
                echo '<img src="' . URLROOT . '/public/img/profile.png" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
            }
            ?>
        </div> 
        </div> 
      </div>  
    <?php endif; ?>
    </div>
  </div>
</div>

<script>
sidebar=document.querySelector(".sidebar")
function Myfunction(){
  if(sidebar.style.display=="block"){
  sidebar.style.display="none"}else{
    sidebar.style.display="block"
  }
}


// Fetch wishlist count
const wishlist_count=document.getElementById("wishlist-count");

fetch("http://localhost/ecotrade/Wishlist/getWishlistCount", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        credentials: "include",
        }).then(response => response.text())
        .then(text => 
          {
          if (text==0){
            wishlist_count.style.display="none";
          }else{
              wishlist_count.style.display="inline-block";
              wishlist_count.innerHTML=text;
            }
          
        })
        .catch((error) => {console.error("An error occurred:", error);});

</script>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/notifications.js"></script>




















