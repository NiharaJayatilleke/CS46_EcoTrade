<?php require APPROOT.'/views/inc/header.php'; ?>

 <div class="container">
        
        <!-- <div class="card overflow-hidden"> -->
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
                    <form method="POST" action="<?php echo URLROOT; ?>/users/create_profile" enctype="multipart/form-data">               
                    <div class="media-body">
                        <div class="file-upload">
                            <label for="upload-photo">Browse</label>
                            <input type="file" id="upload-photo" name="photo" accept="image/*">
                        </div>
                    </div>
                    <button type="submit">Save Photo</button> 
                    </form>
                    <div class="list-group list-group-flush account-settings-links">

                        <div class="nav-elements">
                            <a class="list-group-item list-group-item-action active" href="<?php echo URLROOT; ?>/users/create_profile">General</a>
                            <a class="list-group-item list-group-item-action" href="<?php echo URLROOT; ?>/users/update_profile/">Change password</a>
                            <!-- <a class="list-group-item list-group-item-action" href="#account-info">Info</a> -->
                            <a class="list-group-item list-group-item-action" href="<?php echo URLROOT; ?>/users/delete_profile/">delete profile</a>
                            <a class="list-group-item list-group-item-action" href="<?php echo URLROOT; ?>/users/security_profile/">security</a>
                            <a class="list-group-item list-group-item-action" href="<?php echo URLROOT; ?>/users/notifications_profile">Notifications</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="as_name">
                    <h4 class="font-weight-bold py-3 mb-4" style="color: Black;">
                Account settings
                    </h4>
                    <hr>
                    </div>
                
                <div class="right-below">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                
                            </div>
                            <!-- <hr class="border-light m-0"> -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control" value="<?php echo $data['user']->username; ?>">
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
                                    <input type="text" class="form-control" value="<?php echo $data['user']->number; ?>">
                                    <!-- <input type="text" class="form-control" value="<?php echo $_SESSION['user_number']; ?>"> -->

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
        </div>
<script>

function redirectToHome() {
    window.location.href = '<?php echo URLROOT; ?>/Pages/index';
}

let profilePic = document.getElementById("profile-pic");
let inputFile = document.getElementById("upload-photo");

inputFile.onchange = function(){
    profilePic.src = URL.createObjectURL(inputFile.files[0])
}

</script>

<?php require APPROOT.'/views/inc/footer.php'; ?>
