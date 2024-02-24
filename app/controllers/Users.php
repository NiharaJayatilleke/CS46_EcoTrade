<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
        }

        public function login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'email' =>trim($_POST['email']),
                    'password'=>trim($_POST['password']),

                    'email_err' =>'',
                    'password_err'=>''
                ];
                //validate the email
                if(empty($data['email'])){
                    $data['email_err']='Please enter the email';
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        //User is found
                    }
                    else{
                        //User is not found
                        $data['email_err'] = 'User not found';
                    }
                }

                //Validate the password
                if(empty($data['password'])){
                    $data['password_err']='Please enter the password';
                }

                //If no error found the login the user
                if(empty($data['email_err'])&&empty($data['password_err'])){
                    //log the user
                    $loggedUser = $this->userModel->login($data['email'],$data['password']);

                    if($loggedUser){
                        //User the authenticated
                        //create user sessions
                        $this->createUserSession($loggedUser);

                        // If "Remember Me" is checked, set a cookie
                        if ($data['remember_me']) {
                            $this->setRememberMeCookie($loggedUser->id);
                        }
                    }
                    else{
                        $data['password_err']='Password incorrect';

                        //Load view with errors
                        $this->view('users/login', $data);
                    }
                }
                else{
                    //Load view with errors
                    $this->view('users/login', $data);
                }

            }
            else{
                //initial form
                $data =[
                    'email' =>'',
                    'password'=>'',

                    'email_err' =>'',
                    'password_err'=>''
                ];

                //Load view
                $this->view('users/login', $data);
            }
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
                    'user_type' => trim($_POST['user_type']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                } else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['email_err'] = 'Please enter a valid email address';
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

                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('Users/signup', $data);
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
                $this->view('users/signup', $data);
            }
        }

        public function collectorRegister(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                // Input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'nic' => trim($_POST['nic']),
                    'user_type' => 'collector', // Hardcoded as collector for collector registration
                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'nic_err' => '',
                    'agree_err' => ''
                ];
        
                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                }
        
                // Validation is completed and no error then register the user
                if(empty($data['username_err']) && empty($data['email_err']) && empty($data['number_err']) && empty($data['nic_err']) && empty($data['agree_err'])){
    
                    // Register collector
                    if($this->collectorModel->register($data)){
                        // Create a flash message
                        flash('reg_flash', 'You are successfully registered as a collector!');
                        redirect('Collectors/index');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    // Load view
                    $this->view('users/collectors/register', $data);
                }
            }
            else {
                if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'pBuyer') {
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
        
                    // Load collector registration view
                    $this->view('users/collectors/register', $data);
                } else {
                    // Guests or other user types should go to general user registration
                    redirect('Users/register');
                }
            }
        }
        
        public function terms(){
            $this->view('users/v_terms'); // Load the 'terms.php' view
        }

        public function forgot_password(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Handle the password reset request
                // Validate and process the request, send reset instructions, and update the database as needed
                // Display a message to inform the user that reset instructions have been sent
                echo "Password reset instructions have been sent to your email address.";
            }
            else {
                // Display the password reset request form
                $data = [
                    'email' => '',
                    'email_err' => ''
                ];
                $this->view('users/forgot_password', $data);
            }
        }

        public function createUserSession($user){
            // parent::createUserSession($user);
            $_SESSION['user_id']=$user->id;
            $_SESSION['user_email']=$user->email;
            $_SESSION['user_name']=$user->username;
            $_SESSION['user_number'] = $user->number;
            $_SESSION['user_image'] = $user->profile_image;
            $_SESSION['userType'] = $user->user_type;

            redirect('Pages/index');
        }

        private function setRememberMeCookie($userId){
            // Generate a unique token or identifier
            $token = uniqid();

            // Store the token in the database (you may need to create a "remember_tokens" table for this)
            $this->userModel->storeRememberToken($userId, $token);

            // Set a cookie with the token (you may want to set an expiration time)
            setcookie('remember_me', $token, time() + 3600 * 24 * 30, '/');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_number']);

            session_destroy();

            redirect('Users/login');
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }
            else{
                return false;
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
                        $filename = $user_id . '_' . time() . '_' . $image['name'];
            
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


        public function edit_profile(){

            if (!$this->isLoggedIn()) {
                // Redirect the user to the login page if they are not logged in
                redirect('Users/login');
            }
        
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
                    if ($this->userModel->updateUserInfo($newUsername, $newContactNumber)) {
                        // User information updated successfully
                        flash('profile_edit', 'Your profile has been updated successfully');
                        redirect('users/profile');
                    } else {
                        // Error occurred during update
                        die('Something went wrong while updating the profile');
                    }
                } else {
                    // There are validation errors, re-display the form with error messages
                    $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                    $data = [
                        'user' => $user,
                        'errors' => $errors
                    ];
                    $this->view('users/profile/v_create', $data);
                }
            } else {
                // Display the update form
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];
                $this->view('users/profile/v_create', $data);
            }
        } 


        public function update() {
            if (!$this->isLoggedIn()) {
                // Redirect the user to the login page if they are not logged in
                redirect('Users/login');
            }
        
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                // Form submission, update user password
                $oldPassword = trim($_POST['oldPassword']);
                $newPassword = trim($_POST['newPassword']);
                // $confirmPassword = trim($_POST['confirmPassword']);
                $confirmPassword = isset($_POST['confirmPassword']) ? trim($_POST['confirmPassword']) : '';
        
                // Initialize an array to store validation errors
                $errors = [];
        
                // Validate the old password
                if (empty($oldPassword)) {
                    $errors['oldPassword'] = 'Please enter your old password.';
                } elseif (!$this->userModel->verifyOldPassword($_SESSION['user_id'], $oldPassword)) {
                    $errors['oldPassword'] = 'Incorrect old password.';
                }
        
                // Validate the new password and confirm password
                if (empty($newPassword)) {
                    $errors['newPassword'] = 'New password cannot be empty.';
                } elseif (strlen($newPassword) < 6) {
                    $errors['newPassword'] = 'New password must be at least 6 characters.';
                }
                
                if (empty($confirmPassword)) {
                    $errors['confirmPassword'] = 'Please confirm your new password.';
                } elseif ($newPassword !== $confirmPassword) {
                    $errors['confirmPassword'] = 'New password and confirm password do not match.';
                }


                // error_log('Form submitted successfully');

                // Check if there are any validation errors
                if (empty($errors)) {
                    // Call the updatePassword method in your model to update the user's password
                    // echo 'Before if condition';
                    if ($this->userModel->updatePassword($_SESSION['user_id'], $oldPassword, $newPassword)) {
                        flash('update_password', 'New password updated successfully');
                        //echo 'Reached here'; 
                        // redirect('users/profile');
                        redirect('users/profile');
                        
                    } else {
                        // Error occurred during password update
                        die('Something went wrong while updating the password');
                        
                    }
                } else {
                    // There are validation errors, re-display the form with error messages
                    $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                    $data = [
                        'user' => $user,
                        'errors' => $errors
                    ];
                    $this->view('users/profile/v_create', $data);
                }
            } else {
                // Display the password update form
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];
                $this->view('users/profile/v_create', $data);
            }
        }    


        public function delete() {
            if (!$this->isLoggedIn()) {
                // Redirect the user to the login page if they are not logged in
                redirect('Users/login');
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Sanitize and validate the password input
                $password = trim($_POST['password']);

                // Get the user details
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
            
                    // Verify the entered password
                if ($this->userModel->verifyOldPassword($_SESSION['user_id'], $password)) {

                    // Password is correct, delete the user
                    if ($this->userModel->deleteUser($_SESSION['user_id'])) {
                        // Logout the user and redirect to the login page
                        $this->logout();
                        header('Location: ' . URLROOT . '/users/register');
                        exit();
                    } else {
                        flash('account_deletion_error', 'Error deleting the profile. Please try again.');
                        header('Location: ' . URLROOT . '/users/profile#delete-profile');
                        exit();
                    }
                } else {
                    // Password is incorrect, show error message
                    flash('password_error', 'Incorrect password. Please try again.');
                    header('Location: ' . URLROOT . '/users/profile#delete-profile');
                    exit();
                }
            } else {
                // Redirect to the profile page if accessed without form submission
                header('Location: ' . URLROOT . '/users/profile');
                exit();
            }
                    
        }

        // public function profileimage(){
        //     if(isset($_SESSION['user_id'])) {
        //         $image = $this->userModel->getUserProfileImage($_SESSION['user_id']);
        //         $data = [
        //             'user' => $user,
        //         ];
        //         // Pass the data to the view
        //         $this->view('inc/components/topnavbar', $data);        
        //     } 
        // }

        // // Reset password view page
        // public function reset_password(){
        //     $this->view('users/v_Reset_newpassword'); // Load the 'v_Reset_newpassword.php' view
        // }


    }


        

 