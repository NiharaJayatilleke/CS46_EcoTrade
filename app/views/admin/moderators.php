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
                    <a href="<?php echo URLROOT ?>/Admin/index">
                        <span class = "side-icon"><ion-icon name="grid-outline"></ion-icon></span>
                        <span class = "side-title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/Moderators/index">
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
                        <span class = "side-title">Ad Report</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class = "side-icon"><ion-icon name="cog-outline"></ion-icon></span>
                        <span class = "side-title">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo URLROOT ?>/Users/logout">
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
                <div class="dashboard-cardBox">

                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers"><?php echo $data['users_count'] ?></div> 
                            <div class="dashboard-cardName">Users</div>
                        </div>
                        <div class="dashboard-iconBx">   
                            <ion-icon name="people-outline"></ion-icon>     
                        </div>
                    </div>

                    <a href="<?php echo URLROOT ?>/Moderators/index" style="text-decoration: none; color: inherit;">
                        <div class="dashboard-card" >
                            <div>
                                <div class="dashboard-numbers" ><?php echo $data['moderators_count'] ?></div> 
                                <div class="dashboard-cardName">Moderators</div>
                            </div>
                            <div class="dashboard-iconBx">  
                                <ion-icon name="people-circle-outline"></ion-icon>     
                            </div>
                        </div>
                    </a>
                    <div class="dashboard-card">
                        <div>
                            <div class="dashboard-numbers"><?php echo $data['sec_ad_count'] ?></div> 
                            <div class="dashboard-cardName">Secondhand Item Ads</div>
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

                <!-- <div class="graphBox">
                    <div class="box">
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="box">
                        <canvas id="ads"></canvas>
                    </div>
                </div> -->

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
										<a href = "<?php echo URLROOT?>/Moderators/delete/<?php echo $moderator->id?>"><button class="ad-edit-btn"><i class="fas fa-trash-alt"></i></button></a>
									</div>
								</td>
							</tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                      <!-- New customers -->
                    <div class="recentCustomers">
                        <div class="cardHeader">
                            <h2>Recent</h2>
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
    </div>




    <!-- Javascript for image upload -->
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/chart.js"></script>
    <script type="text/JavaScript" src="<?php echo URLROOT; ?>/js/admin/dashboard.js"></script>

<?php require APPROOT.'/views/inc/footer.php'; ?>

