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
                    <a href="#dashboard-content" id="dashboard-tab" onclick="showContent('dashboard-content')">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#notif-content" id="recycle-tab" onclick="showContent('notif-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Notifications</span>
                    </a>
                </li>                               

                <li>
                    <!-- <a href=""> -->
                    <a href="#sec-ad-content" id="center-tab" onclick="showContent('sec-ad-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Secondhand Ads</span>
                    </a>
                </li>

                <li>
                    <a href="#rec-ad-content" id="center-tab" onclick="showContent('rec-ad-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Recycle Ads</span>
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
                        <h2>Seller Dashboard</h2>
                    </div>

                    <div class="details" style=" display: block;">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Recent Secondhand Item Ads</h2>
                                <a href="#" onclick="showContent('sec-ad-content')" class="btn">View All</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Image</td>
                                        <td>Price</td>
                                        <td>Posted on</td>
                                        <td>Expired on</td>
                                    </tr>
                                </thead>

                                <tbody>
                                <!-- <php print_r($data['ads']); ?> -->
                                <?php
                                $counter = 0;
                                foreach($data['ads'] as $ad): 
                                    if($counter == 5) break; 
                                ?>
                                    <tr>
                                    <td><?= $ad->item_name ?></td>
                                    <td> <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Item Image" style="width: 70px; height: 60px;"></td>
                                    <td>Rs. <?= $ad->item_price ?></td>
                                    <td><?= $ad->created_at ?></td>
                                    <td><?= $ad->item_expiry ?></td>
                                    </tr>
                                <?php 
                                    $counter++;
                                    endforeach; 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 

                    <div class="details" style=" display: block;">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Your Recycle Item Ads</h2>
                                <a href="#center-content"  class="btn">View All</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Image</td>
                                        <td>Category</td>
                                        <td>Posted on</td>
                                        <td>Expired on</td>
                                    </tr>
                                </thead>

                                <tbody>
                                <?php 
                                $counter = 0; 
                                foreach($data['re_ads'] as $re_ad): 
                                if($counter == 5) break; 
                                ?>
                                    <tr>
                                    <td><?= $re_ad->item_name ?></td>
                                    <td> <img src="<?php echo URLROOT?>/public/img/items/<?php echo $re_ad->item_image ?>" alt="Item Image" style="width: 70px; height: 60px;"></td>
                                    <!-- <td>Rs. <= $re_ad->item_price ?></td> -->
                                    <td><?= $re_ad->created_at ?></td>
                                    <!-- <td><= $re_ad->item_expiry ?></td> -->
                                    </tr>
                                <?php 
                                    $counter++;
                                    endforeach; 
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
            <!-- following div is the end of dashboard content -->
            </div> 


            <div id="notif-content" class="content-section">
                <p>This is the content for seller notifications.</p>
            </div>

            <div id="sec-ad-content" class="content-section">
            <!-- <p>This is the content for the secondhand item ads.</p>  -->
            <div class="details" style=" display: block;">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Your Secondhand Item Ads</h2>
                                <!-- <a href="#center-content"  class="btn">View All</a> -->
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Image</td>
                                        <td>Price</td>
                                        <td>Posted on</td>
                                        <td>Expired on</td>
                                    </tr>
                                </thead>

                                <tbody>
                                <!-- <php print_r($data['ads']); ?> -->
                                <?php foreach($data['ads'] as $ad): ?>
                                    <tr>
                                    <td><?= $ad->item_name ?></td>
                                    <td> <img src="<?php echo URLROOT?>/public/img/items/<?php echo $ad->item_image ?>" alt="Item Image" style="width: 70px; height: 60px;"></td>
                                    <td>Rs. <?= $ad->item_price ?></td>
                                    <td><?= $ad->created_at ?></td>
                                    <td><?= $ad->item_expiry ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
            </div>
            </div>

            <div id="rec-ad-content" class="content-section">
                <div class="details" style=" display: block;">
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Your Recycle Item Ads</h2>
                            <!-- <a href="#center-content"  class="btn">View All</a> -->
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Image</td>
                                    <td>Category</td>
                                    <td>Posted on</td>
                                    <td>Expired on</td>
                                </tr>
                            </thead>

                            <tbody>
                            <?php foreach($data['re_ads'] as $re_ad): ?>
                                <tr>
                                <td><?= $re_ad->item_name ?></td>
                                <td> <img src="<?php echo URLROOT?>/public/img/items/<?php echo $re_ad->item_image ?>" alt="Item Image" style="width: 70px; height: 60px;"></td>
                                <!-- <td>Rs. <= $re_ad->item_price ?></td> -->
                                <td><?= $re_ad->created_at ?></td>
                                <!-- <td><= $re_ad->item_expiry ?></td> -->
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="signout-content" class="content-section">
            <p>This is the content for the signout tab.</p>
            </div>

        </div>
    </div>

    <!-- JS for switching tabs -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/seller/dashboard_tabs.js"></script>
    
    <!-- Javascript for image upload -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script> -->





