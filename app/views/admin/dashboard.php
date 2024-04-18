<?php require APPROOT.'/views/inc/header.php'; ?>

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
                    <!-- <a href="<?php echo URLROOT ?>/Admin/index"> -->
                    <a href="#dashboard-content" id="dashboard-tab" onclick="showContent('dashboard-content')">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <!-- <a href="<?php echo URLROOT ?>/Admin/moderators"> -->
                    <a href="#moderators-content" id="moderators-tab" onclick="showContent('moderators-content')">
                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Moderators</span>
                    </a>
                </li>

                <li>
                    <!-- <a href="<?php echo URLROOT ?>/Admin/moderators"> -->
                    <a href="#users-content" id="users-tab" onclick="showContent('users-content')">
                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Users</span>
                    </a>
                </li>

                <li>
                    <a href="#secondhand-content" id="secondhand-tab" onclick="showContent('secondhand-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Preowned Ads</span>
                    </a>
                </li>                               

                <li>
                    <!-- <a href=""> -->
                    <a href="#recycle-content" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Recycling Ads</span>
                    </a>
                </li>

                <li>
                    <!-- <a href="#"> -->
                    <a href="#messages-content" id="messages-tab" onclick="showContent('messages-content')">
                        <span class = "side-icon"><ion-icon name="mail-open-outline"></ion-icon></span>
                        <span class = "side-title">Messages</span>
                    </a>
                </li>
                <li>
                    <!-- <a href="#"> -->
                    <a href="#ad-report-content" id="ad-report-tab" onclick="showContent('ad-report-content')">
                        <span class = "side-icon"><ion-icon name="remove-circle-outline"></ion-icon></span>
                        <span class = "side-title">Ad Report</span>
                    </a>
                </li>
                <li>
                    <!-- <a href="#"> -->
                    <a href="#settings-content" id="settings-tab" onclick="showContent('settings-content')">
                        <span class = "side-icon"><ion-icon name="cog-outline"></ion-icon></span>
                        <span class = "side-title">Settings</span>
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
                <div id="dashboard-search" class="dashboard-search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <!-- tabs -->
                <a href="#settings-content" id="settings-tab"></a>
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

            <!-- dashboard admin -->
            <div id="dashboard-content" class="content-section">
                <div class="heading-dashboard">
                    <h2>Admin Dashboard</h2>
                </div>
                
                <div class="dashboard-cardBox">
                    <a href="<?php echo URLROOT ?>/Admin/users#users-content" style="text-decoration: none; color: inherit;">
                        <div class="dashboard-card">
                            <div>
                                <div class="dashboard-numbers"><?php echo $data['users_count'] ?></div> 
                                <div class="dashboard-cardName">Users</div>
                            </div>
                            <div class="dashboard-iconBx">   
                                <ion-icon name="people-outline"></ion-icon>     
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT ?>/Admin/moderators#moderators-content" style="text-decoration: none; color: inherit;">
                        <div class="dashboard-card">
                            <div>
                                <div class="dashboard-numbers" ><?php echo $data['moderators_count'] ?></div> 
                                <div class="dashboard-cardName">Moderators</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="people-circle-outline"></ion-icon>     
                            </div>
                        </div>
                    </a>

                    <a href="<?php echo URLROOT ?>/Admin/moderators#secondhand-content" style="text-decoration: none; color: inherit;">
                        <div class="dashboard-card">
                            <div>
                                <div class="dashboard-numbers"><?php echo $data['sec_ad_count'] ?></div> 
                                <div class="dashboard-cardName">Pre-owned Item Ads</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="pricetags"></ion-icon>  
                            </div>
                        </div>
                    </a>
                    


                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers">80</div> 
                            <div class="dashboard-cardName">Recycling Ads</div>
                        </div>
                        <div class="dashboard-iconBx"> 
                            <ion-icon name="leaf"></ion-icon>   
                        </div>
                    </div>
                </div>

                <div class="graphBox">
                    <div class="box">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="box">
                        <canvas id="ads"></canvas>
                    </div>
                </div>

                <div class="details" style=" display: block;" >
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Recent Orders</h2>
                            <a href="#" class="btn">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Payment</td>
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
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


                            <!-- <tr>
                                <td>Adidas Shoes</td>
                                <td>Rs. 1100</td>
                                <td>Paid</td>
                                <td><span class="status return">Return</span></td>
                            </tr>

                            <tr>
                                <td>Wall Art</td>
                                <td>Rs. 110</td>
                                <td>Paid</td>
                                <td><span class="status delivered">Pending</span></td>
                            </tr> -->

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
                            </tr>

                            </tbody>
                        </table>
                    </div>
                    <!-- New customers -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Recent Customers</h2>
                        </div>
                        <table>
                            <tr>
                                <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/1.jpeg"></div></td>
                                <td><h4>David<br><span>Western Province - Colombo</span></h4></td>
                            </tr>
                            <tr>
                                <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/2.jpeg"></div></td>
                                <td><h4>John<br><span>Western Province - Colombo</span></h4></td>
                            </tr>

                            <tr>
                            <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/3.jpeg"></div></td>
                                <td><h4>Emily<br><span>Central Province - Kandy</span></h4></td>
                            </tr>

                            <tr>
                                <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/4.jpeg"></div></td>
                                <td><h4>Sara<br><span>Eastern Province - Trincomalee</span></h4></td>
                            </tr>
                            <tr>
                                <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/5.jpeg"></div></td>
                                <td><h4>Michael<br><span>Northern Province - Jaffna</span></h4></td>
                            </tr>

                            <tr>
                                <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/6.jpeg"></div></td>
                                <td><h4>Samantha<br><span>Southern Province - Galle</span></h4></td>
                            </tr>

                            <tr>
                                <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/7.jpeg"></div></td>
                                <td><h4>Ravi<br><span>North Central Province - Anuradhapura</span></h4></td>
                            </tr>

                            <tr>
                                <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/1.jpeg"></div></td>
                                <td><h4>Ravindra<br><span>Central Province - Kandy</span></h4></td>
                            </tr>
                        </table>
                    </div>


                </div>
            </div>
        
            <!-- Moderators crud-->
            <div id="moderators-content" class="content-section">
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Moderators</h2>
                            <a href="<?php echo URLROOT ?>/moderators/register" class="btn">Add Moderator</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>Contact Number</td>
                                    <td>Date Joined</td>
                                    <td>Edit/Delete</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['moderators'] as $moderator) : ?>
                            <tr>
                                <td><p><?php echo $moderator->username ?></p></td>
                                <td><?php echo $moderator->email ?></td>
                                <td><?php echo $moderator->number ?></td>
                                <td><?php echo $moderator->created_at ?></td>
                                <td>
                                    <div class = "mod-control-btns">
                                        <a href = "<?php echo URLROOT?>/Moderators/edit/<?php echo $moderator->id?>"><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                        <button onclick="confirmDelete('<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id ?>')" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- User crud-->
            <div id="users-content" class="content-section">
                <div class="details">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Users</h2>
                            <!-- <a href="<?php echo URLROOT ?>/Users/register" class="btn">Add User</a> -->
                        </div>
                        <table id="users-table">
                            <thead>
                                <tr>
                                    <td>Username</td>
                                    <td>Email</td>
                                    <td>Contact Number</td>
                                    <td>User Type</td>
                                    <td>Date Joined</td>
                                    <!-- <td>Edit/Delete</td> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($data['users'] as $user) : ?>
                            <tr>
                                <td><p><?php echo $user->username ?></p></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo $user->number ?></td>
                                <td><span class="usertype <?php echo $user->user_type ?>"><?php echo $user->user_type ?></span></td>
                                <td><?php echo $user->created_at ?></td>
                                <!-- <td>
                                    <div class = "mod-control-btns">
                                        <a href = "<?php echo URLROOT?>/Users/edit/<?php echo $moderator->id?>"><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                        <button onclick="confirmDelete('<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id ?>')" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td> -->
                            </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Second hand ads-->
            <div id="secondhand-content" class="content-section">
                <div class="heading-dashboard">
                    <h2>Preowned Ads</h2>
                </div>

                <div class="ad-right-container">
                    <?php if (!empty($data['ads'])) : ?>
                    <div class="ads-container">
                        <?php foreach($data['ads'] as $ad): ?>
                        <!-- <a class="ad-show-link" href="<?php echo URLROOT;?>/ItemAds/show/<?php echo $ad->ad_id?>"> -->
                        <a class="ad-show-link" onclick="showAdContent('<?php echo $ad->ad_id; ?>')">
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
                                        <php endif; ?> -->
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
                                        <!-- <a href = ""><button class="ad-wishlist-btn"><i class="fas fa-heart"></i></button></a> -->
                                        <!-- <a href="#"><button class="ad-wishlist-btn"><img src="/img/icons/wishlist.png" alt="Wishlist Icon"></button></a> -->
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
                </div>
            </div>

            <!-- Secondhand Ad View -->
            <div id="secondhand-ad-view-content" class="content-section">

                <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/v_buyer_view.css">
                <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/item_Ads/seller_only_styles.css">

                <div class="sad-main-container1-in-dashboards">
                    <div class="sad-main2"></div>
                        <div class = "sad-item-name"><h1><?php echo $data['ad']->item_name ?><h1></div>
                        <div class = "sad-p1"><p>Posted on <?php echo $data['ad']->item_created_at ?></p></div>

                        <div class="sad-container2">
                        <div class="sad-left-container">
                        
                            <div class="sad-big-photo">
                                <a href="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" data-lightbox="sad-ad-img">
                                    <img class="sad-ad-img" src="<?php echo URLROOT?>/public/img/items/<?php echo $data['ad']->item_image ?>" alt="Ad Image">
                                </a>
                            </div>
                            <div class="sad-small-images">
                                <!-- <img id="s1" src="productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')"> -->
                                <!-- <img id="s1" src="<?php echo URLROOT?>/public/img/prodetails/productDetails1.png" alt="Small Image 1" onclick="displayBigImage('productDetails1.png')">

                                <img id="s2" src="<?php echo URLROOT?>/public/img/prodetails/productDetails2.jpeg" alt="Small Image 2" onclick="displayBigImage('/pics/productDetails2.jpeg')"> -->
                                <!-- Add more small images as needed -->
                            </div>
                            <div class="sad-desMain">
                                <div class="sad-heading">
                                    <div class = "sad-price"><h2>Rs. <?php echo $data['ad']->item_price ?></h2></div>
                                    <div class = "sad-details">
                                    <?php if ($data['ad']->negotiable == "yes") : ?>
                                        <p class = "sad-neg">Negotiable</p>
                                    <?php else : ?>
                                        <p class = "sad-neg">Non-Negotiable</p>
                                    <?php endif; ?>
                                    <div class = "sad-condition">Condition: <?php echo $data['ad']->item_condition ?></div>
                                    <p>Quantity: 1</p>
                                    <br>
                                    </div>
                                </div>

                                <div class="sad-description">
                                    <div class="sad-desHead">
                                        <h3> Product Description</h1>
                                    </div>
                                    <div class="sad-desP">
                                        <?php echo $data['ad']->item_desc ?>
                                    </div>
                                </div>
                            </div>

                            <div class="sad-line"></div>

                    </div>

                    <div class="sad-right-container">
                        <div class="sad-b3">
                            <i class="fas fa-store fa-lg"></i>
                            <div class="sad-b3-p1">
                            <p>Sold by <?php echo $data['ad']->seller_name?></p>
                            </div>
                        </div>

                        <div class="sad-b3">
                            <i class="fas fa-map-marker-alt fa-lg"></i>
                            <div class="sad-b3-p2">
                            <p><?php echo $data['ad']->item_location?></p>
                            </div>
                        </div>

                        <div class="sad-b3">
                            <i class="fas fa-phone fa-lg"></i>
                            <div class="sad-b3-p3">
                            <button id="show-number" class="sad-number" data-number="<?php echo $data['number']?>"> Contact Seller</button>
                            </div>
                        </div>

                        <div class = "Offers-Bids">
                        <!-- HTML for displaying the accepted offer price -->
                        <?php if (isset($data['accepted_offer']->offer_status) == 'accepted') : ?>
                            <br><div class="accepted-offer">
                                <p class="accepted-offer-message">The seller is willing to accept an offer of Rs.<span id="accepted-offer-price"><?php echo $data['accepted_offer']->offer_amount; ?></span></p>
                                <!-- <p class="accepted-offer-message">The seller is willing to accept an offer of Rs.<span id="accepted-offer-price"></span></p> -->
                            </div><br>
                        <?php endif; ?>

                        <!-- HTML for displaying offers-->
                        <div class='offers-list'> 
                        <?php if ($_SESSION['user_id'] == $data['ad']->seller_id && empty($data['accepted_offer']) && $data['ad']->negotiable == "yes") : ?>
                        <?php if (!empty($data['offers'])) : ?>
                            <div class="offer-title"><h3>Highest Offers</h3></div>
                            <?php 
                            $count = 0;
                            foreach ($data['offers'] as $offer) : 
                                if ($count == 3) break;
                            ?>
                                <div class="offer-details" data-offer-id="<?php echo $offer->offer_id; ?>">
                                    <p class="offer-message">New Offer: Rs.<?php echo $offer->offer_amount; ?></p>
                                </div>
                            <?php 
                                $count++;
                            endforeach; ?>
                        <?php endif; ?>
                        <?php endif; ?>
                        </div>

                        <!-- HTML for displaying the bids -->
                        <?php if ($data['ad']->selling_format == 'auction' && $_SESSION['user_id'] == $data['ad']->seller_id) : ?>
                        <br>
                        <div class="offer-title"><h3>Bidding Overview</h3></div>
                        <div class="bid-info">
                            <p>Time Remaining: <span id="timeRemaining"><?php echo $data['remaining_time'];?> </span></p>
                            <div class="bid-stats">
                                <p>Number of Bids: <span id="numBids"><?php echo $data['bid_count'];?></span></p>
                            </div>
                            <?php if ($_SESSION['user_id'] == $data['ad']->seller_id && $data['remaining_time'] == 'Auction Ended') : ?>
                                <button id="reopenBidding">Reopen Bidding</button><br>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                        
                        </div> <!-- seller's stuff -->

                    </div>
                </div>
                </div>

                <!-- <br> -->
                <div class="sad-main-container2">
                <div class="sad-main-container3-left-in-dashboards">
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

                        <!-- Message Thread -->
                        <div id = "results"></div>

                    </div>  

                </form>
                </div>
                </div>

            </div>

            <!-- Recycle ads-->
            <div id="recycle-content" class="content-section">
                <div class="heading-dashboard">
                    <h2>Recycle Ads</h2>
                </div>
                <p>This is the content for the Recycle tab.</p> 
            </div>

            <!-- Messages -->
            <div id="messages-content" class="content-section">
                <div>
                    <!-- logic here for messages -->
                </div>
            </div>

            <!-- Ad Report -->
            <div id="ad-report-content" class="content-section">
                <div>
                    <!-- logic here for ad report -->
                </div>
            </div>

            <div id="settings-content" class="content-section">
                <div class="profile-settings-container">
                    <div class="tabs-container">
                        <button class="tab-link active" onclick="openTab(event, 'general')">General</button>
                        <button class="tab-link" onclick="openTab(event, 'change-password')">Change Password</button>
                        <button class="tab-link" onclick="openTab(event, 'notification')">Notification</button>
                    </div>

                    <div id="general" class="tab-content active">
                                <div class="col-md-3 pt-0">
                                    <div class="profile_image">
                                        <div class="image-container">
                                            <?php
                                            if (!empty($data['userdetails']->profile_image)) {
                                                echo '<img src="' . URLROOT . '/public/img/profilepic/' . $data['userdetails']->profile_image . '" alt="Profile Image" class="d-block ui-w-80" id="profile-pic">';
                                            } else {
                                                echo '<img src="' . URLROOT . '/public/img/profile.png" alt="Default Profile Image" class="d-block ui-w-80" id="profile-pic">';
                                            }
                                            ?>
                                        </div>
                                    </div>  
                                    <form method="POST" action="<?php echo URLROOT; ?>/moderators/index" enctype="multipart/form-data">               
                                        <div class="media-body">
                                            <div class="file-upload">
                                                <label for="upload-photo">Browse Photo</label>
                                                <input type="file" id="upload-photo" name="photo" accept="image/*">
                                            </div>
                                            <button class="savebutton" type="submit">Save</button> 
                                        </div>
                                    </form>
                                <?php if (!empty($data['userdetails']->profile_image)) : ?>
                                    <form method="POST" action="<?php echo URLROOT; ?>/users/remove_photo">
                                        <input type="hidden" name="photo_id" value="<?php echo $data['userdetails']->id; ?>">
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this photo?')">Delete Photo</button>
                                    </form>
                                <?php endif; ?>
                                </div>
                                <form id="editProfileForm">
                                <div class="right-below">
                                    <div class="right-left">
                                        <div class="tab-pane fade active show" id="account-general">
                                            <div class="card-body media align-items-center"></div>
                                            <div class="card-body">
                                                <!-- <form method="POST" action="<?php echo URLROOT; ?>/moderators/edit_profile"> -->
                                                    <div class="form-group">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" class="form-control input-field-box" name="newUsername" value="<?php echo $_SESSION['user_name']; ?>">
                                                        <?php if (!empty($data['errors']['newUsername'])) : ?>
                                                            <div class="form-invalid"><?php echo $data['errors']['newUsername']; ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">E-mail</label>
                                                        <input type="text" class="form-control input-field-box" value="<?php echo $_SESSION['user_email']; ?>" disabled>
                                                    </div>
                                                  
                                                    <div class="profile-buttons">
                                                        <button class="profile-updatebt">Edit profile</button>
                                                    </div>
                                                <!-- </form> -->
                                                <div style="margin-top: 20px;">
                                                    <?php flash('profile_edit'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right-right">
                                    <div class="form-group">
                                                        <label class="form-label">Contact number</label>
                                                        <input type="text" class="form-control input-field-box" name="newContactNumber" value="<?php echo $_SESSION['user_number']; ?>">
                                                        <?php if (!empty($data['errors']['newContactNumber'])) : ?>
                                                            <div class="form-invalid"><?php echo $data['errors']['newContactNumber']; ?></div>
                                                        <?php endif; ?>
                                                    </div>
                                        <div class="form-group">
                                            <label class="form-label">User-type</label>
                                            <input type="text" class="form-control input-field-box " value="<?php echo $_SESSION['userType']; ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                </form>

                    </div>

                    <div id="change-password" class="tab-content">
                        <h3>Change Password</h3>
                        <p>Change your password here.</p>
                    </div>
                    <div id="notification" class="tab-content">
                        <h3>Notification Settings</h3>
                        <p>Customize your notification preferences here.</p>
                    </div>
                </div>
            </div>
                
        </div>
    </div>

    <script>
    // Function to show/hide content sections based on the clicked tab
    function showContent(section) {
        // event.preventDefault();
        // Hide all content sections
        document.getElementById('dashboard-content').style.display = 'none';
        document.getElementById('moderators-content').style.display = 'none';
        document.getElementById('users-content').style.display = 'none';
        document.getElementById('secondhand-content').style.display = 'none';
        document.getElementById('secondhand-ad-view-content').style.display = 'none';
        document.getElementById('recycle-content').style.display = 'none';
        document.getElementById('messages-content').style.display = 'none';
        document.getElementById('ad-report-content').style.display = 'none';
        document.getElementById('settings-content').style.display = 'none';

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
    var users = <?php echo json_encode($data['users']); ?>;
    </script> 

    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/alerts.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/ad_view.js"></script>

    <script type ="text/JavaScript">
        var URLROOT ="<?php echo URLROOT; ?>"
        var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
    </script>


    <!-- JS for messages -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/message_load.js"></script> -->

    <!-- JS for buyer messages/notifications -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/buyer_notifs.js"></script> -->

    <!-- JS for Offers -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/offers.js"></script> -->

    <!-- JS for Bids -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/bids.js"></script> -->

    <!-- JS for other interactions -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/other_interactions.js"></script>
    






