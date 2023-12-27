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

<br><br>
<!-- Message Sellers (Q&A) -->
<form method="post">
    <div class = "message-seller-container">
        <div class = "message-header">
            <h3>Message Seller</h3>
        </div>

        <!-- Message Input -->
        <div class = "message-input">
            <input type = "text" class = "message-input-field" name = "send-message" id = "send-message" placeholder = "Type your message here...">
            <!-- <button class = "message-btn" id = "message-btn" type = "submit">Send</button> -->
            <input type="submit" value="Send" class = "message-btn" id = "message-btn"> 
        </div>

        <!-- Testing -->
        <div id = "test"></div>
        
        <!-- Message -->
        <div class = "message-container">
            <div class = "message-left">
                <!-- profile image -->
                <img id = "user_placeholder" src = "<?php echo URLROOT;?>/public/img/itemAds/user.png" alt="placeholder" width = "20px" height = "20px"></img>

            </div>
            <div class = "message-right">
                <div class = "message-header">
                    <div class = "message-user-name">User Name</div>
                    <div class = "message-created-at">Created At</div>
                </div>
                <div class = "message-body">
                    <div class = "message-body-cont">Message Content</div>
                </div>
        </div>
    </div>
</form>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type ="text/JavaScript">
    var URLROOT ="<?php echo URLROOT; ?>"
    var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
</script>

<!-- Javascript for messages -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/messages.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>


    



