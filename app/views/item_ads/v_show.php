<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_prodetails.css">


<div class="main-container1">
    <div class="main2"></div>
        <div class = "item-name"><h1><?php echo $data['ad']->item_name ?><h1></div>
        <div class = "p1"><p>Posted on <?php echo $data['ad']->item_created_at ?></p></div>

        <div class="container2">
        <div class="left-container">
        
            <div class="big-photo">
                <img src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image" width="100" height="80">
            </div>
            <div class="small-images">
                <!-- <img id="s1" src="productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')"> -->
                <img id="s1" src="<?php echo URLROOT?>/public/img/prodetails/productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')">

                <img id="s2" src="<?php echo URLROOT?>/public/img/prodetails/productDetails2.jpeg" alt="Small Image 2" onclick="displayBigImage('/pics/productDetails2.jpeg')">
                <!-- Add more small images as needed -->
            </div>
            <div class="desMain">
                <div class="heading">
                    <div class = "price"><h1>Rs. <?php echo $data['ad']->item_price ?></h1></div>
                    <div class = "desc"><?php echo $data['ad']->item_desc ?></div>
                    <p>Negotiable</p>
                </div>

                <div class="description">
                    <div class="desHead">
                        <h3> Description</h1>
                    </div>
                    <div class="desP">
                        <p>YOM 1971 YOR 1979<br>300 TDI Engine R380 Gearbox</p>
                    </div>
                </div>
            </div>

            <div class="line"></div>

            <div class="bottom">
                <button class="b1">
                    <img src="<?php echo URLROOT?>/public/img/prodetails/promote.png" alt="promote">
                    <p>Promote This Ad</p>
                </button>
                <button class="b1">
                    <img src="<?php echo URLROOT?>/public/img/prodetails/report.png" alt="report">
                    <p>Report This Ad</p>
                </button>
                <button class="b1">
                    <img src="<?php echo URLROOT?>/public/img/prodetails/save.png" alt="report">
                    <p>Save this Ad</p>
                </button>
            </div>
        
    </div>

    <div class="right-container">
        <div class="b1">
            <img class="i1" src="<?php echo URLROOT?>/public/img/prodetails/profile.png" alt="profile">
            <div class="b1_2">
                <p><?php echo $ad->seller_name ?></p>
            </div>
        </div>
        <div class="b1">
            <img src="<?php echo URLROOT?>/public/img/prodetails/phone1.png" alt="profile">
            <div class="b2">
            <h4>076XXXXXXX</h2>
            <p>Click to show phone number</p>
        </div>
        </div>
        <div class="b1">
            <img src="<?php echo URLROOT?>/public/img/prodetails/phone2.png" alt="profile">
            <div class="b2">
            <h4>076XXXXXXX</h2>
            <p>Click to show phone number</p>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    <script src="productDetails.js"></script>
    </body>
    </html>
    



