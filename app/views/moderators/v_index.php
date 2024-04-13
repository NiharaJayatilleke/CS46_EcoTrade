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
                    <a href="#dashboard-content" id="dashboard-tab" onclick="showContent('dashboard-content')">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <!-- <a href="<?php echo URLROOT ?>/Admin/moderators"> -->
                    <a href="#platformusers-content" id="platformusers-tab" onclick="showContent('platformusers-content')">

                        <span class = "side-icon"><ion-icon name="people-outline"></ion-icon></span>
                        <span class = "side-title">Users</span>
                    </a>
                </li>
                <li>
                    <!-- <a href="<?php echo URLROOT ?>/Admin/moderators"> -->
                    <a href="#reported-ads-content" id="reported-ads-tab" onclick="showContent('reported-ads-content')">

                        <span class = "side-icon"><ion-icon name="alert-circle-outline"></ion-icon></span>
                        
                        <span class = "side-title">Reported Ads</span>
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
                    <a href="#settings-content" id="settings-tab" onclick="showContent('settings-content')">
                        <span class = "side-icon"><ion-icon name="cog-outline"></ion-icon></span>
                        <span class = "side-title">Settings</span>
                    </a>
                </li>


                <li>
                    <a href="<?php echo URLROOT ?>/Moderators/login" id="signout-tab" onclick="showContent('signout-content')">
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
                        <input id="searchInput" type="text" placeholder="Search here" oninput="handleSearch()">
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

                    <div class="details" style=" display: block;">
                        <div class="recentOrders">
                            <div class="cardHeader">
                                <h2>Recent Activities</h2>
                                <a href="#" class="btn">View All</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>User ID</th>
                                        <th>Action Type</th>
                                        <th>Action Details</th>
                                        <th>Date Time</th>
                                        <th>Item Ad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                    <?php foreach ($data['recentActivities'] as $activity) : ?>
                                        <tr>
                                            <td><?php echo $activity->user_id; ?></td>
                                            <td><?php echo $activity->action_type; ?></td>
                                            <td><?php echo $activity->action_details; ?></td>
                                            <td><?php echo $activity->timestamp; ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>

                        </div>
                      
                    </div> 
            </div>

            <div id="platformusers-content" class="content-section">
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
                <div class="reported-ads-container">

                    <h1>Reported Ads</h1>                  
                    <table class="reported-ads-table">
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
                        <?php if (!empty($data['reportedAds'])): ?>
                            <?php foreach ($data['reportedAds'] as $ad): ?>

                                    <!-- <td><?php echo $ad->report_id; ?></td> -->
                                    <td><?php echo $ad->ad_id; ?></td>
                                    <td><?php echo $ad->ad_title; ?></td> 
                                    <td><?php echo $ad->reporter_id; ?></td>
                                    <td><?php echo $ad->report_reason; ?></td>
                                    <td><?php echo $ad->report_comments; ?></td>
                                    <td><?php echo $ad->report_contact; ?></td>
                                    <td><?php echo $ad->report_status; ?></td>
                                    <td><?php echo $ad->report_created_at; ?></td>
                                    
                                    <td><button onclick="confirmDelete(<?php echo $ad->ad_id; ?>);" class="btn btn-danger" id="removeadbtn">Remove AD</button></td>
                                    <td><button onclick="location.href = '<?php echo URLROOT . '/ItemAds/show/' . $ad->ad_id;?>';" class="btn btn-success" id="viewadbtn">View Ad</button></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No reported ads found.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>

            <div id="secondhand-content" class="content-section">
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

            <div id="recycle-content" class="content-section">
            <p>This is the content for the Recycle tab.</p> 
            </div>

            <div id="settings-content" class="content-section">
            <p>This is the content for the settings.</p> 
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
        document.getElementById('platformusers-content').style.display = 'none';
        document.getElementById('reported-ads-content').style.display = 'none';
        document.getElementById('secondhand-content').style.display = 'none';
        document.getElementById('recycle-content').style.display = 'none';
        document.getElementById('settings-content').style.display = 'none';
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

    <!-- sweetalert remove ad pop up message -->
    <script>
        function confirmDelete(adId) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success ',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            });

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Handle deletion using fetch 
                    fetch(`http://localhost/ecotrade/Moderators/hideAd/${adId}`, {
                        // method: 'PUT'
                        method: 'POST'
                    }).then(response => {
                        if (response.ok) {
                            swalWithBootstrapButtons.fire(
                                'Deleted!',
                                'Ad has been deleted.',
                                'success'
                            ).then(() => {
                                // reload the page or perform other actions after deletion
                                location.reload();
                            });
                        } else {
                            throw new Error('Failed to delete ad');
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        swalWithBootstrapButtons.fire(
                            'Error',
                            'Failed to delete ad.',
                            'error'
                        );
                    });
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'The Ad is safe :)',
                        'error'
                    );
                }
            });
        }
    </script>

    <script>
    // Function to handle search input
    function handleSearch() {
        var searchInput = document.getElementById('searchInput').value.toLowerCase();
        var currentSection = getCurrentSection(); // You can define this function to get the current active section

        // Check which section is currently active and update the content based on the search query
        switch (currentSection) {
            case 'dashboard-content':
                filterDashboardContent(searchInput);
                break;
            case 'platformusers-content':
                filterPlatformUsersContent(searchInput);
                break;
            case 'reported-ads-content':
                filterReportedAdsContent(searchInput);
                break;
            case 'secondhand-content':
                filterSecondHandContent(searchInput);
                break;
            case 'recycle-content':
                filterRecycleContent(searchInput);
                break;
            default:
                break;
        }
    }

    // Example filter functions for different sections
    function filterDashboardContent(query) {
        // Implement filtering logic for dashboard content
    }

    function filterPlatformUsersContent(query) {
        // Implement filtering logic for platform users content
    }

    function filterReportedAdsContent(query) {
        // Implement filtering logic for reported ads content
    }

    function filterSecondHandContent(query) {
        // Implement filtering logic for second hand content
    }

    function filterRecycleContent(query) {
        // Implement filtering logic for recycle content
    }
    </script>


    <!-- Get the user counts data from PHP and convert it to JavaScript object -->
    <script>
    var userCounts = <?php echo json_encode($data['userCounts']); ?>;
    var adCountsByCategory = <?php echo json_encode($data['adCountsByCategory']); ?>;
    </script> 
    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
   
    





