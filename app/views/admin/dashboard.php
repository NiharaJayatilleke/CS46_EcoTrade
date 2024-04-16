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
                            <a href="<?php echo URLROOT ?>/Users/register" class="btn">Add User</a>
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
                            <?php foreach($data['users'] as $user) : ?>
                            <tr>
                                <td><p><?php echo $user->username ?></p></td>
                                <td><?php echo $user->email ?></td>
                                <td><?php echo $user->number ?></td>
                                <td><span class="usertype <?php echo $user->user_type ?>"><?php echo $user->user_type ?></span></td>
                                <td><?php echo $user->created_at ?></td>
                                <td>
                                    <!-- <div class = "mod-control-btns">
                                        <a href = "<?php echo URLROOT?>/Users/edit/<?php echo $moderator->id?>"><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                        <button onclick="confirmDelete('<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id ?>')" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                    </div> -->
                                </td>
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

</script> 
        <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/alerts.js"></script>
    
    





