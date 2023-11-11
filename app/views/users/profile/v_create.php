<?php require APPROOT.'/views/inc/header.php'; ?>

    <div class="container">
       
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="profile-image">
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
                    <div class="list-group list-group-flush account-settings-links">

                        <div class="nav-elements">
                            <a class="list-group-item list-group-item-action active" onclick="loadContent('general')">General</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('change-password')">Change password</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('delete-profile')">Delete profile</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('security')">Security</a>
                            <a class="list-group-item list-group-item-action" onclick="loadContent('notifications')">Notifications</a>
                        </div>
                    </div>
                </div>
                <div class="all-sections">
                    <div id="general-section" class="col-md-9">
                        <div class="as_name">
                            <h4 class="font-weight-bold py-3 mb-4" style="color: Black;">
                            Account settings
                            </h4>
                            <hr>
                        </div>
                    
                        <div class="right-below">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-general">
                                    <div class="card-body media align-items-center"> </div>
                                    <!-- <hr class="border-light m-0"> -->
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo URLROOT; ?>/users/edit_profile">
                                            
                                            <div class="form-group">
                                                <label class="form-label">Username</label>
                                                <input type="text" class="form-control" name="newUsername" value="<?php echo $data['user']->username; ?>">
                                            </div>
                                            <!-- <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" value="Nelle Maxwell">
                                            </div> -->
                                            <div class="form-group">
                                                <label class="form-label">E-mail</label>
                                                <!-- <input type="text" class="form-control" value="nmaxwell@mail.com"> -->
                                                <input type="text" class="form-control" value="<?php echo $data['user']->email; ?>"disabled>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Contact number</label>
                                                <!-- <input type="text" class="form-control" value="0112532962"> -->
                                                <input type="text" class="form-control" name="newContactNumber" value="<?php echo $data['user']->number; ?>">
                                                <!-- <input type="text" class="form-control" value="<?php echo $_SESSION['user_number']; ?>"> -->

                                            </div>
                                            <!-- display error messages when fields are empty -->
                                            <?php if (!empty($data['errors']['newUsername'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['newUsername']; ?></div>
                                            <?php endif; ?>
                                            <?php if (!empty($data['errors']['newContactNumber'])) : ?>
                                                <div class="form-invalid"><?php echo $data['errors']['newContactNumber']; ?></div>
                                            <?php endif; ?>

                                            <div class="profile-buttons">
                                                <button class="profile-updatebt">
                                                    Edit
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
                            <div class="right-right">
                                <div class="form-group">
                                    <label class="form-label">User-type</label>
                                    <input type="text" class="form-control" value="<?php echo $data['user']->userType; ?>"disabled>
                                </div>
                            <div>
                            
                            
                                <!-- <button class="home-back" style="position:fixed; bottom:30px; right:30px ; padding:10px 30px;background-color:#7bd664;border:1px;border-color: #7bd664;">
                                            Back to home
                                </button> -->
                                <button class="home-back" style="position: fixed; bottom: 30px; right: 30px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                                Back to Home
                                </button>                      
                        </div>
                      </div>
                    </div>
                    </div>

                    <div id="change-password-section" class="col-md-9">
                        <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Password settings
                        </h4>
                        <hr>
                        </div>
                    
                        <div class="right-below">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-change-password">
                                    <div class="card-body media align-items-center"> </div>
                                    <!-- <hr class="border-light m-0"> -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Old Password</label>
                                            <input type="text" class="form-control" value="">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">New Password</label>
                                            <input type="text" class="form-control" value="">
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
                                    <div class="confirmpassword">
                                    <label class="form-label" >Confirm New Password</label>
                                    <input type="text" class="form-control" value="">
                                    </div>
                                </div>
                            <div>
                        <button class="home-back" style="position: fixed; bottom: 30px; right: 30px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button>
                            
                        </div>
                    </div>
                    </div>
                    </div>

                
                    <div id="delete-profile-section" class="col-md-9">
                        <div class="as_name">
                        <h4 class="font-weight-bold py-3 mb-4">
                        Account deletion
                        </h4>
                        <hr>
                        </div>
                    
                        <div class="right-below">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="account-deletion">
                                    <div class="card-body media align-items-center"> </div>
                                    <!-- <hr class="border-light m-0"> -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" value="Anne">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="Nelle Maxwell">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="text" class="form-control" value="nmaxwell@mail.com">
                                            <!-- <div class="alert alert-warning mt-3">
                                                Your email is not confirmed. Please check your inbox.<br>
                                                <a href="javascript:void(0)">Resend confirmation</a>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact number</label>
                                            <input type="text" class="form-control" value="0112532962">
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
                                    <input type="text" class="form-control" value="seconhandbuyer">
                                </div>
                            <div>
                            
                        <!-- <button class="home-back" style="position:fixed; bottom:30px; right:30px ; padding:10px 30px;background-color:#7bd664;border:1px;border-color: #7bd664;">
                                            Back to home
                        </button> -->
                        <button class="home-back" style="position: fixed; bottom: 30px; right: 30px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button>
                            
                        </div>
                    </div>
                    </div>
                    </div>


                    <div id="security-section" class="col-md-9">
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
                                    <!-- <hr class="border-light m-0"> -->
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Username</label>
                                            <input type="text" class="form-control" value="Anne">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="Nelle Maxwell">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="text" class="form-control" value="nmaxwell@mail.com">
                                            <!-- <div class="alert alert-warning mt-3">
                                                Your email is not confirmed. Please check your inbox.<br>
                                                <a href="javascript:void(0)">Resend confirmation</a>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact number</label>
                                            <input type="text" class="form-control" value="0112532962">
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
                                    <input type="text" class="form-control" value="seconhandbuyer">
                                </div>
                            <div>
                            
                        <!-- <button class="home-back" style="position:fixed; bottom:30px; right:30px ; padding:10px 30px;background-color:#7bd664;border:1px;border-color: #7bd664;">
                                            Back to home
                        </button> -->
                        <button class="home-back" style="position: fixed; bottom: 30px; right: 30px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button>
                            
                        </div>
                    </div>
                    </div>
                    </div>


                    <div id="notifications-section" class="col-md-9">
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
                                            <input type="text" class="form-control" value="Anne">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control" value="Nelle Maxwell">
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">E-mail</label>
                                            <input type="text" class="form-control" value="nmaxwell@mail.com">
                                            <!-- <div class="alert alert-warning mt-3">
                                                Your email is not confirmed. Please check your inbox.<br>
                                                <a href="javascript:void(0)">Resend confirmation</a>
                                            </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Contact number</label>
                                            <input type="text" class="form-control" value="0112532962">
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
                                    <input type="text" class="form-control" value="seconhandbuyer">
                                </div>
                            <div>
                            
                        <!-- <button class="home-back" style="position:fixed; bottom:30px; right:30px ; padding:10px 30px;background-color:#7bd664;border:1px;border-color: #7bd664;">
                                            Back to home
                        </button> -->
                        <button class="home-back" style="position: fixed; bottom: 30px; right: 30px; padding: 10px 30px; background-color: #7bd664; border: 1px; border-color: #7bd664;" onclick="redirectToHome()">
                        Back to Home
                        </button>
                            
                        </div>
                    </div>
                    </div>

            </div>
        </div>
    </div>


<script>



function loadContent(section) {
    // console.log('Loading section:', section);

    // Hide all sections
    document.getElementById('general-section').style.display = 'none';
    document.getElementById('change-password-section').style.display = 'none';
    document.getElementById('delete-profile-section').style.display = 'none';
    document.getElementById('security-section').style.display = 'none';
    document.getElementById('notifications-section').style.display = 'none';

    // Show the selected section
    document.getElementById(section + '-section').style.display = 'block';
}

 // Initial load (show default section)
loadContent('general');



function redirectToHome() {
    window.location.href = '<?php echo URLROOT; ?>/Pages/index';
}

let profilePic = document.getElementById("profile-pic");
let inputFile = document.getElementById("upload-photo");

inputFile.onchange = function(){
    profilePic.src = URL.createObjectURL(inputFile.files[0])
}

// const initialMarginTop = document.querySelector('.as_name').offsetHeight;

//         // Apply the initial margin-top value to the container
//         document.getElementById('as-name-container').style.marginTop = initialMarginTop + 'px';
//     });
        
</script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
