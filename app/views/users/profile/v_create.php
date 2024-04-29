<?php require APPROOT.'/views/inc/header.php'; ?>

<?php require APPROOT . '/views/inc/components/topnavbar.php';?>
<body id="profile-body">
    <!-- <div class="hero2"> -->
    <div class="profile_container">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/css/pages/buyer_profilestyles.css">
            <!-- <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0"> -->
                    <div class="profile_image">
                        <div class="image-container">
                            <?php
                            if (!empty($data['user']->profile_image)) {
                                echo '<img src="' . URLROOT . '/public/img/profilepic/' . $data['user']->profile_image . '" alt="Profile Image" class="d-block ui-w-80" id="profile-pic">';
                            } else {
                                echo '<img src="' . URLROOT . '/public/img/profile.png" alt="Default Profile Image" class="d-block ui-w-80" id="profile-pic">';
                            }
                            ?>
                        </div>
                    </div>  
                    <form method="POST" action="<?php echo URLROOT; ?>/users/profile" enctype="multipart/form-data">               
                        <div class="media-body">
                            <div class="file-upload">
                                <label for="upload-photo">Browse Photo</label>
                                <input type="file" id="upload-photo" name="photo" accept="image/*">
                            </div>
                            <button type="submit">Save</button> 
                        </div>
                    </form>
                    <!-- <div class="list-group list-group-flush account-settings-links">

                        <div class="nav-elements">
                            <a class="list-group-item list-group-item-action active" onclick="loadContent('general')">General</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('change-password')">Change password</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('delete-profile')">Delete profile</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('security')">Security</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('notifications')">Notifications</a>
                        </div>
                    </div> -->
                <!-- </div> -->
                <div class="all-sections">
                    <div id="general" class="col-md-9">
                        <!-- <div class="as_name">
                            <h4 class="font-weight-bold py-3 mb-4" style="color: Black;">
                            Account settings
                            </h4>
                            <hr>
                        </div> -->
                    
                        <div class="right-below">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-general">
                                    <div class="card-body media align-items-center"> </div>
                                    <!-- <hr class="border-light m-0"> -->
                                    <div class="card-body">
                                        <!-- <form method="POST" action="<?php echo URLROOT; ?>/users/edit_profile"> -->
                                        <form method="POST" action="<?php echo URLROOT; ?>/users/edit_profile">
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control input-field-box" name="newUsername" value="<?php echo $_SESSION['user_name']; ?>">
                                                <?php if (!empty($data['errors']['newUsername'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['newUsername']; ?></div>
                                            <?php endif; ?>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">E-mail</label>
                                                <input type="text" class="form-control input-field-box" value="<?php echo $_SESSION['user_email']; ?>"disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Contact number</label>
                                                <input type="text" class="form-control input-field-box" name="newContactNumber" value="<?php echo $_SESSION['user_number']; ?>">
                                                    
                                                <?php if (!empty($data['errors']['newContactNumber'])) : ?>
                                                    <div class="form-invalid"><?php echo $data['errors']['newContactNumber']; ?></div>
                                                <?php endif; ?>
                                                

                                            </div>
                                            <div class="profile-buttons">
                                                <button class="profile-updatebt">
                                                    Edit profile
                                                </button>
                                                <!-- <button class="profile-Canclebt">Cancle</button> -->
                                            </div>

                                        </form>
                                        <div style="margin-top: 20px;">
                                            <?php flash('profile_edit'); ?>
                                        </div>

                                    </div>           
                                </div>              
                            </div>         
                            <!-- <div class="right-right"> -->
                                <div class="form-group">
                                    <label class="form-label">User-type</label>
                                    <input type="text" class="form-control input-field-box " value="<?php echo $_SESSION['userType']; ?>"disabled>
                                </div>
                                <!-- <div>
                                    <button class="home-back" style=" margin-top:200px; margin-left: 300px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                                    Back to Home
                                    </button>                      
                                </div> -->
                      </div>
                    </div>
                    </div>


                    <div id="change-password" class="col-md-9">
                        <!-- <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Password settings
                        </h4>
                        <hr>
                        </div> -->
                        
                        <div class="right-below">
                         
                            <div class="tab-content">
                            <form id="changePasswordForm" method="POST" action="<?php echo URLROOT; ?>/users/update#change-password">
                                <div class="tab-pane fade active show" id="account-change-password">
                                    <div class="card-body media align-items-center"> </div>
                                  
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" name="oldPassword" class="form-control input-field-box" value="">
                                            <?php if (!empty($data['errors']['oldPassword'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['oldPassword']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="newPassword" class="form-control input-field-box" value="">
                                            <?php if (!empty($data['errors']['newPassword'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['newPassword']; ?></div>
                                            
                                            <?php endif; ?>
                                        </div>

                                        <div class="profile-buttons" id="profile-buttons">
                                            <button class="profile-updatebt">
                                                Update password
                                            </button>
                                            <!-- <button class="profile-Canclebt">Cancle</button> -->
                                        </div>
                                    </div>
                                </div>
                            <div style="margin-top: 30px;">
                            <?php flash('update_password'); ?>
                            
                            </div>
                            </div>
                            <div class="right-right">
                                <div class="form-group">
                                    <div class="confirmpassword">
                                    <label class="form-label" >Confirm New Password</label>
                                    <input type="password" name="confirmPassword"class="form-control input-field-box" value="">
                                    <?php if (!empty($data['errors']['confirmPassword'])) : ?>
                                        <div class="form-invalid"><?php echo $data['errors']['confirmPassword']; ?></div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                </form>
                                <button class="home-back" style=" margin-top:200px; margin-left: 300px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                                Back to Home
                                </button>
                                </div>
                            </div>
                            
                        </div>
                    </div>



                    <!-- <div id="change-password" class="col-md-9">
                        <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Password settings
                        </h4>
                        <hr>
                        </div>
                        
                        <div class="right-below">
                        
                            <div class="tab-content">
                            <form id="changePasswordForm" method="POST" action="<?php echo URLROOT; ?>/users/updatePassword">
                                <div class="tab-pane fade active show" id="account-change-password">
                                    <div class="card-body media align-items-center"> </div>
                                   
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Old Password</label>
                                            <input type="password" name="oldPassword" class="form-control input-field-box" value="">
                                            <?php if (!empty($data['errors']['oldPassword'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['oldPassword']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="password" name="newPassword" class="form-control input-field-box" value="">
                                            <?php if (!empty($data['errors']['newPassword'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['newPassword']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" >Confirm New Password</label>
                                            <input type="password" name="confirmPassword"class="form-control input-field-box" value="">
                                            <?php if (!empty($data['errors']['confirmPassword'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['confirmPassword']; ?></div>
                                            <?php endif; ?>
                               
                                        </div>

                                        <div class="profile-buttons" id="profile-buttons">
                                            <button class="profile-updatebt">
                                                Update
                                            </button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php flash('update_password'); ?>
                            </div>
                            <div class="right-right">
                                <div>
                                <button class="home-back" style="position: fixed; bottom: 30px; right: 30px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                                Back to Home
                                </button>
                                </div>
                            </div>                     
                        </div>
                    </div> -->



                
                    <div id="delete-profile" class="col-md-9">
                        <!-- <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Account deletion
                        </h4>
                        <hr>
                        </div> -->
                    
                        <div class="right-below">
                            <div class="delete-container">
                                
                                    <div class="card-body media align-items-center"> </div>
                                    <div class="card-delete-body">
                                    <!-- <h4 id="Deleteaccount">Delete Account?</h4> -->
                                    <div class="tab-pane fade active show" id="account-deletion">
                                    <p id="deletesentence">You'll permanently lose your:</p>
                                        <ul>
                                            <li>Profile</li>
                                            <li>Saved ads</li>
                                            <li>Messages</li>
                                        </ul>
                                        <form id="delete-profile-form" method="POST" action="<?php echo URLROOT; ?>/users/delete#delete-profile">
                                            <div class="form-group">
                                                <div class="deletelabel">
                                                <label for="password">Enter Password</label>
                                                <input type="password" id="password-delete" name="password" class="form-control input-field-box" required>
                                                 </div>
                                            </div>
                                            <div class="profile-buttons">
                                            <button class="profile-deletebt" >
                                                Delete Profile
                                            </button>
                                            </div>
                                           
                                        </form>
                                        <?php if (!empty(flash('password_error'))) : ?>
                                                <?php echo flash('password_error'); ?>
                                        <?php endif; ?>
                                        <?php if (!empty(flash('account_deletion_error'))) : ?>
                                                <?php echo flash('account_deletion_error'); ?>
                                        <?php endif; ?>
                             
                                    </div>
                                    
                                 
                                </div>
                                <!-- <button class="home-back" style=" margin-top:20px; margin-right: 0px;padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                                                Back to Home
                                                </button> -->
                           
                            </div>
                            <div>
                            <!-- <button class="home-back" style=" margin-top:200px; margin-right: 100px; padding: 10px 50px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button> -->
                    </div>
                    </div>
                    </div>


                    <div id="security" class="col-md-9">
                        <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Account security
                        </h4>
                        <hr>
                        </div>
                    
                        <div class="right-below">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-security">
                                    <div class="card-body media align-items-center"> </div>

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Login</label>
                                            <input type="text" class="form-control input-field-box" value="Anne">
                                        </div>

                                        <div class="profile-buttons">
                                            <button class="profile-updatebt">
                                                Update
                                            </button>
                                            <button class="profile-Canclebt">Cancle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-right">
                                <div class="form-group">
                                    <label class="form-label">Two-factor-auth</label>
                                    <input type="text" class="form-control input-field-box" value="seconhandbuyer">
                                </div>
                            <div>
                            <button class="home-back" style=" margin-top:200px; margin-left: 300px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button>
                            
                        </div>
                    </div>
                    </div>
                    </div>


                    <div id="notifications" class="col-md-9">
                        <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Notifications 
                        </h4>
                        <hr>
                        </div>
                    
                        <div class="right-below">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-notifications">
                                    <div class="card-body media align-items-center"> </div>
                                    <!-- <hr class="border-light m-0"> -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control input-field-box" value="Anne">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control input-field-box" value="Nelle Maxwell">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="text" class="form-control input-field-box" value="nmaxwell@mail.com">
                                            <!-- <div class="alert alert-warning mt-3">
                                                Your email is not confirmed. Please check your inbox.<br>
                                                <a href="javascript:void(0)">Resend confirmation</a>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact number</label>
                                            <input type="text" class="form-control input-field-box" value="0112532962">
                                        </div>

                                        <div class="profile-buttons">
                                            <button class="profile-updatebt">
                                                Update
                                            </button>
                                            <button class="profile-Canclebt">Cancle</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="right-right">
                                <div class="form-group">
                                    <label class="form-label">User-type</label>
                                    <input type="text" class="form-control input-field-box" value="seconhandbuyer">
                                </div>
                            <div>
                            
                        <!-- <button class="home-back" style="position:fixed; bottom:30px; right:30px ; padding:10px 30px;background-color:#7bd664;border:1px;border-color: #7bd664;">
                                            Back to home
                        </button> -->
                        <button class="home-back" style=" margin-top:200px; margin-left: 300px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button>
                            
                        </div>
                    </div>
                    </div>

            </div>
        </div>
    </div>
    </div>

<script>

function loadContent(section) {

    // Hide all sections
    // document.getElementById('general').style.display = 'none';
    // document.getElementById('change-password').style.display = 'none';
    // document.getElementById('delete-profile').style.display = 'none';
    // document.getElementById('security').style.display = 'none';
    // document.getElementById('notifications').style.display = 'none';

    // Show the selected section
    document.getElementById(section ).style.display = 'block';

    window.location.hash = '#' + section ;
}

// Function to handle initial section based on URL hash
function handleInitialSection() {
    var hash = window.location.hash;
    if (hash) {
        // Extract the section name from the hash
        var section = hash.substring(1); // Remove '-section' suffix
        loadContent(section);
        currentSection = section;
    }else {
        // If no hash is present, default to 'general' section
        loadContent('general');
        currentSection = 'general';
    }
}

// Initial load (show default section)
handleInitialSection();

// Call the function when the page loads
window.onload = handleInitialSection;


// Function to redirect to the current active section
function redirectToCurrentSection() { 
    window.location.href = '<?php echo URLROOT; ?>/users/profile#' + currentSection ;
}

// Event listener for the "Update" or "Edit" buttons
document.getElementById('profile-buttons').addEventListener('click', redirectToCurrentSection);


function redirectToHome() {
    window.location.href = '<?php echo URLROOT; ?>/Pages/index';
}

let profilePic = document.getElementById("profile-pic");
let inputFile = document.getElementById("upload-photo");

inputFile.onchange = function(){
    profilePic.src = URL.createObjectURL(inputFile.files[0])
}
     

</script>
<!-- <script>
            console.log("Hello");
            swal("Here's a message!");
</script> -->

<!-- <?php require APPROOT.'/views/inc/footer.php'; ?> -->
</body>
</html>
