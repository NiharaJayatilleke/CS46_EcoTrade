<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_index_styles.css">
<h1 style="margin-top:60px; font-size:15px; color:white; margin-left:20px;">Welcome <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>!</h1>
<div class="item search" style="display: flex">
  <input type="text" placeholder="Search in ecotrade">
  <img src="<?php echo URLROOT; ?>/public/img/search.png" alt="search" class="searchicon" width="20px" height="20px">
</div>
<div class="bg-img">
    <img src="../public/img/home.png" alt="">
</div>

<div class="big-options">
    <div class="option">
        <div class="left-side">
            <h1>Second Hand Market</h1>
            <!-- <button class="enter-button">Enter Now</button> -->
        </div>
        <div class="right-side">
          
            <img src="../public/img/secondhandmarket.jpg" alt="Second Hand Market Image" width="500px">
        </div>
    </div>
    <div class="option">
        <div class="card-section">
        <div class="left-side">
            <h2>Recycle Selling</h2>
             <!-- <button class="enter-button">Enter Now</button> -->
        </div>
</div>
        <div class="card-section">
        <div class="right-side"> 
        
            <a href="<?php echo URLROOT; ?>/users/forgot_password">
            <img src="../public/img/recyclemarket.webp" alt="Second Hand Market Image" width="500px">
            </a>
        </div>
</div>
    </div>
    <!-- Repeat the same structure for the second option -->
</div>
<div class="greenish-image">
    <img src="../public/img/green.png" alt="greenish">
</div>


<?php require APPROOT.'/views/inc/footer.php'; ?>