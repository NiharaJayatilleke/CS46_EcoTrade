<?php
    class Moderators extends Controller{
        public function __construct(){
            $this->moderatorModel = $this->model('M_Moderators');
            $this->itemAdsModel = $this->model('M_Item_Ads');
            $this->userModel = $this->model('M_Users');
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => 'moderator',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                        

                    }
                }

                // Check if the Moderator has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the Moderator
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->insert_user($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Admin/moderators#moderators-content');//should redirect back to admin index
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('moderators/register', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'username' => '',
                    'email' => '',
                    'number' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('moderators/register', $data);
            }
        }

        // public function login(){
        //     if($_SERVER['REQUEST_METHOD']=='POST'){
        //         //Form is submitting
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //         $data =[
        //             'email' =>trim($_POST['email']),
        //             'password'=>trim($_POST['password']),

        //             'email_err' =>'',
        //             'password_err'=>''
        //         ];
        //         //validate the email
        //         if(empty($data['email'])){
        //             $data['email_err']='Please enter the email';
        //         }
        //         else{
        //             if($this->moderatorModel->findUserByEmail($data['email'])){
        //                 //Moderator is found
        //             }
        //             else{
        //                 //Moderator is not found
        //                 $data['email_err'] = 'Moderator not found';
        //             }
        //         }

        //         //Validate the password
        //         if(empty($data['password'])){
        //             $data['password_err']='Please enter the password';
        //         }

        //         //If no error found the login the Moderator
        //         if(empty($data['email_err'])&&empty($data['password_err'])){
        //             //log the Moderator
        //             $loggedUser = $this->userModel->login($data['email'],$data['password']);

        //             if($loggedUser){
        //                 //User the authenticated
        //                 //create user sessions
        //                 $this->createUserSession($loggedUser);
        //             }
        //             else{
        //                 $data['password_err']='Password incorrect';

        //                 //Load view with errors
        //                 $this->view('moderators/login', $data);
        //             }
        //         }
        //         else{
        //             //Load view with errors
        //             $this->view('moderators/login', $data);
        //         }

        //     }
        //     else{
        //         //initial form
        //         $data =[
        //             'email' =>'',
        //             'password'=>'',

        //             'email_err' =>'',
        //             'password_err'=>''
        //         ];

        //         //Load view
        //         $this->view('moderators/login', $data);
        //     }
        // }

        // public function createModeratorSession($user){
        //     $_SESSION['moderator_id']=$user->id;
        //     $_SESSION['moderator_email']=$user->email;
        //     $_SESSION['moderator_name']=$user->username;

        //     redirect('Moderators/index');
        // }

        // public function logout(){
        //     unset($_SESSION['moderator_id']);
        //     unset($_SESSION['moderator_email']);
        //     unset($_SESSION['moderator_name']);
        //     session_destroy();

        //     redirect('Moderators/login');
        // }
        
        // public function isLoggedIn(){
        //     if(isset($_SESSION['moderator_id'])){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }

        public function terms(){
            $this->view('moderators/v_terms'); // Load the 'terms.php' view
        }

        public function edit($modId){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'id' => $modId,
                    'username' => trim($_POST['username']),
                    // 'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                // //Validate email

                // if(empty($data['email'])){
                //     $data['email_err'] = 'Please enter an email';
                // }
                // else{
                //     //check email is already registered or not
                //     if($this->moderatorModel->findModeratorByEmail($data['email'])){
                //         $data['email_err'] = 'This email is already registered';
                //     }
                // }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }elseif (!ctype_digit($data['number']) || strlen($data['number']) < 9) {
                    $data['number_err'] = 'Contact number requires at least 10 digits and must consist only of digits.';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                    }
                }

                // Check if the Moderator has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the Moderator
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //edit user
                    if($this->moderatorModel->edit($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Admin/moderators#moderators-content');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('moderators/edit', $data);
                }
            }
            else {
                $moderator = $this->moderatorModel->getModeratorById($modId);
                // initial form
                $data = [
                    'id' => $modId,
                    'username' => $moderator->username,
                    'email' => $moderator->email,
                    'number' => $moderator->number,
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('moderators/edit', $data);
            }
        }

        public function delete($modId){
            $moderator = $this->moderatorModel->getModeratorById($modId);

                if($this->moderatorModel->delete($modId)){
                    flash('post_msg', 'Your moderator has been deleted successfully!');
                    redirect('Admin/moderators#moderators-content');
                }
                else{
                    die('Something went wrong');
                }
                       
        }

        public function index(){

            // if(!isset($_SESSION['userType']) || ($_SESSION['userType'] != 'moderator' && $_SESSION['userType'] != 'admin')){

            //     $this->view('pages/forbidden');
            // }
            // else{

                $ads = $this->itemAdsModel->getAds();
                $userCounts = $this->moderatorModel->getUserCounts();
                $adCountsByCategory = $this->moderatorModel->getItemAdCountsByCategory();
                $reportedAds = $this->moderatorModel->getReportedAds();
                $recentActivities = $this->moderatorModel->getRecentActivities();
                $useremail = $_SESSION['user_email'];
                $userdetails = $this->moderatorModel->getuserdetails($useremail);
                $data = [
                    'ads' => $ads,
                    'userCounts' => $userCounts,
                    'adCountsByCategory' => $adCountsByCategory,
                    'reportedAds' => $reportedAds,
                    'recentActivities' => $recentActivities,
                    'userdetails'=> $userdetails,
               ];
                $this->view('moderators/v_index', $data);

            // }
        }

        public function hideAd($adId) {
            if ($this->moderatorModel->hideAdById($adId)) {
                http_response_code(200); // Send success response
            } else {
                http_response_code(500); // Send error response
            }
        }

        public function edit_profile(){
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                
                // Form submission, update user info
                $newUsername = trim($_POST['newUsername']);
                $newContactNumber = trim($_POST['newContactNumber']);
        
                // Initialize an array to store validation errors
                $errors = [];
        
                // Validate the new username
                if (empty($newUsername)) {
                    $errors['newUsername'] = 'username cannot be empty.';
                }
        
                
                // Validate the new contact number
                if (empty($newContactNumber)) {
                    $errors['newContactNumber'] = 'contact number cannot be empty.';
                } elseif (!ctype_digit($newContactNumber) || strlen($newContactNumber) < 9) {
                    $errors['newContactNumber'] = 'Contact number must have at least 10 digits.';   
                }
        
                // Check if there are any validation errors
                if (empty($errors)) {
                    // Call the updateUserInfo method in your model to update the user's information
                    if ($this->moderatorModel->updateUserInfo($newUsername, $newContactNumber)) {
                        // User information updated successfully
                        flash('profile_edit', 'Your profile has been updated successfully');
                        
                        // update the session
                        $_SESSION['user_name']=$newUsername;
                    }
                }
            }
                    
        }

        public function profile(){
            // Check if the user is logged in
            if (!$this->isLoggedIn()) {
                // Redirect the user to the login page if they are not logged in
                redirect('Users/login');
            }
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Handle the image upload
                if (isset($_FILES['photo'])) {
                    $image = $_FILES['photo'];
            
                    // Check if there was no file error
                    if ($image['error'] === UPLOAD_ERR_OK) {
                        // Define the directory to store the images
                        $uploadDir = '../public/img/profilepic/';    
                        // Generate a unique filename
                        $user_id = $_SESSION['user_id'];
                        $filename = $user_id . '' . time() . '' . $image['name'];
            
                        // Move the uploaded image to the upload directory
                        if (move_uploaded_file($image['tmp_name'], $uploadDir . $filename)) {
                            // Update the user's profile image path in the database
                            if ($this->userModel->updateProfileImage($_SESSION['user_id'], $filename)) {
                                // The image has been saved, and the user's profile has been updated
                            } else {
                                // Handle an error updating the database
                            }
                        } else {
                            // Handle an error moving the uploaded file
                        }
                    }
                }
            }

            // die($_SESSION['userType']);

            $user = $this->userModel->getUserDetails($_SESSION['user_id']);
            $data = [
                'user' => $user
                
            ];
           
            // Load the profile view
            $this->view('users/profile/v_create', $data);
        }

    }
?>
