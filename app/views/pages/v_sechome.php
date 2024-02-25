
<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/public/css/pages/v_sechome.css">


        <!-- <div class="main-content">
            <div class="photo-left">
                <img src="../public/img/sechome/girl1.png" alt="Photo 1">
            </div>
            <div class="content-center">
                <div class="welcome-text">
                    <h1 class="sechomewelcome">Welcome to EcoTrade</h1>
                    <p class="p1">The new marketplace for modern Sri Lankans</p>
                    <button class="b1">All of Sri Lanka</button>
                </div>
                <div class="search-bar">
                    <input type="text" placeholder="Search...">
                    <button class="sechbutton">Search</button>
                </div>
                <div class="find-ads">
                    <p class="p1">Find the best deals on Vehicles, Property, Electronics and more. Choose from a wide range of high quality ADs from
                        trusted sellers.</p>
                    <a href="<?php echo URLROOT; ?>/ItemAds/index"><button class="sechbutton">Explore Ads</button></a>
                </div>
            </div>
            <div class="photo-right">
                <img src="../public/img/sechome/girl2.png" alt="Photo 2">
            </div>
        </div>

        <div class="featured-categories">
            <h2 class="head1">Featured Category</h2>
            <p class="p2">Browsechomese through some of our most popular categories</p>
        
            <div class="category-photos">
                <div class="photo" onclick="location.href='navBar.html';">
                    <img src="../public/img/sechome/p1.png" alt="Category 1">
                    <p>Motors</p>
                </div>
                <div class="photo">
                    <img src="../public/img/sechome/p2.png" alt="Category 2">
                    <p>Mobiles And Electronics</p>
                </div>
                <div class="photo">
                    <img src="../public/img/sechome/p3.png" alt="Category 3">
                    <p>Others</p>
                </div>
            </div>
            <div class="category-photos">
                <div class="photo">
                    <img src="../public/img/sechome/p4.png" alt="Category 1">
                    <p>Hobby, Sport & Kids</p>
                </div>
                <div class="photo">
                    <img src="../public/img/sechome/p5.png" alt="Category 2">
                    <p>Fashion & Beauty</p>
                </div>
                <div class="photo">
                    <img src="../public/img/sechome/p6.png" alt="Category 3">
                    <p>Home and Garden</p>
                </div>
            </div>
        </div> -->


<div class="bg1">
        <div class="rowsechome">
        <div class="col-2">
            <img src="../public/img/sechome/images/4021545.png" alt="Two men being active" />
            <div class="butt12">
            <a href="<?php echo URLROOT; ?>/ItemAds/index" class="btn">
    <img src="../public/img/sechome/images/shopping-cart_3737372.png" alt="Explore Now">
</a>
</div>

          </div>
          <!-- <div class="col-2"> -->
            <!-- <h1>The go-to for <br />secondhand essentials!</h1>
            <p>
              Success isn't always about greatness. It's about consistency.
              Consistent<br />
              hard work gains success. Greatness will come.
            </p>
            <a href="<?php echo URLROOT; ?>/ItemAds/index" class="btn">Explore Now &#8594; </a> -->

          </div>
          <!-- <div class="col-2">
            <img src="../public/img/sechome/images/4021545.png" alt="Two men being active" />
          </div> -->
        </div>
      <!-- </div>
    </div> -->

    <!-- Featured Categories -->

    <div class="categories">
      <div class="small-container">
        <div class="rowsechome">
          <div class="col-3">
            <img
              src="../public/img/sechome/images/category-1.jpg"
              alt="a man's legs with bright orange shoes"
            />
          </div>
          <div class="col-3">
            <img
              src="../public/img/sechome/images/category-2.jpg"
              alt="black and white addidas shoes"
            />
          </div>
          <div class="col-3">
            <img
              src="../public/img/sechome/images/category-3.jpg"
              alt="a woman in an addidas hoodie and white watch"
            />
          </div>
        </div>
      </div>
    </div>

    <!-- Featured Products -->

    <div class="small-container">
      <h2 class="title">Featured Products</h2>
      <div class="rowsechome">
        <div class="col-4">
          <img src="../public/img/sechome/images/product-1.jpg" alt="Red T-Shirt" />
          <h4>Red Printed T-Shirt</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$50.00</p>
        </div>
        <div class="col-4">
          <img src="../public/img/sechome/images/product-2.jpg" alt="Black Shoes" />
          <h4>Black HRX Shoes</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i>
          </div>
          <p>$197.00</p>
        </div>
        <div class="col-4">
          <img src="../public/img/sechome/images/product-3.jpg" alt="Grey Sweatpants" />
          <h4>Gray Benetton Sweatpants</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <p>$75.00</p>
        </div>
        <div class="col-4">
          <img src="../public/img/sechome/images/product-6.jpg" alt="Black T-Shirt" />
          <h4>Black Printed T-Shirt</h4>
          <div class="rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
          </div>
          <p>$50.00</p>
        </div>
      </div>

      <h2 class="title">Latest Products</h2>
      <div class="rowsechome">
        <?php foreach($data['ads'] as $ad): ?>
          <div class="col-4">
            <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Tri-Color Socks" />
            <h4><?php echo $ad->item_name ?></h4>
        
            <p>Rs.<?php echo $ad->item_price ?></p>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>

    <!--Offer -->

    <div class="offer">
      <div class="small-container">
        <div class="rowsechome">
          <div class="col-2">
            <img
              src="../public/img/sechome/images/exclusive.png"
              class="offer-img"
              alt="orange watch"
            />
          </div>
          <div class="col-2">
            <p>Exclusively Available on RedStore</p>
            <h1>Smart Band 4</h1>
            <small
              >Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse,
              sapiente accusamus! Lorem, ipsum dolor sit amet consectetur
              adipisicing elit ham.</small
            >
            <a href="" class="btn">Buy Now &#8594;</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Testimonials -->

    <div class="testimonial">
      <div class="small-container">
        <div class="rowsechome">
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. In
              nesciunt doloremque maxime quidem necessitatibus sed repellat ea
              officia quibusdam! Sunt.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="../public/img/sechome/images/user-1.png" alt="human face" />
            <h3>Grace Cho</h3>
          </div>
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. In
              nesciunt doloremque maxime quidem necessitatibus sed repellat ea
              officia quibusdam! Sunt.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="../public/img/sechome/images/user-2.png" alt="human face" />
            <h3>Frank Garett</h3>
          </div>
          <div class="col-3">
            <i class="fa fa-quote-left"></i>
            <p>
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. In
              nesciunt doloremque maxime quidem necessitatibus sed repellat ea
              officia quibusdam! Sunt.
            </p>
            <div class="rating">
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
              <i class="fa fa-star"></i>
            </div>
            <img src="../public/img/sechome/images/user-3.png" alt="human face" />
            <h3>Charolette Rue</h3>
          </div>
        </div>
      </div>
    </div>

    <!-- Brands -->

    <div class="brands">
      <div class="small-container">
        <div class="rowsechome">
          <div class="col-5">
            <img src="../public/img/sechome/images/logo-godrej.png" alt="godrej logo" />
          </div>
          <div class="col-5">
            <img src="../public/img/sechome/images/logo-coca-cola.png" alt="coke logo" />
          </div>
          <div class="col-5">
            <img src="../public/img/sechome/images/logo-oppo.png" alt="oppo logo" />
          </div>
          <div class="col-5">
            <img src="../public/img/sechome/images/logo-paypal.png" alt="paypal logo" />
          </div>
          <div class="col-5">
            <img src="../public/img/sechome/images/logo-philips.png" alt="philips logo" />
          </div>
        </div>
      </div>
    </div>
        </div>

    <!-- Footer -->


    <!-- JS for Menu Toggle-->
    <script>
      var MenuItems = document.getElementById("MenuItems");

      MenuItems.style.maxHeight = "0px";

      function menutoggle() {
        if (MenuItems.style.maxHeight == "0px") {
          MenuItems.style.maxHeight = "200px";
        } else {
          MenuItems.style.maxHeight = "0px";
        }
      }
    </script>

    <?php require APPROOT.'/views/inc/components/footer.php'; ?>






