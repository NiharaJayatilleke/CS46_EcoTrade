<?php require APPROOT.'/views/inc/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/collectors/dashboard.css">

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
                    <a href="#centers-content" id="centers-tab" onclick="showContent('centers-content')">
                        <span class = "side-icon"><ion-icon name="business-outline"></ion-icon></span>
                        <span class = "side-title">Recycle Center</span>
                    </a>
                </li>                            

                <li>
                    <a href="#recycle-content" id="recycle-tab" onclick="showContent('recycle-content')">
                        <span class = "side-icon"><ion-icon name="leaf-outline"></ion-icon></span>
                        <span class = "side-title">Recycling Ads</span>
                    </a>
                </li>

                <!-- <li>
                    <a href="#reported-ads-content" id="reported-ads-tab" onclick="showContent('reported-ads-content')">
                        <span class = "side-icon"><ion-icon name="remove-circle-outline"></ion-icon></span>
                        <span class = "side-title">Reported ads</span>
                    </a>
                </li> -->

                <li>
                    <a href="#settings-content" id="settings-tab" onclick="showContent('settings-content')">
                        <span class = "side-icon"><ion-icon name="cog-outline"></ion-icon></span>
                        <span class = "side-title">Edit Profile</span>
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

            <!-- dashboard-->
            <div id="dashboard-content" class="content-section">
                <div class="heading-dashboard">
                    <h2>Collector Dashboard</h2>
                </div>
                
                <div class="dashboard-cardBox">
                    <a href="<?php echo URLROOT ?>/Collectors/index#centers-content" style="text-decoration: none; color: inherit;">
                    <div class="dashboard-card" >
                                <div>
                                    <div class="dashboard-numbers" ></div> 
                                    <div class="dashboard-cardName">Recycle Center Requirements</div>
                                </div>
                                <div class="dashboard-iconBx">  
                                <ion-icon name="business-outline"></ion-icon>
                                </div>
                    </div>
                    </a> 

                    <a href="<?php echo URLROOT ?>/Collectors/index#recycle-content" style="text-decoration: none; color: inherit;">
                        <div class="dashboard-card">
                            <div>
                                <div class="dashboard-numbers"></div> 
                                <div class="dashboard-cardName">Recycling Item Ads</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="leaf"></ion-icon>  
                            </div>
                        </div>
                    </a>        
                </div>

                <div class="details" style=" display: block;" >
                    <!-- Recycle Center Requirements -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Saved Recycle Center Requirements</h2>
                            <a href="#activity-content" class="btn" id="activity-tab" onclick="showContent('centers-content')">View All</a>
                        </div>
                        <table>

                        </table>
                    </div>

                    <!-- Recycle Item Ads  -->
                    <div class="recentOrders">
                        <div class="cardHeader">
                            <h2>Saved Recycle Item Ads</h2>
                            <a href="#activity-content" class="btn" id="activity-tab" onclick="showContent('recycle-content')">View All</a>
                        </div>
                        <table>

                        </table>
                    </div>

                    <!-- New customers -->
                    <!-- <div class="recentOrders">
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
                                    <!-- <td>Edit/Delete</td> 
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
                                </td> 
                            </tr>
                            <?php 
                            $counter++;
                            endforeach; 
                            ?>
                            </tbody>
                        </table>
                    </div> -->

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
                            
                        </table>
                    </div>
                </div>
            </div>

            <!-- Recycle Centers crud-->
            <div id="centers-content" class="content-section">
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
                                    <td>Location</td>
                                    <td>Posted</td>
                                    <td>Contact Center</td>
                                    <td>Save for later</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data['center_reqs'] as $req): ?>
                                    <tr>
                                        <td><?= $req->item_category ?></td>
                                        <td><?= $req->item_desc ?></td>
                                        <td><?= $req->item_quantity ?>kg</td>
                                        <td><?= $req->item_location ?></td>
                                        <td><?php echo convertTime($req->created_at); ?></td>
                                        <td>
                                            <i class="fas fa-phone fa-lg dashboard-phone-icon" id="show-cen-number" data-number="<?php echo $req->center_number?>"></i>
                                        </td>
                                        <td>
                                            <label class="save-ad-container">
                                                <!-- <input type="checkbox" checked="checked"> -->
                                                <svg class="save-regular" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" onclick="saveReq(<?= $req->rad_id ?>, this)" ><path d="M0 48C0 21.5 21.5 0 48 0l0 48V441.4l130.1-92.9c8.3-6 19.6-6 27.9 0L336 441.4V48H48V0H336c26.5 0 48 21.5 48 48V488c0 9-5 17.2-13 21.3s-17.6 3.4-24.9-1.8L192 397.5 37.9 507.5c-7.3 5.2-16.9 5.9-24.9 1.8S0 497 0 488V48z"></path></svg>
                                                <svg class="save-solid" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512" style="display: none;" onclick="unsaveReq(<?= $req->id ?>, this)"><path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z"></path></svg>
                                            </label>
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

            </div>

            <!-- Secondhand Ad View -->
            <div id="secondhand-ad-view-content" class="content-section">

            </div>

            <!-- Recycle ads-->
            <div id="recycle-content" class="content-section">
                <!-- recycle item ads should be fetched here -->

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
            </div>

            <!-- Ad Report -->
            <div id="reported-ads-content" class="content-section">

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
                                        <form method="POST" action="<?php echo URLROOT; ?>/collectors/index#settings-content" enctype="multipart/form-data">               
                                            <div class="">
                                                <button type="button"><label for="upload-photo" title="Browse Photo"><i class="fas fa-edit"></i></label></botton>
                                                <div class="file-upload">
                                                    <input type="file" id="upload-photo" name="photo" accept="image/*">
                                                </div>
                                                <button class="savebutton"  type="submit" title="Save Photo"><i class="fas fa-bookmark"></i></button> 
                                            </div>
                                        </form>
                                        <?php if (!empty($data['userdetails']->profile_image)) : ?>
                                            <form method="POST" action="<?php echo URLROOT; ?>/collectors/index#settings-content">
                                                <input type="hidden" name="delete_photo" value="1">
                                                <input type="hidden" name="photo_id" value="<?php echo $data['userdetails']->id; ?>">
                                                <button type="submit" onclick="return confirm('Are you sure you want to delete this photo?')" class="" title="delete photo"><i class="fas fa-trash-alt"></i></button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="profile-buttons">
                                    <button class="profile-updatebt" id="editProfileBtn">Edit profile</button>
                                </div>
                                

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
        document.getElementById('settings-content').addEventListener('click', function() {
            window.location.href = "<?php echo URLROOT ?>/Collectors/edit/"; 
        });
    </script>

    <script>
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
        document.getElementById(a_name).parentElement.classList.add('hovered');

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

        document.getElementById('editProfileBtn').addEventListener('click', function() {
        window.location.href = "<?php echo URLROOT . '/Collectors/edit/'; ?>";
         });

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
    </script> 

    <!-- Javascript for image upload -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/chart.js"></script> -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/alerts.js"></script>
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/ad_view.js"></script> -->

    <script type ="text/JavaScript">
        var URLROOT ="<?php echo URLROOT; ?>"
        var CURRENT_AD = "<?php echo $data['ad']->ad_id ?>";
    </script>


    <!-- JS for other interactions -->
    <!-- <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/ads/other_interactions.js"></script> -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/collectors/dashboard_interactions.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/moderators/reportads.js"></script>






