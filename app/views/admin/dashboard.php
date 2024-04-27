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

                <!-- <li>
                    <a href="<?php echo URLROOT ?>/Pages/index">
                        <span class = "side-icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class = "side-title">Home</span>
                    </a>
                </li> -->

                <li>
                    <a href="#dashboard-content" id="dashboard-tab" onclick="showContent('dashboard-content')">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="#users-content" id="users-tab" onclick="showContent('users-content')">
                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Users</span>
                    </a>
                </li>

                <li>
                    <a href="#moderators-content" id="moderators-tab" onclick="showContent('moderators-content')">
                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Moderators</span>
                    </a>
                </li>

                <li>
                    <a href="#centers-content" id="centers-tab" onclick="showContent('centers-content')">
                        <span class = "side-icon"><ion-icon name="business-outline"></ion-icon></span>
                        <span class = "side-title">Recycle Center</span>
                    </a>
                </li>


                <li>
                    <a href="#secondhand-content" id="secondhand-tab" onclick="showContent('secondhand-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Preowned Ads</span>
                    </a>
                </li>                               

                <li>
                    <a href="#recycle-content" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Recycling Ads</span>
                    </a>
                </li>

                <li>
                    <a href="#activity-content" id="activity-tab" onclick="showContent('activity-content')">
                        <span class = "side-icon"><ion-icon name="globe-outline"></ion-icon></span>
                        <span class = "side-title">Activity Log</span>
                    </a>
                </li>
                <li>
                    <a href="#reported-ads-content" id="reported-ads-tab" onclick="showContent('reported-ads-content')">
                        <span class = "side-icon"><ion-icon name="remove-circle-outline"></ion-icon></span>
                        <span class = "side-title">Reported ads</span>
                    </a>
                </li>
                <li>
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
                <div id="admin-dashboard-search" class="dashboard-search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <!-- tabs -->
                <a href="#settings-content" id="settings-tab"></a>
                <!-- userImg -->
                <div class="dashboard-user">
                <?php
                // if the user has uploaded an image display it . other wise display the default image
                if (isset($_SESSION['user_image']) && !empty($_SESSION['user_image'])) {
                    echo '<img src="' . URLROOT . '/public/img/profilepic/' . $_SESSION['user_image'] . '" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
                } else {
                    echo '<img src="' . URLROOT . '/public/img/profile.png" onClick="Myfunction()" alt="user" class="user" width="80" height="30">';
                }
                ?>
                </div>
            </div>

            <!-- dashboard admin -->
            <div id="dashboard-content" class="content-section">
                <div class="heading-dashboard">
                    <h2>Admin Dashboard</h2>
                </div>
                
                <div class="dashboard-cardBox">
                    <a href="<?php echo URLROOT ?>/Admin/index#users-content" style="text-decoration: none; color: inherit;">
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

                    <a href="<?php echo URLROOT ?>/Admin/index#moderators-content" style="text-decoration: none; color: inherit;">
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

                    <div class="dashboard-card" >
                            <div>
                                <div class="dashboard-numbers" ><?php echo $data['collectors_count'] ?></div> 
                                <div class="dashboard-cardName">Collectors</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="people-circle-outline"></ion-icon>     
                            </div>
                    </div>

                    <div class="dashboard-card" >
                                <div>
                                    <div class="dashboard-numbers" ><?php echo $data['centers_count'] ?></div> 
                                    <div class="dashboard-cardName">Recycle centers</div>
                                </div>
                                <div class="dashboard-iconBx">  
                                <ion-icon name="business-outline"></ion-icon>
                                </div>
                    </div>

                    <a href="<?php echo URLROOT ?>/Admin/index#secondhand-content" style="text-decoration: none; color: inherit;">
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

                    <a href="<?php echo URLROOT ?>/Admin/index#recycle-content" style="text-decoration: none; color: inherit;">
                        <div class="dashboard-card">
                            <div>
                                <div class="dashboard-numbers"><?php echo $data['rec_ad_count'] ?></div> 
                                <div class="dashboard-cardName">Recycling Item Ads</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="leaf"></ion-icon>  
                            </div>
                        </div>
                    </a>
                    
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
                            <h2>Recent Activities</h2>
                            <a href="#activity-content" class="btn" id="activity-tab" onclick="showContent('activity-content')">View All</a>
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>User ID</td>
                                    <td>User Type</td>
                                    <td>Action Type</td>
                                    <td>Action Details</td>
                                    <td>Date Time</td>
                                    <!-- <td>Item Ad</td> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $counter = 0;
                            foreach($data['recentActivities'] as $activity) : 
                                if($counter == 5) break;
                            ?>
                                <tr>
                                    <td><?php echo $activity->user_id; ?></td>
                                    <td><span class="usertype <?php echo $activity->user_type ?>"><?php echo $activity->user_type ?></span></td>
                                    <td><?php echo $activity->action_type; ?></td>
                                    <td><?php echo $activity->action_details; ?></td>
                                    <td><?php echo $activity->timestamp; ?></td>
                                    <td>
                                    <?php if ($activity->action_type == 'PreownedAd Creation' || $activity->action_type == 'RecycleAd Creation') : ?>
                                    <div class="cardHeader">
                                    <a class="btn" style="border: 1px solid white;">View Ad</a></div>
                                    <?php endif; ?>
                                    </td>
                                </tr>
                            <?php 
                            $counter++;
                            endforeach; 
                            ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- New customers -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Users</h2>
                            <a href="#users-content" class="btn" id="users-tab" onclick="showContent('users-content')">View All</a>
                        </div>
                        <table>
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
                            <?php 
                            $counter = 0;
                            foreach($data['users'] as $user) : 
                                if($counter == 5) break;
                            ?>
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
                            <?php 
                            $counter++;
                            endforeach; 
                            ?>
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
                                    <td>Status</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(empty($data['users'])): ?>
                                    <tr>
                                        <td colspan="5">No users found</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($data['users'] as $user) : ?>
                                    <tr>
                                        <td><p><?php echo $user->username ?></p></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php echo $user->number ?></td>
                                        <td><span class="usertype <?php echo $user->user_type ?>"><?php echo $user->user_type ?></span></td>
                                        <td><?php echo $user->created_at ?></td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" onclick="toggleBan(this, '<?php echo $user->id ?>')" <?php echo $user->status == 1 ? 'checked' : '' ?>>
                                                <span class="slider"></span>
                                            </label>
                                        </td>
                                        <!-- <td>
                                            <div class = "mod-control-btns">
                                                <button onclick="confirmBan('<?php echo URLROOT?>/Admin/ban/<?php echo $user->id ?>')" class="ad-edit-btn"><i class="fas fa-ban"></i></button>
                                            </div>
                                        </td> -->
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
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
                        <table id="moderators-table">
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
                                <?php if(empty($data['moderators'])): ?>
                                    <tr>
                                        <td colspan="5">No moderators found</td>
                                    </tr>
                                <?php else: ?>
                                    <?php foreach($data['moderators'] as $moderator) : ?>
                                    <tr>
                                        <td><p><?php echo $moderator->username ?></p></td>
                                        <td><?php echo $moderator->email ?></td>
                                        <td><?php echo $moderator->number ?></td>
                                        <td><?php echo $moderator->created_at ?></td>
                                        <td>
                                            <div class = "mod-control-btns">
                                                <a href="<?php echo URLROOT?>/Moderators/edit/<?php echo $moderator->id?>?updated=true"><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                                <button onclick="confirmDeleteModerators('<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id ?>')" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recycle Centers crud-->
            <div id="centers-content" class="content-section">
                //somec content
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
                            <div class="ad-index-container" data-ad-id="<?php echo $ad->ad_id ?>"

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
                                                <a href = "<php echo URLROOT?>/ItemAds/report/<?php echo $ad->ad_id?>"><button class="reported-ads-btn" title="report ad"><i class="fas fa-flag"></i></button></a> 
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
                        <div class = "sad-item-name"><h1><h1></div>
                        <div class = "sad-p1"><p>Posted on</p></div>

                        <div class="sad-container2">
                        <div class="sad-left-container">
                        
                            <div class="sad-big-photo">
                                <a href="#" data-lightbox="sad-ad-img">
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
                <!-- centers should be fetched here -->

                <div class="heading-dashboard">
                    <h2>Recycle Item Ads</h2>
                </div>

                <div class="ad-right-container">
                    <?php if (!empty($data['rec_ads'])) : ?>
                        <div class="ads-container">
                            <?php foreach($data['rec_ads'] as $ad): ?>
                                <!-- <a class="ad-show-link" onclick="showAdContent('<?php echo $ad->ad_id?>')"> -->
                                    <div class="ad-index-container">
                                        <div class="ad-header">
                                            <div class="ad-body-image">
                                                <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Ad Image" width="100" height="80">
                                            </div>

                                            <div class="ad-item-name"><h3><?php echo $ad->item_name ?></h3></div>
                                            <div class="ad-user-name">Seller: <?php echo $ad->seller_name ?></div>
                                            <div class="ad-created-at"><?php echo convertTime($ad->item_created_at); ?></div>
                                        </div>

                                        <div class="ad-body">
                                            <div class="ad-body-desc"><?php echo $ad->item_desc ?></div>
                                        </div>
                                    </div>
                                <!-- </a> -->
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- activity -->
            <div id="activity-content" class="content-section">
                <div class="details">
                    <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Recent Activities</h2>
                                <!-- <a href="#" class="btn">View All</a> -->
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>User ID</td>
                                        <td>User Type</td>
                                        <td>Action Type</td>
                                        <td>Action Details</td>
                                        <td>Date Time</td>
                                        <!-- <td>Item Ad</td> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data['recentActivities'] as $activity) : ?>
                                        <tr>
                                            <td><?php echo $activity->user_id; ?></td>
                                            <td><span class="usertype <?php echo $activity->user_type ?>"><?php echo $activity->user_type ?></span></td>
                                            <td><?php echo $activity->action_type; ?></td>
                                            <td><?php echo $activity->action_details; ?></td>
                                            <td><?php echo $activity->timestamp; ?></td>
                                            <td>
                                            <?php if ($activity->action_type == 'PreownedAd Creation' || $activity->action_type == 'RecycleAd Creation') : ?>
                                            <div class="cardHeader">
                                            <a class="btn" style="border: 1px solid white;">View Ad</a></div>
                                            <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                    </div>
                </div>
            </div>

            <!-- Ad Report -->
            <div id="reported-ads-content" class="content-section">
            <div class="details">
                    <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Reported Ads</h2>
                            </div>                
                    <table>
                        <thead>
                        <tr>
                            <!-- <th>Report ID</th> -->
                            <th>Ad ID</th>
                            <th>Item Name</th>
                            <th>Reporter ID</th>
                            <th>Report Reason</th>
                            <th>Report Comments</th>
                            <th>Report Contact</th>
                            <th>Report Status</th>
                            <th>Reported At</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <thead>
                        <?php if (!empty($data['reportedAds'])): ?>
                            <?php foreach ($data['reportedAds'] as $ad): ?>
                            <tbody>
                                <tr>
                                    <!-- <td><?php echo $ad->report_id; ?></td> -->
                                    <td><?php echo $ad->ad_id; ?></td>
                                    <td><?php echo $ad->ad_title; ?></td> 
                                    <td><?php echo $ad->reporter_id; ?></td>
                                    <td><?php echo $ad->report_reason; ?></td>
                                    <td><?php echo $ad->report_comments; ?></td>
                                    <td><?php echo $ad->report_contact; ?></td>
                                    <td><span class="status <?php echo strtolower($ad->report_status); ?>"><?php echo $ad->report_status; ?></span></td>
                                    <td><?php echo $ad->report_created_at; ?></td>
                                    
                                    <td><button onclick="confirmDelete(<?php echo $ad->ad_id; ?>);" class="btn btn-danger" id="removeadbtn">Remove AD</button></td>
                                    <td><button onclick="location.href = '<?php echo URLROOT . '/ItemAds/show/' . $ad->ad_id;?>';" class="btn btn-success" id="viewadbtn">View Ad</button></td>
                                    
                                </tr>
                            </tbody>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No reported ads found.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                    </div>
                </div>
            </div>

            <div id="settings-content" class="content-section">
                <div class="profile-settings-container">
                    <div class="tabs-container">
                        <!-- <button class="tab-link active" onclick="openTab(event, 'general')">General</button>
                        <button class="tab-link" onclick="openTab(event, 'change-password')">Change Password</button>
                        <button class="tab-link" onclick="openTab(event, 'notification')">Notification</button> -->
                        <button class="tab-link active" onclick="openTab('general')" data-section="general">General</button>
                        <button class="tab-link" onclick="openTab('change-password')" data-section="change-password">Change Password</button>
                    </div>

                    <div id="general" class="tab-content active"  data-section="general">
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
                                    <div class="dashboard-icons-container"> 
                                         <form method="POST" action="<?php echo URLROOT; ?>/admin/index?#settings-content" enctype="multipart/form-data">               
                                            <div class="">
                                                <button type="button"><label for="upload-photo" title="Browse Photo"><i class="fas fa-edit"></i></label></botton>
                                                <div class="file-upload">
                                                    <input type="file" id="upload-photo" name="photo" accept="image/*">
                                                </div>
                                                <button class="savebutton"  type="submit" title="Save Photo"><i class="fas fa-bookmark"></i></button> 
                                            </div>
                                        </form>
                                        <?php if (!empty($data['userdetails']->profile_image)) : ?>
                                            <form method="POST" action="<?php echo URLROOT; ?>/admin/index?#settings-content">
                                                <input type="hidden" name="delete_photo" value="1">
                                                <input type="hidden" name="photo_id" value="<?php echo $data['userdetails']->id; ?>">
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this photo?')" class="" title="delete photo"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <form id="editProfileForm" action="<?php echo URLROOT; ?>/moderators/edit_profile" method="POST" >
                                <div class="right-below">
                                    <div class="right-left">
                                        <div class="tab-pane fade active show" id="account-general">
                                            <div class="card-body media align-items-center"></div>
                                            <div class="card-body">
                                                <!-- <form method="POST" action="<?php echo URLROOT; ?>/moderators/edit_profile"> -->
                                                    <div class="form-group">
                                                        <label class="form-label">Username</label>
                                                        <input type="text" class="form-control input-field-box" name="newUsername" value="<?php echo $_SESSION['user_name']; ?>">
                                                        <div class="form-invalid"><?php error('newUsername'); ?></div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">E-mail</label>
                                                        <input type="text" class="form-control input-field-box" value="<?php echo $_SESSION['user_email']; ?>" disabled>
                                                    </div>
                                              
                                            </div>
                                          
                                        </div>
                                    </div>
                                    <div class="right-right">
                                    <div class="form-group">
                                        <label class="form-label">Contact number</label>
                                        <input type="text" class="form-control input-field-box" name="newContactNumber" value="<?php echo $_SESSION['user_number']; ?>">
                                        <div class="form-invalid abs-error"><?php error('newContactNumber'); ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">User-Type</label>
                                        <input type="text" class="form-control input-field-box " value="<?php echo $_SESSION['userType']; ?>" disabled>
                                    </div>
                                    </div>
                                </div>
                                <div style="margin-top: 20px; ">
                                    <?php flash('profile_edit'); ?>
                                </div>
                                <div class="profile-buttons">
                                    <button class="profile-updatebt">Edit profile</button>
                                </div>
                                </form>

                    </div>

                    <div id="change-password" class="tab-content" data-section="change-password">
                        <form id="changePasswordForm" action="<?php echo URLROOT; ?>/users/update" method="POST" >
                            <div class="cp-container">
                                <div class="form-cp"> 
                                    <label class="form-label" for="oldPassword">Old Password</label>
                                    <input type="password" id="oldPassword" name="oldPassword" class="form-control input-field-box" required> 
                                        <div class="form-invalid"><?php error('oldPassword'); ?></div> 
                                </div>
                                <div class="form-cp">
                                    <label class="form-label" for="newPassword">New Password</label>
                                    <input type="password" id="newPassword"   name="newPassword" class="form-control input-field-box" required>     
                                        <div class="form-invalid"><?php error('newPassword'); ?></div>
                                </div>
                                <div class="form-cp">
                                    <label class="form-label" for="confirmPassword">Confirm New Password</label>
                                    <input type="password" id="confirmPassword"  name="confirmPassword" class="form-control input-field-box" required> 
                                </div>
                                <div class="profile-buttons"> 
                                    <button class="profile-updatebt">Change Password</button> 
                                </div>
                                <div id="changePasswordMessage" class="form-invalid"></div> 
                            </div>
                            <div style="margin-top: 30px;">
                            <?php flash('update_password'); ?>
                            </div>
                        </form>
                    </div>
                    <div id="notification" class="tab-content" data-section="notification">
                        <h3>Notification Settings</h3>
                        <p>Customize your notification preferences here.</p>
                    </div>
                </div>
            </div>
                
        </div>
    </div>

    <script>

    window.onload = function() {
        var adId = sessionStorage.getItem('adId');
        if (adId) {
            // If there's an ad ID, fetch and display the ad data
            showAdContent(adId);
        }
    };

    function showAdContent(adId) {

        sessionStorage.setItem('adId', adId);
        // Send a POST request to the server
        fetch(URLROOT + "/ItemAds/getAdContent/" + adId, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            // body: JSON.stringify({adId: adId})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error("HTTP error " + response.status);
            }
            return response.json();
        })
        .then(data => {

            console.log(data);

            showContent('secondhand-ad-view-content');
            // Use the data to display the ad content
            document.querySelector('.sad-item-name h1').textContent = data.ad.item_name;
            document.querySelector('.sad-p1 p').textContent = 'Posted on ' + data.ad.item_created_at;
            document.querySelector('.sad-ad-img').src = URLROOT + '/public/img/items/' + data.ad.item_image;
            document.querySelector('.sad-price h2').textContent = 'Rs. ' + data.ad.item_price;
            document.querySelector('.sad-neg').textContent = data.ad.negotiable == 'yes' ? 'Negotiable' : 'Non-Negotiable';
            document.querySelector('.sad-condition').textContent = 'Condition: ' + data.ad.item_condition;
            document.querySelector('.sad-desP').textContent = data.ad.item_desc;
            document.querySelector('.sad-b3-p1 p').textContent = 'Sold by ' + data.ad.seller_name;
            document.querySelector('.sad-b3-p2 p').textContent = data.ad.item_location;
            document.querySelector('#show-number').dataset.number = data.number;

        })
        .catch(error => {
            console.error('Error:', error);
        });
    }

    // Function to show/hide content sections based on the clicked tab
    function showContent(section) {
        // event.preventDefault();
        // Hide all content sections
        document.getElementById('dashboard-content').style.display = 'none';
        document.getElementById('users-content').style.display = 'none';
        document.getElementById('moderators-content').style.display = 'none';
        document.getElementById('centers-content').style.display = 'none';
        document.getElementById('secondhand-content').style.display = 'none';
        document.getElementById('secondhand-ad-view-content').style.display = 'none';
        document.getElementById('recycle-content').style.display = 'none';
        document.getElementById('activity-content').style.display = 'none';
        document.getElementById('reported-ads-content').style.display = 'none';
        document.getElementById('settings-content').style.display = 'none';

        // Show the selected content section
        document.getElementById(section).style.display = 'block';

         // Select the sidebar element
        a_name=section.split("-content")[0]+'-tab';
        // document.getElementById(a_name).parentElement.classList.add('hovered'); //get an error

         // Update the URL hash to store the current section
        window.location.hash = '#' + section;
    }

    // Function to redirect to the current active section
    function handleInitialSection() {
        var hash = window.location.hash;
        // console.log("hash" + hash);
        if (hash) {
            // Extract the section name from the hash
            var section = hash.substring(1); // Remove '#'

            // handle the settings hash
            if (['general', 'change-password'].includes(section)) {
                console.log(section);
                showContent('settings-content');
                openTab(section)
            }else{
                showContent(section);
                currentSection = section;
            }
            
        } else {
            // If no hash is present, default to the dashboard section
            showContent('dashboard-content');
            currentSection = 'dashboard-content';
        }
    }
    // Call the function when the page loads
    handleInitialSection(); 
    window.onload = handleInitialSection;

    
        // Function to show a specific section based on the hash in the URL
        function showSection(sectionName) {
            var tabContent = document.getElementById(sectionName);
            if (tabContent) {
                // Hide all tab contents
                var allTabs = document.querySelectorAll('.tab-content');
                allTabs.forEach(tab => tab.style.display = 'none');

                // Show the selected tab content
                tabContent.style.display = 'block';

                // Update tab styles if needed
                var tabLinks = document.querySelectorAll('.tab-link');
                tabLinks.forEach(link => link.classList.remove('active'));
                var activeLink = document.querySelector('button[data-section="' + sectionName + '"]');
                if (activeLink) {
                    activeLink.classList.add('active');
                }
            }
        }

        // Function to handle opening horizontal tabs and updating URL hash
        function openTab(tabName) {
            var sectionName = document.getElementById(tabName).getAttribute('data-section');
            console.log('Active section:', sectionName);

            // Update the URL hash
            window.location.hash = '#' + sectionName;

            // Show the section
            showSection(sectionName);
        }
        const editForm = document.getElementById('editProfileForm');
    
        editForm.onsubmit = function(event){
            event.preventDefault();
        
            fetch('<?php echo URLROOT; ?>/moderators/edit_profile', {
                method: 'POST',
                body: new FormData(editForm)
            })
            .then(data => {
                // Handle the response data as needed
                //console.log(data);

                window.location.reload();
            })
            
            .catch(error => {
                console.error('Error:', error);
            });
        }

        const changepwd = document.getElementById('changePasswordForm');
        
        changepwd.onsubmit = function(event){
            event.preventDefault();

            fetch('<?php echo URLROOT; ?>/users/update',{
                method: 'POST',
                body: new FormData(changepwd)
            })
            .then(data =>{

            })
            .then(data => {
                // Handle the response data as needed
                //console.log(data);

                window.location.reload();
            })
            
            .catch(error => {
                console.error('Error:', error);
            });
        }
        
        let profilePic = document.getElementById("profile-pic");
        let inputFile = document.getElementById("upload-photo");

        inputFile.onchange = function(){
        profilePic.src = URL.createObjectURL(inputFile.files[0])}
    
    </script>
    <!-- Get the user counts data from PHP and convert it to JavaScript object -->
    <script>
        var users = <?php echo json_encode($data['users']); ?>;
        var moderators = <?php echo json_encode($data['moderators']); ?>;
        var userCounts = <?php echo json_encode($data['userCounts']); ?>;
        var adCountsByCategory = <?php echo json_encode($data['adCountsByCategory']); ?>;
        var preowned = <?php echo json_encode($data['ads']); ?>;


        //admin banning the users
        function toggleBan(checkbox, userId) {
            var url;
            var action;
            var originalState = checkbox.checked; // Save the original state

            if (originalState) {
                url = '<?php echo URLROOT?>/Admin/unban/' + userId;
                action = "unban";
            } else {
                url = '<?php echo URLROOT?>/Admin/ban/' + userId;
                action = "ban";
            }

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to " + action + " this user.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, ' + action + ' user!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                } else {
                    checkbox.checked = !originalState; // Revert to the original state if the user cancels
                }
            })
        }

    </script> 

    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/alerts.js"></script>
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/ad_view.js"></script> -->

    <script type ="text/JavaScript">
        var URLROOT ="<?php echo URLROOT; ?>"
        var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
    </script>

    <!-- register and update moderator success message -->
    <script>
    window.onload = function() {
        var urlParams = new URLSearchParams(window.location.search);

        if (window.location.hash === '#moderators-content' && urlParams.get('registered') === 'true') {
            Swal.fire(
                'Registered!',
                'The moderator has been registered.',
                'success'
            );

            // Remove the 'registered' query parameter from the URL
            urlParams.delete('registered');
        }

        if (window.location.hash === '#moderators-content' && urlParams.get('updated') === 'true') {
            Swal.fire(
                'Updated!',
                'The moderator has been updated.',
                'success'
            );

            // Remove the 'updated' query parameter from the URL
            urlParams.delete('updated');
        }

        // Update the URL without causing a page reload
        var newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?' + urlParams.toString() + window.location.hash;
        history.replaceState(null, '', newUrl);
    };
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
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/reportads.js"></script>






