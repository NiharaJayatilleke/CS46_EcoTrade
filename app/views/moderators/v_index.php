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
                    <!-- <a href="<?php echo URLROOT ?>/Admin/index"> -->
                    <a href="#" id="dashboard-tab" onclick="showContent('dashboard-content')">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <!-- <a href="<?php echo URLROOT ?>/Admin/moderators"> -->
                    <a href="#" id="platformusers-tab" onclick="showContent('platformusers-content')">

                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Users</span>
                    </a>
                </li>
                <li>
                    <!-- <a href="<?php echo URLROOT ?>/Admin/moderators"> -->
                    <a href="#" id="reported-ads-tab" onclick="showContent('reported-ads-content')">

                        <span class = "side-icon"><ion-icon name="alert-circle-outline"></ion-icon></span>
                        
                        <span class = "side-title">Reported Ads</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="secondhand-tab" onclick="showContent('secondhand-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Preowned Ads</span>
                    </a>
                </li>                               

                <li>
                    <!-- <a href=""> -->
                    <a href="#" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Recycling Ads</span>
                    </a>
                </li>



                <li>
                    <a href="#" id="signout-tab" onclick="showContent('signout-content')">
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
                        <h2>Moderators Dashboard</h2>
                    </div>
                    
                    <div class="dashboard-cardBox">
                        <div class="dashboard-card">
                            <div>
                                <!-- <div class="dashboard-numbers"><?php echo $data['users_count'] ?></div>  -->
                                <div class="dashboard-cardName">General Users</div>
                            </div>
                            <div class="dashboard-iconBx">   
                                <ion-icon name="people-outline"></ion-icon>     
                            </div>
                        </div>

                        <!-- <a href="<?php echo URLROOT ?>/Admin/moderators" style="text-decoration: none; color: inherit;"> -->
                            <div class="dashboard-card" >
                                <div>
                                    <!-- <div class="dashboard-numbers" ><?php echo $data['moderators_count'] ?></div>  -->
                                    <div class="dashboard-cardName">Collectors</div>
                                </div>
                                <div class="dashboard-iconBx">  
                                    <ion-icon name="people-circle-outline"></ion-icon>     
                                </div>
                            </div>
                        <!-- </a> -->

                        <div class="dashboard-card" >
                                <div>
                                    <!-- <div class="dashboard-numbers" ><?php echo $data['moderators_count'] ?></div>  -->
                                    <div class="dashboard-cardName">Recycle centers</div>
                                </div>
                                <div class="dashboard-iconBx">  
                                <ion-icon name="business-outline"></ion-icon>
                                </div>
                        </div>

                        <div class="dashboard-card">
                            <div>
                                <!-- <div class="dashboard-numbers"><?php echo $data['sec_ad_count'] ?></div>  -->
                                <div class="dashboard-cardName">Pre-owned Item Ads</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="pricetags"></ion-icon>  
                            </div>
                        </div>


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

                    <div class="details">
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
                                    <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/2.jpeg"></td>
                                    <td><h4>John<br><span>Western Province - Colombo</span></h4></td>
                                </tr>

                                <tr>
                                <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/3.jpeg"></td>
                                    <td><h4>Emily<br><span>Central Province - Kandy</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/4.jpeg"></td>
                                    <td><h4>Sara<br><span>Eastern Province - Trincomalee</span></h4></td>
                                </tr>
                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/5.jpeg"></td>
                                    <td><h4>Michael<br><span>Northern Province - Jaffna</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/6.jpeg"></td>
                                    <td><h4>Samantha<br><span>Southern Province - Galle</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/7.jpeg"></td>
                                    <td><h4>Ravi<br><span>North Central Province - Anuradhapura</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/1.jpeg"></td>
                                    <td><h4>Ravindra<br><span>Central Province - Kandy</span></h4></td>
                                </tr>
                            </table>
                        </div>

                    </div> 
            </div>

            <div id="platformusers-content" class="content-section">
            <p>This is the content for the users tab.</p>
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
                                    <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/2.jpeg"></td>
                                    <td><h4>John<br><span>Western Province - Colombo</span></h4></td>
                                </tr>

                                <tr>
                                <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/3.jpeg"></td>
                                    <td><h4>Emily<br><span>Central Province - Kandy</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/4.jpeg"></td>
                                    <td><h4>Sara<br><span>Eastern Province - Trincomalee</span></h4></td>
                                </tr>
                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/5.jpeg"></td>
                                    <td><h4>Michael<br><span>Northern Province - Jaffna</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/6.jpeg"></td>
                                    <td><h4>Samantha<br><span>Southern Province - Galle</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/7.jpeg"></td>
                                    <td><h4>Ravi<br><span>North Central Province - Anuradhapura</span></h4></td>
                                </tr>

                                <tr>
                                    <td> <div  class="imgBx"><img src="<?php echo URLROOT; ?>/img/admin/dashboard/1.jpeg"></td>
                                    <td><h4>Ravindra<br><span>Central Province - Kandy</span></h4></td>
                                </tr>
                            </table>
                        </div>

            </div>

            <div id="reported-ads-content" class="content-section">
            <p>This is the content for the reportedads tab.</p>
            </div>


            <div id="secondhand-content" class="content-section">
            <p>This is the content for the Secondhand tab.</p> 
            
            </div>

            <div id="recycle-content" class="content-section">
            <p>This is the content for the Recycle tab.</p> 
            </div>

            <div id="signout-content" class="content-section">
            <p>This is the content for the signout tab.</p>
            </div>

        </div>



    </div>

    <script>
    // Function to show/hide content sections based on the clicked tab
    function showContent(section) {
        // Hide all content sections
        document.getElementById('dashboard-content').style.display = 'none';
        document.getElementById('platformusers-content').style.display = 'none';
        document.getElementById('reported-ads-content').style.display = 'none';
        document.getElementById('secondhand-content').style.display = 'none';
        document.getElementById('recycle-content').style.display = 'none';
        document.getElementById('signout-content').style.display = 'none';

        // Show the selected content section
        document.getElementById(section).style.display = 'block';
    }

    // Function to handle initial content section based on URL hash
    function handleInitialSection() {
        var hash = window.location.hash;
        if (hash) {
            // Extract the section name from the hash
            var section = hash.substring(1); // Remove '#'
            showContent(section);
        } else {
            // If no hash is present, default to the dashboard section
            showContent('dashboard-content');
        }
    }

    // Call the function when the page loads
    window.onload = handleInitialSection;

    </script>

        <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>





