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
                    <a href="#recycle-content" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Notifications</span>
                    </a>
                </li>                               

                <li>
                    <!-- <a href=""> -->
                    <a href="#center-content" id="center-tab" onclick="showContent('center-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Recent Ads</span>
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
                                <h2>Recent Activities</h2>
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

                                </tbody>
                            </table>
                        </div>
                    </div> 
            </div>


            <div id="recycle-content" class="content-section">
                <p>This is the content for the recycle tab.</p>
            </div>

            <div id="center-content" class="content-section">
            <p>This is the content for the centers tab.</p> 
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




