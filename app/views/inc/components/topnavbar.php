
<?php require APPROOT . '/views/inc/components/sidebar.php';?><div class="topnav">

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/components/topnavbar_styles.css">
  <div class="items">
    <div class="item logo">
      <a href="">
        <img src="<?php echo URLROOT?>/public/img/index/logo.png" alt="Logo" class="logo" width="80" height="30">
      </a>
    </div>
  	
          <?php if (strpos($_SERVER['REQUEST_URI'], '/itemAds') !== false): ?>
            <div class="search-container-wrapper">
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
            </div>
          <?php endif; ?>

    <div class="links">
      <div class="item"><a href="<?php echo URLROOT ?>/Pages/index">Home</a></div>
      <?php if (!isset($_SESSION['user_id'])) : ?>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/login">Login</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/register">Sign Up</a></div>
      <?php endif; ?>
      <!-- <div class="item"><a href="<?php echo URLROOT ?>/ItemAds/itemAd">Post Ad</a></div> -->
      <div class="item">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <a href="<?php echo URLROOT ?>/ItemAds/itemAd">Post Ad</a>
                <?php else : ?>
                    <a href="<?php echo URLROOT ?>/Users/login">Post Ad</a>
                <?php endif; ?>
      </div>

      <div class="item"><a href="<?php echo URLROOT ?>/Wishlist/index">Saved Ads</a></div>


      <!-- Notifications -->
      <div class="item user-dropdown1">
        <div class="notif-wrapper">
          <a href="#" class="dropdown-toggle">
              <i class="fas fa-bell"></i>
              <span class="caret"></span>
          </a>
          <div class="notif-dropdown-menu" >
              <!-- Fetch notifications from the database and display them here -->
              <?php foreach ($notifications as $notification): ?>

                  <!-- <a href="#" class="notif-dropdown-item">
                    <?php echo $notification['message']; ?>
                  </a> -->

                  <div class="notif-dropdown-item">
                    <div class="message"><?php echo $notification['message']; ?></div>
                    <a href="<?php echo URLROOT ?>/ItemAds/show/<?php echo $notification['ad_id']; ?>" class="view-ad-link">View Ad</a>
                  </div>
              <?php endforeach; ?>
          </div>
        </div>
      </div>


      <div class="item user-dropdown">
        <div class="sidebr">
          <div class="profile-image">
              <!-- <div class="image-container"> -->
          <a href="#" >
          <?php
            if (isset($data['user']) && !empty($data['user'])) {
                echo '<img src="' . URLROOT . '/public/img/profilepic/' . $data['user'] . '" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
            } else {
                echo '<img src="' . URLROOT . '/public/img/profile.png" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
            }
            ?>
          </a>
        <!-- </div>  -->
        </div> 
        </div> 
      </div>      
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
</script>

<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/notifications.js"></script>


















