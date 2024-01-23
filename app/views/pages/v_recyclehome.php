<?php require APPROOT.'/views/inc/header.php'; ?>
<!-- Top NAVIGATION -->
<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/v_recyclehome.css">

<!-- <div class="big-photo-container">
    <img class="big-photo1" src="../public/img/rec/recycleMarkertplace.png" alt="Big Photo">
</div>
<div class="d2">
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
</div> -->

<div class="slider">
        <!-- list Items -->
        <div class="list">
            <div class="item active">
                <img src="image/img1.jpg">
                <div class="content" >
                   
                    <h2 id="content1">Welcome</h2>
               
                </div>
            </div>
            <div class="item">
                <video autoplay loop muted>
                    <source src="image/video.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="content">
                
                </div>
            </div>
            <div class="item">
                <img src="image/img3.jpg">
                <div class="content">
                    <p></p>
                    <h2>About Us</h2>
                    <p>
                        Focus on managing waste efficiently and responsibly through recycling, reselling and reusing pre-owned household items.
 
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="image/img4.jpg">
                <div class="content">
                    <p></p>
                    <h2>About Us</h2>
                    <p>
                        Our platform allows users to find new homes for their used goods, reducing waste, and promoting sustainable practices.
                    </p>
                </div>
            </div>
            <div class="item">
                <img src="image/img5.jpg">
                <div class="content">
                    <p>design</p>
                    <h2>About Us</h2>
                    <p>
                        Our platform allows users to find new homes for their used goods, reducing waste, and promoting sustainable practices.
                    </p>
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
                <img src="image/img1.jpg">
                <div class="content">
                    <!-- Name Slider -->
                </div>
            </div>
            <div class="item">
                <img src="image/img2.jpg">
                <div class="content">
                    <!-- Name Slider -->
                </div>
            </div>
            <div class="item">
                <img src="image/img3.jpg">
                <div class="content">
                    <!-- Name Slider -->
                </div>
            </div>
            <div class="item">
                <img src="image/img4.jpg">
                <div class="content">
                    <!-- Name Slider -->
                </div>
            </div>
            <div class="item">
                <img src="image/img5.jpg">
                <div class="content">
                    <!-- Name Slider -->
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="cards">
    <div class="container">
        <div class="card">
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
        <div class="card">
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
        </div> -->
      </div>
    </div>

    <script>
    let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let thumbnails = document.querySelectorAll('.thumbnail .item');

// config param
let countItem = items.length;
let itemActive = 0;
// event next click
next.onclick = function(){
    itemActive = itemActive + 1;
    if(itemActive >= countItem){
        itemActive = 0;
    }
    showSlider();
}
//event prev click
prev.onclick = function(){1
    itemActive = itemActive - 1;
    if(itemActive < 0){
        itemActive = countItem - 1;
    }
    showSlider();
}
// auto run slider
let refreshInterval = setInterval(() => {
    next.click();
}, 29000)
function showSlider(){
    // remove item active old
    let itemActiveOld = document.querySelector('.slider .list .item.active');
    let thumbnailActiveOld = document.querySelector('.thumbnail .item.active');
    itemActiveOld.classList.remove('active');
    thumbnailActiveOld.classList.remove('active');

    // active new item
    items[itemActive].classList.add('active');
    thumbnails[itemActive].classList.add('active');

    // clear auto time run slider
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => {
        next.click();
    }, 29000)
}

// click thumbnail
thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener('click', () => {
        itemActive = index;
        showSlider();
    })
})
</script>


    </body>
</html>
    


