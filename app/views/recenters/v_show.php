<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php 
if($_SESSION['user_type'] != 'moderator') {
    require APPROOT . '/views/inc/components/topnavbar.php';
}
?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/v_buyer_view.css">
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/seller_only_styles.css">

<div class="sad-main-container1">
    <div class="sad-main2"></div>
        <div class = "sad-item-name"><h1><?php echo $data['ad']->item_category ?><h1></div>
        <div class = "sad-p1"><p>Posted on <?php echo $data['ad']->item_created_at ?></p></div>

        <div class="sad-container2">
        <div class="sad-left-container">
       
            <div class="sad-desMain">
                <div class="sad-heading">
                    <!-- <div class = "sad-price"><h2>Rs. <php echo $data['ad']->item_price ?></h2></div> -->
                    <div class = "sad-details">
                    <!-- <div class = "sad-condition">Condition: <php echo $data['ad']->item_condition ?></div> -->
                    <p>Quantity: 1</p>
                    <br>
                    </div>
                </div>

                <div class="sad-description">
                    <div class="sad-desHead">
                        <h3> Product Description</h1>
                    </div>
                    <div class="sad-desP">
                        <?php echo $data['ad']->item_desc ?>
                    </div>
                </div>
            </div>


</div>
</div>