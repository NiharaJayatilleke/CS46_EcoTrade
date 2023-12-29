
<?php require APPROOT . '/views/inc/components/sidebar.php';?><div class="topnav">
  <div class="items">
    <div class="item logo">
      <a href="">
        <img src="<?php echo URLROOT?>/public/img/index/logo.png" alt="Logo" class="logo" width="80" height="30">
      </a>
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
                    <a href="<?php echo URLROOT ?>/ItemAds/itemAd">Post Ad</a>
                <?php else : ?>
                    <a href="<?php echo URLROOT ?>/Users/login">Post Ad</a>
                <?php endif; ?>
      </div>

      <div class="item"><a href="<?php echo URLROOT ?>/Wishlist/index">Saved Ads</a></div>


      <!-- Notifications -->
      <div class="item user-dropdown">
        <div class="sidebr1">
          <a href="#" class="dropdown-toggle">
              <i class="fas fa-bell"></i>
              <span class="caret"></span>
          </a>
          <div class="notif-dropdown-menu">
              <!-- Fetch notifications from the database and display them here -->
              <?php foreach ($notifications as $notification): ?>
                  <a href="#" class="notif-dropdown-item">
                      <?php echo $notification['message']; ?>
                  </a>
              <?php endforeach; ?>
          </div>
        </div>
      </div>


      <div class="item user-dropdown">
        <div class="sidebr">
          <a href="#" >
            <?php if(isset($_SESSION['user_id'])){
            echo '<img src="../public/img/index/user.png" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
          }
          ?>
          </a>
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





