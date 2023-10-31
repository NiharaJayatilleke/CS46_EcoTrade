<div class="topnav">
 <div class="items">
    <div class="item logo">
    <a href="">
      <img src="../public/img/logo.png" alt="Logo" class="logo" width="80" height="30">
    </a>
    </div>
    <div class="links">
      <div class="item"><a href="">Home</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/login">Login</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/register">SignUp</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Item_Ads/itemAd">Post ad</a></div>
      <div class="item"><a href="#wishlist">Saved Ads</a></div>
      <div class="item"><a href=""><img src="../public/img/user.png" alt="user" class="user" width="80" height="30"></a></div>
      <?php
      if (!isset($_SESSION['user_id'])) {
      echo '<style>.user { display: none; }</style>';
      }
            ?>
    </div>
  </div>
</div>

