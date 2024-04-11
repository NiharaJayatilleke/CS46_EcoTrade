<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_recyclehome.css">

<div class="slider">
    <!-- list Items -->
    <div class="list">
        <div class="item active">
            <img src="../public/img/Recyclehome/image/3627611.png">
            <div class="content">
                <div class="welcome">
                <h2 id="content1">Welcome</h2>
                </div>
                    <!-- <div class = "user-greeting">
        <p>Hi <b><?php echo $_SESSION['user_name']; ?></b>, Welcome to the Secondhand Marketplace!</p>
    </div>
    <?php flash('post_msg'); ?> -->

    <?php
    if (isset($_SESSION['user_name'])) {
        ?>
        <div class="user-greeting">
            <p> <b><?php echo $_SESSION['user_name']; ?></b></p>
        </div>
        <?php
    }
    flash('post_msg');
    ?>
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/img1.jpg">
            <div class="content">
                <p></p>
                <h2></h2>
                <p>
                    <!-- Focus on managing waste efficiently and responsibly through recycling, reselling and reusing pre-owned household items. -->
                </p>
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/young-blonde-woman-posing-with-plastic-waste.jpg">
            <div class="content">
                <p></p>
                <h2>About Us</h2>
                <p>
                    Focus on managing waste efficiently and responsibly through recycling, reselling and reusing pre-owned household items.
                </p>
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/plastic-colorful-bags-arranged-gray-background.jpg">
            <div class="content">
                <p></p>
                <h2>Trade Waste</h2>
                <p>
                Join us in building a sustainable future by effortlessly selling your plastic polythene waste through our user-friendly platform                </p>
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/person-doing-selective-recycle-garbage.jpg">
            <div class="content">
                <p></p>
                <h2>Reclaim</h2>
                <p>
                Explore a greener side of commerce as you sell plastic polythene waste conveniently on our platform, turning waste into valuable resources                </p>
            </div>
        </div>
    </div>
    <!-- button arrows -->
    <div class="arrows">
        <button id="prev"><</button>
        <button id="next">></button>
    </div>
    <!-- thumbnail -->
    <div class="thumbnail">
        <div class="item active">
            <img src="../public/img/Recyclehome/image/rm338-card-papercraft-instagram(2).jpg">
            <div class="content">
                <!-- Name Slider -->
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/rm338-card-papercraft-instagram(1).jpg">
            <div class="content">
                <!-- Name Slider -->
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/rm338-card-papercraft-instagram(3).jpg">
            <div class="content">
                <!-- Name Slider -->
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/rm338-card-papercraft-instagram(5).jpg">
            <div class="content">
                <!-- Name Slider -->
            </div>
        </div>
        <div class="item">
            <img src="../public/img/Recyclehome/image/rm338-card-papercraft-instagram(4).jpg">
            <div class="content">
                <!-- Name Slider -->
            </div>
        </div>
    </div>
</div>

<div class="rec-card">
    <div class="rec-card-hover">
        <div class="rec-card-hover__content">
            <h3 class="rec-card-hover__title">
                Cash for Your <span>Plastics!</span> Sell Now!
            </h3>
            <p class="rec-card-hover__text">Turn your plastic waste into money today! Click "Sell Now" and make a difference.</p>
            <a href ="<?php echo URLROOT ?>/ItemAds/itemType" class="rec-card-hover__link">
                <span>Sell Now</span>
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
        <div class="rec-card-hover__extra">
            <!-- <h4>Post your <span>Ad</span> for free!</h4> -->
        </div>
        <img src="../public/img/Recyclehome/image/portrait-cute-young-girl-recycling.jpg" alt="">
    </div>

    <div class="rec-card-hover">
        <div class="rec-card-hover__content">
            <h3 class="rec-card-hover__title">
                Become a <span>Collector</span> right now!
            </h3>
            <p class="rec-card-hover__text">Become a recycle item collector now to save and earn. Click "Join Now" and make a positive impact while growing your income</p>
            <a href ="<?php echo URLROOT ?>/Collectors/register"  class="rec-card-hover__link">
                <span>Join Now</span>
                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
        </div>
        <div class="rec-card-hover__extra">
            <!-- <h4>Join now! </span> and post your <span>ad</span> for free!</h4> -->
        </div>
        <img src="../public/img/Recyclehome/image/recycling-waste-is-very-necessary-environment.jpg" alt="">
    </div>
</div>
<!-- <div class="cards">
    <div class="container">
        <div class="rec-card">
            <div class="imgBx">
                <img src="/3516854-removebg-preview.png">
            </div>
            <div class="contentBx">
                <h2>Secondhand <br>Market</h2>
                <div class="size">
                    <h3>
                        Discover budget-friendly, sustainable treasures in our second-hand marketplace.</h3>
                </div>

                <a href="#">Explore Now</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="rec-card">
            <div class="imgBx">
                <img src="/image/4907875-removebg-preview.png">
            </div>
            <div class="contentBx">
                <h2>Recycle <br>Market</h2>
                <div class="size">
                    <h3>
                        Discover budget-friendly, sustainable treasures in our second-hand marketplace.</h3>
                </div>

                <a href="#">Explore Now</a>
            </div>
        </div>
    </div>
</div> -->

    
    <div class="big-photo-container">
        <img class="big-photo1" src="../public/img/rec/recycleMarkertplace.png" alt="Big Photo">
    </div>
    <!-- <div class="d2">
    <div class="d2_1">
        <img src="../public/img/rec/pic1.png" alt="sell">
    </div>
    <div class="d3">
        <div class="d3_1">
            <img src="../public/img/rec/pic2.png" alt="olastic">
        </div>
        <div class="d3_2">
            <img src="../public/img/rec/pic3.png" alt="collector">
            <a href="<?php echo URLROOT; ?>/Collectors/register">
        <button class="sign-up-button">Sign Up Here</button>
    </a>
        
        </div>
    </div>

    </div>  -->

<!-- Javascript for image upload -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/recycle/home.js"></script>

</body>
</html>
