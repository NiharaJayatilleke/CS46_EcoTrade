<?php require APPROOT.'/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/admin/dashboard.css">

    <div class="dashboard-container">
        <div class="dashboard-sidenav">
            <ul>
                <li>
                    <a href="<?php echo URLROOT ?>/Pages/index">
                        <span class = "side-icon"><img src="<?php echo URLROOT?>/public/img/index/logo1.png" alt="Logo" class="logo" width="40" height="30" top="50"></span>
                        <span class = "side-title">EcoTrade</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/Pages/index">
                        <span class = "side-icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class = "side-title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#dashboard-content" id="dashboard-tab" onclick="showContent('dashboard-content')">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#recycle-content" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Your ads</span>
                    </a>
                </li>                               

                <li>
                    <!-- <a href=""> -->
                    <a href="#center-content" id="center-tab" onclick="showContent('center-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Your account</span>
                    </a>
                </li>


                <li>
                <a href="<?php echo URLROOT ?>/Users/logout" id="signout-tab" onclick="showContent('signout-content')">
                        <span class = "side-icon"><ion-icon name="log-out-outline"></ion-icon></span> 
                        <span class = "side-title">Sign out</span>
                    </a>
                </li>
            </ul>
        </div>

        
      
    <!-- main -->
        <div class="dashboard-main">
            <div class="dashboard-topbar">
                <div class="dashboard-toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <!-- search -->
                <div class="dashboard-search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- userImg -->
                <div class="dashboard-user">
                    <img src="<?php echo URLROOT; ?>/img/admin/dashboard/3.jpeg">
                    <!-- <?php
                    if (isset($data['user']) && !empty($data['user'])) {
                        echo '<img src="' . URLROOT . '/public/img/profilepic/' . $data['user'] . '>';
                    } else {
                        echo '<img src="' . URLROOT . '/public/img/profile.png>';
                    }
                    ?> -->
                </div>
            </div>
            
            <!-- cards -->
            <div id="dashboard-content" class="content-section">
                <div class="heading-dashboard">
                        <h2>Recycle Centers Dashboard</h2>
                    </div>

                    <!-- Post Requirements Button -->
                    <div class="dashboard-cardBox">
                        <a href="<?php echo URLROOT ?>/RecycleCenters/addRequirement" style="text-decoration: none; color: inherit;">
                            <div class="dashboard-card">
                                <div>
                                    <!-- <div class="dashboard-numbers"><?php echo $data['rec_ad_count'] ?></div>  -->
                                    <div class="dashboard-cardName"><h3>Post Requirement<h3></div>
                                </div>
                                <div class="dashboard-iconBx">  
                                    <ion-icon name="leaf"></ion-icon>  
                                </div>
                            </div>
                        </a>        
                    </div>

                    <div class="details" style=" display: block;">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Recently Posted Requirements</h2>
                                <a href="#" class="btn">View All</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Category</td>
                                        <td>Description</td>
                                        <td>Quantity</td>
                                        <td>Posted</td>
                                        <td>Edit/Delete</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($data['center_reqs'] as $req): ?>
                                        <tr>
                                            <td><?= $req->item_category ?></td>
                                            <td><?= $req->item_desc ?></td>
                                            <td><?= $req->item_quantity ?></td>
                                            <td><?php echo convertTime($req->created_at); ?></td>
                                            <td>
                                                <div class = "mod-control-btns">
                                                    <a href="<?php echo URLROOT?>/Moderators/edit/<?php echo $moderator->id?>?updated=true"><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                                    <button onclick="confirmDeleteModerators('<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id ?>')" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                <!-- <tr>
                                    <td>Refrigerator</td>
                                    <td>Rs. 1200</td>
                                    <td>Paid</td>
                                    <td><span class="status inprogress">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td>Denim Shirts</td>
                                    <td>Rs. 110</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>

                                <tr>
                                    <td>Casual Shoes</td>
                                    <td>Rs. 575</td>
                                    <td>Paid</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Wall Fan</td>
                                    <td>Rs. 110</td>
                                    <td>Paid</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>Jeans</td>
                                    <td>Rs. 1200</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>
                                <tr>
                                    <td>Sweaters</td>
                                    <td>Rs. 700</td>
                                    <td>Due</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>

                                <tr>
                                    <td>Skirts</td>
                                    <td>Rs. 600</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>

                                <tr>
                                    <td>Formal Shoes</td>
                                    <td>Rs. 2000</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>


                                <tr>
                                    <td>Sunglasses</td>
                                    <td>Rs. 800</td>
                                    <td>Due</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>

                                <tr>
                                    <td>Hoodies</td>
                                    <td>Rs. 900</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>

                                <tr>
                                    <td>Denim Shirts</td>
                                    <td>Rs. 110</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>

                                <tr>
                                    <td>Checked Dresses</td>
                                    <td>Rs. 1500</td>
                                    <td>Paid</td>
                                    <td><span class="status delivered">Delivered</span></td>
                                </tr>

                                <tr>
                                    <td>Sports Shoes</td>
                                    <td>Rs. 2500</td>
                                    <td>Due</td>
                                    <td><span class="status pending">Pending</span></td>
                                </tr>

                                <tr>
                                    <td>T-shirts</td>
                                    <td>Rs. 300</td>
                                    <td>Due</td>
                                    <td><span class="status inprogress">In Progress</span></td>
                                </tr>  -->

                                </tbody>
                            </table>
                        </div>
                    </div> 
            </div>


            <div id="recycle-content" class="content-section">

                <div class="details" style=" display: block;">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Posted Requirements</h2>
                            <!-- <a href="#" class="btn">View All</a> -->
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Category</td>
                                    <td>Description</td>
                                    <td>Quantity</td>
                                    <td>Posted</td>
                                    <td>Edit/Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['center_reqs'] as $req): ?>
                                    <tr>
                                        <td><?= $req->item_category ?></td>
                                        <td><?= $req->item_desc ?></td>
                                        <td><?= $req->item_quantity ?></td>
                                        <td><?php echo convertTime($req->created_at); ?></td>
                                        <td>
                                            <div class = "mod-control-btns">
                                                <a href="<?php echo URLROOT?>/Moderators/edit/<?php echo $moderator->id?>?updated=true"><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                                <button onclick="confirmDeleteModerators('<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id ?>')" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>





                <!-- <div class="ad-right-container">
                    <?php if (!empty($data['ads'])) : ?>
                    <div class="ads-container">
                        <?php foreach($data['ads'] as $ad): ?>
                        <a class="ad-show-link" href="<?php echo URLROOT;?>/ItemAds/show/<?php echo $ad->ad_id?>">
                            <div class="ad-index-container"
                                data-price="<?php echo $ad->item_price ?>"
                                data-condition="<?php echo $ad->item_condition ?>"
                                data-category="<?php echo $ad->item_category ?>"
                                data-condition="<?php echo $ad->item_condition ?>">

                                <div class="ad-header">
                                    <div class="ad-body-image">
                                        <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Ad Image" width="100" height="80">
                                    </div>
                                    <!-- <php if($ad->seller_id == $_SESSION['user_id']): ?> 
                                            <div class = "post-control-btns">
                                                <a href = "<php echo URLROOT?>/ItemAds/edit/<?php echo $ad->ad_id?>"><button class="ad-edit-btn" title="edit ad"><i class="fas fa-edit"></i></button></a>
                                                <a href = "<php echo URLROOT?>/ItemAds/delete/<?php echo $ad->ad_id?>"><button class="ad-delete-btn" title="delete ad"><i class="fas fa-trash-alt"></i></button></a>
                                                <a href = "<php echo URLROOT?>/ItemAds/report/<?php echo $ad->ad_id?>"><button class="ad-report-btn" title="report ad"><i class="fas fa-flag"></i></button></a> 
                                            </div>
                                        <php endif; ?> 
                                    <div class="ad-item-name"><h3><?php echo $ad->item_name ?></h3></div>
                                    <div class="ad-user-name">Seller: <?php echo $ad->seller_name ?></div>
                                    <div class="ad-created-at"><?php echo convertTime($ad->item_created_at); ?></div>
                                </div>

                                <div class="ad-body">
                                    <div class="ad-body-desc"><?php echo $ad->item_desc ?></div>
                                    <div class="ad-price">Rs. <?php echo $ad->item_price ?></div>
                                </div>

                                <div class="ad-footer">
                                    <div>
                                        <a href=""><button class="ad-contact-btn">Contact Seller</button></a>
                                        <?php if($ad->negotiable == 'yes'): ?>
                                        <a href=""><button class="ad-offer-btn">Make Offer</button></a>
                                        <?php endif; ?>
                                        <?php if($ad->selling_format == 'auction'): ?> 
                                        <a href=""><button class="ad-bid-btn">Bid</button></a>
                                        <?php endif; ?>
                                        <!-- <a href = ""><button class="ad-wishlist-btn"><i class="fas fa-heart"></i></button></a> 
                                        <!-- <a href="#"><button class="ad-wishlist-btn"><img src="/img/icons/wishlist.png" alt="Wishlist Icon"></button></a> 
                                    </div>
                                </div>  
                            </div>
                        </a>
                        <?php endforeach; ?>
                        <div id="noResults" style="display:none;">
                            <h1>No Results Found</h1>
                        </div>
                    </div>
                    <?php else : ?>
                    <div style="font-size: 20px;margin: 30px 50px;">
                        <p>No results found for <b>"<?php echo !empty($data['searchQuery']) ? htmlspecialchars($data['searchQuery']) : ''; ?>"</b>.</p>
                        <p>Try checking your spelling or use more general terms</p>
                    </div>
                    <?php endif; ?>
                </div> -->

            
            </div>

            <div id="center-content" class="content-section">
            <p>This is the content for the centers tab.</p> 
            </div>

            <div id="signout-content" class="content-section">
            <p>This is the content for the signout tab.</p>
            </div>

        </div>
    </div>

    <script>
    // Function to show/hide content sections based on the clicked tab
    function showContent(section) {
        // event.preventDefault();
        // Hide all content sections
        document.getElementById('dashboard-content').style.display = 'none';
        document.getElementById('recycle-content').style.display = 'none';
        document.getElementById('center-content').style.display = 'none';
        document.getElementById('signout-content').style.display = 'none';

        // Show the selected content section
        document.getElementById(section).style.display = 'block';

         // Update the URL hash to store the current section
        window.location.hash = '#' + section;
    }

    // Function to handle initial content section based on URL hash
    function handleInitialSection() {
        var hash = window.location.hash;
        if (hash) {
            // Extract the section name from the hash
            var section = hash.substring(1); // Remove '#'
            showContent(section);
            currentSection = section;
        } else {
            // If no hash is present, default to the dashboard section
            showContent('dashboard-content');
            currentSection = 'dashboard-content';
        }
    }
   handleInitialSection(); 
    // Call the function when the page loads
    window.onload = handleInitialSection;

    // Function to redirect to the current active section
    function redirectToCurrentSection() {
    // Get the current hash from the URL
    var hash = window.location.hash;
    if (hash) {
        // Redirect to the current active section
        var section = hash.substring(1);
        window.location.href = '<?php echo URLROOT; ?>/moderators/index' + hash;
        showContent(section);
    }
}
    
    </script>
    <!-- Get the user counts data from PHP and convert it to JavaScript object -->
    <script>var userCounts = <?php echo json_encode($data['userCounts']); ?>;

</script> 
        <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
   
    





