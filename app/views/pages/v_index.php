<?php require APPROOT.'/views/inc/header.php'; ?>
    <!-- Top NAVIGATION -->
    <?php require APPROOT . '/views/inc/components/topnavbar.php';?>
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_index_styles.css">
    <h1 style="margin-top:60px; font-size:15px;color:white;margin-left:20px;">Welcome <?php echo isset( $_SESSION['user_name']) ? $_SESSION['user_name'] : ''; ?>!</h1>
    <div class="item search" style="display: flex">
      <input type="text" placeholder="Search in ecotrade">
      <img src="<?php echo URLROOT; ?>/public/img/search.png" alt="search" class="searchicon" width="20px" height="20px">
    </div>
    <div class="bg-img">
        <img src="../public/img/home.jpg" alt="">
    </div>
<?php require APPROOT.'/views/inc/footer.php'; ?>