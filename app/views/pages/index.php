<?php require APPROOT.'/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/components/topnavbar.php'; ?>

<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/index.css">
<!-- 
<form action="<?php echo URLROOT; ?>/Search/SearchAd" method="GET">
    <div class="search-container-index">
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
            </div>
        </select>
        <input class="search-input-index" name="search" placeholder="Search in EcoTrade" style="">
        <button class="search-button-index">
            <img src="<?php echo URLROOT; ?>/public/img/index/search.png" alt="search" class="search-icon-index">
            <div class="bg-img">
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
            </a>
        </div>
        <div class="right-side">
            <img src="../public/img/index/secondhandmarket.jpg" alt="Second Hand Market Image" width="500px">
        </div>
    </div>
    <div class="option">
        <div class="left-side left-side-B">
            <a href="<?php echo URLROOT; ?>/Recyclehome/index">
                <h2>Recycle Selling</h2>
            </a>
        </div>
        <div class="right-side">
            <img src="../public/img/index/recyclemarket.webp" alt="Recycle Selling Image" width="500px">
        </div>
    </div>
</div>

<div class="greenish-image">
    <img src="../public/img/index/bottomimg.jpg" alt="greenish">
    <div class="text-on-layer"><b>We're the Best<br> Second-Hand Marketplace for<br> Reuse and Recycle<b></div>
</div> -->

<!-- slider -->


<!-- slider -->

<section class="parallax">

    <img src="../public/img/index/hill1.png" id="hill1">
    <img src="../public/img/index/hill2.png" id="hill2">
    <img src="../public/img/index/hill3.png" id="hill3">
    <img src="../public/img/index/hill4.png" id="hill4">
    <img src="../public/img/index/hill5.png" id="hill5">
    <h2 id="text">EcoTrade</h2>
    <img src="../public/img/index/tree.png" id="tree">
    <img src="../public/img/index/leaf.png" id="leaf">
    <img class="hill4" src="../public/img/index/plant.png" id="plant">

</section>
<div class="sec" id="sec">
    <div class="cards">
        <div class="container">
            <div class="card">
                <div class="imgBx">
                    <img src="../public/img/index/3516854-removebg-preview.png">
                </div>
                <div class="contentBx">
                    <h2>Secondhand <br>Market</h2>
                    <div class="size">
                        <h3>
                            Discover budget-friendly, sustainable second-hand marketplace.</h3>
                    </div>

                    <a href="#">Explore Now</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="card">
                <div class="imgBx">
                    <img src="../public/img/index/4907875-removebg-preview.png">
                </div>
                <div class="contentBx">
                    <h2>Recycle <br>Market</h2>
                    <div class="size">
                        <h3>
                        Discover a wallet-friendly and eco-conscious recycling market.</h3>
                    </div>

                    <a href="#">Explore Now</a>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- JS as a separate file -->
<script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/index.js"></script>


<!-- <script>
    let text = document.getElementById('text'); // Corrected the element ID
    let leaf = document.getElementById('leaf');
    let hill1 = document.getElementById('hill1');
    let hill4 = document.getElementById('hill4');
    let hill5 = document.getElementById('hill5');

    window.addEventListener('scroll', () => {
        let value = window.scrollY;

        // Corrected the style property
        leaf.style.top = value * 1.05 + 'px';
        leaf.style.left = value * 1.05 + 'px';
        hill5.style.left = value * 1.05 + 'px';
        hill4.style.left = value * -1.05 + 'px';
    });
</script> -->
