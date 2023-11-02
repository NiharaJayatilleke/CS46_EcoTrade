
<?php require APPROOT . '/views/inc/components/sidebar.php';?><div class="topnav">
  <div class="items">
    <div class="item logo">
      <a href="">
        <img src="../public/img/logo.png" alt="Logo" class="logo" width="80" height="30">
      </a>
    </div>
    <div class="links">
      <div class="item"><a href="<?php echo URLROOT ?>/Pages/index">Home</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/login">Login</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Users/register">SignUp</a></div>
      <div class="item"><a href="<?php echo URLROOT ?>/Item_Ads/itemAd">Post ad</a></div>
      <div class="item"><a href="#wishlist">Saved Ads</a></div>
      <div class="item user-dropdown">
        <div class="sidebr">
          <a href="#" >
            <?php if(isset($_SESSION['user_id'])){
            echo '<img src="../public/img/user.png" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
          }
          ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- <section class="home-section">
    <div class="home-content">
        <a><img src="../public/img/user.png" alt="user" class="user" width="80" height="30"></a>
        <span class="text">Dropdown Sidebar</span>
    </div>
</section> -->


<script>
sidebar=document.querySelector(".sidebar")
function Myfunction(){
  if(sidebar.style.display=="block"){
  sidebar.style.display="none"}else{
    sidebar.style.display="block"
  }
}
</script>





