<?php require APPROOT.'/views/inc/header.php'; ?>

<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_index_styles.css">


 <div class="search-container-index" >
  <input type="text" class="search-input-index" placeholder="Search in EcoTrade" style="margin-right:0;padding:7px 10px;">
  <button class="search-button-index" style="margin-left:0;margin-top:9px">
      <img src="<?php echo URLROOT; ?>/public/img/index/search.png" alt="search" class="search-icon-index">
      <div class="bg-img" style="padding-left:0">
          <img src="../public/img/index/home.png" alt="">
      </div>
    </div>
  </button>  

<div class="big-options">
    <div class="option">       
            <div class="left-side left-side-A">
            <a href="<?php echo URLROOT; ?>/Sechome/index">
                <h1>Second Hand Market Place</h1>
            </div>
        </a>
        <div class="right-side">
            <img src="../public/img/index/secondhandmarket.jpg" alt="Second Hand Market Image" width="500px">
        </div>
    </div>
    <div class="option">     
            <div class="left-side left-side-B">
            <a href="<?php echo URLROOT; ?>/Recyclehome/index">
                <h2>Recycle Selling</h2>
            </div>
        </a>
        <div class="right-side">
            <img src="../public/img/index/recyclemarket.webp" alt="Recycle Selling Image" width="500px">
        </div>
    </div>
</div>

<div class="greenish-image">
    <img src="../public/img/index/bottomimg.jpg" alt="greenish">
    <div class="text-on-layer"><b>We're the Best<br> Second-Hand Marketplace for<br> Reuse and Recycle<b></div>
</div>
<?php require APPROOT.'/views/inc/footer.php'; ?>