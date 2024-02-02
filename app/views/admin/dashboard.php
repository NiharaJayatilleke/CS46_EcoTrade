<?php require APPROOT.'/views/inc/header.php'; ?>
   
    <div class="dashboard-container">
        <div class="dashboard-sidenav">
            <ul>
                <li>
                    <a href="#">
                        <span class = "side-icon"><img src="<?php echo URLROOT?>/public/img/index/logo1.png" alt="Logo" class="logo" width="40" height="30" top="50"></span>
                        <span class = "side-title">EcoTrade</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="home-outline"></ion-icon></span>
                        <span class = "side-title">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Moderators</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="mail-open-outline"></ion-icon></span>
                        <span class = "side-title">Messages</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="remove-circle-outline"></ion-icon></span>
                        <span class = "side-title">Report Ads</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="cog-outline"></ion-icon></span>
                        <span class = "side-title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="#">
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
            </div>
                <!-- cards -->
                <div class="dashboard-cardBox">

                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers">1504</div> 
                            <div class="dashboard-cardName">Users</div>
                        </div>
                        <div class="dashboard-iconBx">   
                            <ion-icon name="people-outline"></ion-icon>     
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers">15</div> 
                            <div class="dashboard-cardName">Moderators</div>
                        </div>
                        <div class="dashboard-iconBx">  
                            <ion-icon name="people-circle-outline"></ion-icon>     
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers">2404</div> 
                            <div class="dashboard-cardName">Daily Views</div>
                        </div>
                        <div class="dashboard-iconBx">   
                            <ion-icon name="eye-outline"></ion-icon>     
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers">80</div> 
                            <div class="dashboard-cardName">Comments</div>
                        </div>
                        <div class="dashboard-iconBx"> 
                            <ion-icon name="chatbubbles-outline"></ion-icon>     
                        </div>
                    </div>

                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers">1504</div> 
                            <div class="dashboard-cardName">Users</div>
                        </div>
                        <div class="dashboard-iconBx"> 
                            <ion-icon name="people-outline"></ion-icon>     
                        </div>
                        
                    </div>
                </div>
        </div>
    </div>




    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>

