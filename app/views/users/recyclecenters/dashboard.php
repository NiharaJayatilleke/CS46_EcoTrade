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
                    <a href="#recycle-content" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="pricetags"></ion-icon></span>
                        <span class = "side-title">Your ads</span>
                    </a>
                </li>                               

                <li>
                    <!-- <a href=""> -->
                    <a href="#settings-content" id="center-tab" onclick="showContent('settings-content')">
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
                                <a href="#recycle-content" onclick="showContent('recycle-content')" class="btn">View All</a>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <td>Category</td>
                                        <td>Description</td>
                                        <td>Required Quantity</td>
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
                                                    <a href=""><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                                    <button onclick="" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
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
                        </div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Categoryfgvhbjn</td>
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
                                                <a href=""><button class="ad-edit-btn"><i class="fas fa-edit"></i></button></a>
                                                <button onclick="" class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>




<!-- 
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
                                    <php if($ad->seller_id == $_SESSION['user_id']): ?> 
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
                                        <a href = ""><button class="ad-wishlist-btn"><i class="fas fa-heart"></i></button></a> 
                                        <a href="#"><button class="ad-wishlist-btn"><img src="/img/icons/wishlist.png" alt="Wishlist Icon"></button></a> 
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

            
            </div> -->
                        
             <!-- <div id="center-content" class="content-section">
            <p>This is the content for the centers tab.</p> 
            </div>  -->

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
                                         <form method="POST" action="<?php echo URLROOT; ?>/RecycleCenters/index#settings-content" enctype="multipart/form-data">               
                                            <div class="">
                                                <button type="button"><label for="upload-photo" title="Browse Photo"><i class="fas fa-edit"></i></label></botton>
                                                <div class="file-upload">
                                                    <input type="file" id="upload-photo" name="photo" accept="image/*">
                                                </div>
                                                <button class="savebutton"  type="submit" title="Save Photo"><i class="fas fa-bookmark"></i></button> 
                                            </div>
                                        </form>
                                        <?php if (!empty($data['userdetails']->profile_image)) : ?>
                                            <form method="POST" action="<?php echo URLROOT; ?>/RecycleCenters/index#settings-content">
                                                <input type="hidden" name="delete_photo" value="1">
                                                <input type="hidden" name="photo_id" value="<?php echo $data['userdetails']->id; ?>">
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this photo?')" class="" title="delete photo"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- <form id="editProfileForm" action="<?php echo URLROOT; ?>/moderators/edit_profile" method="POST" >
                                <div class="right-below">
                                    <div class="right-left">
                                        <div class="tab-pane fade active show" id="account-general">
                                            <div class="card-body media align-items-center"></div>
                                            <div class="card-body">
                                               
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
                                </div> -->
                                <div class="profile-buttons">
                                <a href="<?php echo URLROOT?>/Recyclecenters/edit"><button class="profile-updatebt" id="editProfileBtn">Edit profile</button></a>
                                </div>
                                <!-- </form> -->

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

            <div id="signout-content" class="content-section">
            </div>

        <!-- </div> -->
    </div>

    <script>
    // Function to show/hide content sections based on the clicked tab
    function showContent(section) {
        // event.preventDefault();
        // Hide all content sections
        document.getElementById('dashboard-content').style.display = 'none';
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
    if (hash) {
        var section = hash.substring(1);

        var hash = window.location.hash;
        if (['general', 'change-password'].includes(section)) {
            console.log(section);
            showContent('settings-content');
            openTab(section)
        } else {
            // If no hash is present, default to the dashboard section
            showContent(section);
            currentSection = section;
        }
    }else{
        showContent('dashboard-content');
            currentSection = 'dashboard-content';
        }
    }
    handleInitialSection(); 
    // Call the function when the page loads
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
    
    </script>

    <script>
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

      
    
  


    <!-- Get the user counts data from PHP and convert it to JavaScript object -->
    var userCounts = <?php echo json_encode($data['userCounts']); ?>;


        <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
   
    





