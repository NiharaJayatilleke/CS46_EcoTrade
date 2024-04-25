<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>

<body class="b110">

       
 
    <section class="hero gridSection">
        <div class="sectionDesc">
            <h1 class="headline">
                Recycle, Earn <span class="cryptoText">ECOTRADE</span>.
            </h1>
            <p class="sub-headline">
                
"EcoTrade is more than a platform; it's a movement. We unite buyers and collectors to transform waste into valuable resources. By connecting people with a shared vision of sustainability, we redefine recycling and contribute to a greener world. Join us in shaping a future where every eco-conscious action makes a difference. Together, let's create a sustainable tomorrow."
            </p>
            <!-- <div class="btnContainer">
                <button class="btn btn110">Explore More</button>
                
            </div> -->
        </div>
        <div class="sectionPic bouncepic" id="sectionPic">
            <img src="../public/img/about/wepik-export-20240421085733kCr4.png" alt="">
        </div>
    </section>

    <!-- vjfsjhbvsf -->

    <!-- feqfbfhe -->
    <!-- Carousel -->
    <section>
        <div class="carouselContainer">
            <div class="eachCarousel eachCarouselBorder">
                <img src="../public/img/about/recycling.png" alt="">
                <article class="carouselDesc">
                    <h1 class="carouselTitle">Recycle Selling</h1>
                    <p class="carouselPara">
                        Recycle selling on EcoTrade links recyclers with buyers, including recycling centers and collectors, fostering sustainability and waste reduction.</p>
              
                        <a href="<?php echo URLROOT; ?>/Pages/recyclehome" class="btn carouselBtn">Explore</a>
                </article>
            </div>
    
            <div class="eachCarousel eachCarouselBorder">
                <img src="../public/img/about/grocery-store.png" alt="">
                <article class="carouselDesc">
                    <h1 class="carouselTitle">Eco Market</h1>
                    <p class="carouselPara">
                        Eco market on EcoTrade facilitates the buying and selling of secondhand items, fostering sustainability and reducing waste through a shared e-commerce platform.</p>
                    <!-- <button class="btn carouselBtn">Explore </button> -->
                    <a href="<?php echo URLROOT; ?>/Pages/sechome" class="btn carouselBtn">Explore</a>
                </article>
            </div>

            <div class="eachCarousel eachCarouselBorder">
                <img src="../public/img/about/paper-bag.png" alt="">
                <article class="carouselDesc">
                    <h1 class="carouselTitle">Recycle Buying</h1>
                    <p class="carouselPara">
                        Recycle buying on EcoTrade connects buyers with recyclers, including recycling centers and collectors, promoting sustainability and reducing waste.</p>
                  
                        <a href="<?php echo URLROOT; ?>/recyclecenters/about" class="btn carouselBtn">Explore</a>
                </article>
            </div>
    
    
        <div class="carouselIndicator">
            <div class="indicator activeIndicator" onclick="slideCarousel(0)"></div>
            <div class="indicator" onclick="slideCarousel(1)"></div>
            <div class="indicator" onclick="slideCarousel(2)"></div>
            <div class="indicator" onclick="slideCarousel(3)"></div>
            <div class="indicator" onclick="slideCarousel(4)"></div>
            <div class="indicator" onclick="slideCarousel(5)"></div>
        </div>
    </section>

    <!-- Processes -->
    <section class="gridSection">
        <div class="sectionDesc processessDesc">
            <h1 class="sectionHeader">Main Goal</h1>
            <p class="sectionPara">At EcoTrade, our mission is clear: to pave the way towards a more sustainable future by championing environmental stewardship through innovative recycling solutions. We are committed to facilitating the seamless exchange of recyclable materials, fostering partnerships between recycling centers, businesses, and individuals, and ultimately, making a tangible impact on global sustainability efforts.


            </p>
            <div class="eachProcesses">
                <img src="../public/img/about/handshake-icon-white-line.svg" alt="handshake">
                <div class="eachprocessesPara">
                    <h1 class="processTitle">Recycle</h1>
                    <p>
                        Turn waste into valuable resources. Make recycling part of your everyday routine to help the planet.                    </p>
                </div>
            </div>
            <div class="eachProcesses">
                <img src="../public/img/about/cart-icon-white-line.svg" alt="handshake">
                <div class="eachprocessesPara">
                    <h1 class="processTitle">Earn</h1>
                    <p>
                        Turn recycling into an opportunity to earn. Collect, recycle, and get rewarded for your eco-friendly contributions.
                    </p>
                </div>
            </div>
        </div>
        <div class="sectionPic bouncepic processesPic" id="sectionPic">
            <img src="../public/img/about/wepik-export-20240421093650W1dh.png" alt="">
        </div>
    </section>

</body>
