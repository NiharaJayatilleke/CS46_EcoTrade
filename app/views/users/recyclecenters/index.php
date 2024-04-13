<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_collectorhome.css">

<div class="poster">
    <img src="poster1.webp" alt="">
</div>

    <div class="title">
        Sell Your E-waste Now,And start earning from it.
    </div>
    <div class="cont">

    <?php echo $data['ad']->seller_id?>
    <?php if (!empty($data['ads'])) : ?>
        <div class = "ads-container">
        <?php foreach($data['ads'] as $ad): ?>
            <div class="pro" id="pro1">
            <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Ad Image" width="100" height="80">
                <div class="imgdesc" id="name">
                    <h2>
                        Item Name:<?php echo $ad->item_name ?><br>
                        Category:<?php echo $ad->item_category ?>
                    </h2>
                    <a href="url" target="_blank">
                        <h4>View Add</h4>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    <?php endif; ?>

    </div>
    <div class="fot1">
        Page:&nbsp; <a href="productview.html">1</a>&nbsp;
        |&nbsp;<a href="productview.html">2</a>&nbsp;
        |&nbsp;<a href="productview.html">3</a>&nbsp;
        |&nbsp;<a href="productview.html">Next</a>&nbsp;
    </div>