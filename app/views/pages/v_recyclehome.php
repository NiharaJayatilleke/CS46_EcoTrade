<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_recyclehome.css">

<div class="slider">
    <!-- list Items -->
    <div class="list">
        <div class="item active">
        <img src="../public/img/Recyclehome/image/img1.jpg">
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
        <img src="../public/img/Recyclehome/image/3627611.png">
      
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
            <a href ="<?php echo URLROOT ?>/RecycleItemAds/recycleItemAd" class="rec-card-hover__link">
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
            <a href ="<?php echo URLROOT ?>/Collectors/about"  class="rec-card-hover__link">
                <span>Explore more!</span>
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
<div class="recenter96">
<section id="banner96" class="section-m196">
    <div class="text96">
        <h4>Recycle Center</h4>
        <h2>Recycle <span>Center </span> -Shared Value.</h2>
        <a href="<?php echo URLROOT; ?>/RecycleCenters/about" class="explore-btn">Sign Up</a>
</div>
    </section>
    </div>






<div class="b111">

       
 
<section class="hero gridSection">
    <div class="sectionDesc">
        <h1 class="headline">
            What is <span class="cryptoText">RECYCLE CENTER</span>.
        </h1>
        <p class="sub-headline">
            
        A recycle center integrated into a recycling item buying and selling website serves as a pivotal hub for environmentally conscious consumers. At this center, users can responsibly dispose of their recyclable materials, contributing to the global effort to reduce waste. By offering a convenient platform to exchange items for recycle points or credits, the website incentivizes sustainable behavior and fosters a culture of recycling. This holistic approach not only encourages users to participate actively in recycling but also facilitates the transition towards a greener lifestyle. With each transaction at the recycle center, individuals play a vital role in preserving the planet for future generations, making every effort count towards a more sustainable future.        </p>
        <!-- <div class="btnContainer">
            <button class="btn btn110">Explore More</button>
            
        </div> -->
    </div>
    <div class="sectionPic bouncepic" id="sectionPic">
        <img src="../public/img/Recyclehome/image/2210.i032.009.S.m005.c13.isometric_recycling_isolated-removebg.png" alt="">
    </div>
</section>




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

<?php require APPROOT.'/views/inc/components/footer.php'; ?>