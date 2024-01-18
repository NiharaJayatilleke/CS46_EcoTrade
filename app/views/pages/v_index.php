
<?php require APPROOT.'/views/inc/header.php'; ?>

<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_index_styles.css">

<form action="<?php echo URLROOT; ?>/Search/SearchAd" method="GET">
 <div class="search-container-index" >
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
  <input  class="search-input-index" name="search" placeholder="Search in EcoTrade" style=""> 
  <button class="search-button-index" >
      <img src="<?php echo URLROOT; ?>/public/img/index/search.png" alt="search" class="search-icon-index">
      <div class="bg-img" >
          <img src="../public/img/index/home.png" alt="">
      </div> 
  </button> 
 </div> 
</form>


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
