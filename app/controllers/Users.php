<?php

use PHPMailer\PHPMailer\PHPMailer;

//Require PHP Mailer
require APPROOT.'/libraries/vendor/autoload.php';

    class Users extends Controller{
        private $mail;
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->mail = new PHPMailer(true);
        }


        public function login() {
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
                } else {
                    if ($this->userModel->findnonverifiedUserByEmail($data['email'])) {
                        $data['email_err'] = 'User not verified. Please check your email';
                    } elseif(!$this->userModel->findUserByEmail($data['email'])) {
                        $data['email_err'] = 'User not found';
                    }
                }

                //Validate the password
                if(empty($data['password'])){
                    $data['password_err']='Please enter the password';
                }

                //If no error found the login the user
                if(empty($data['email_err']) && empty($data['password_err'])){
                    //log the user
                    $loggedUser = $this->userModel->login($data['email'],$data['password']);

                    if($loggedUser){
                        // Check if the user is banned
                        if ($loggedUser->status == 0) {
                            $data['email_err'] = 'This account has been banned';
                            $this->view('users/login', $data);
                            return; // Add this line
                        } else {
                            //User the authenticated
                            //create user sessions
                            $this->createUserSession($loggedUser);

                            // Log user login activity
                            $this->userModel->logActivity($_SESSION['user_id'], 'User Login', 'User logged in');

                            // If "Remember Me" is checked, set a cookie
                            if ($data['remember_me']) {
                                $this->setRememberMeCookie($loggedUser->id);
                            }
                        }
                    } else {
                        $data['password_err']='Password incorrect';
                        //Load view with errors
                        $this->view('users/login', $data);
                    }
                } else {
                    //Load view with errors
                    $this->view('users/login', $data);
                }
            } else {
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

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_number']);
            unset($_SESSION['userType']);
            
            session_destroy();

            redirect('Users/login');
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
                } else {
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }  

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }elseif (!ctype_digit($data['number']) || strlen($data['number'])!=10) {
                    $data['number_err'] = 'Contact number requires  10 digits and must consist only of digits.';
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
                    $data['token']=bin2hex(random_bytes(32));
                    //Register user
                    if($this->userModel->register($data)){   
                        // create a flash message
                        flash('reg_flash', ' A verification email has been sent to your email address.Please check');

                        // Send confirmation email to confirm
                        $this->send_email_confirmation($data['token'],$data['email']);

                        // Log user registration activity
                        $this->userModel->logActivity($_SESSION['user_id'], 'User Registration', 'New user signed up');

                        // Redirect to the email verification page
                        redirect('Users/emailVerification/' . $data['email']);
                    }
                    else{
                        // die('Something went wrong');
                        die('Something went wrong');
                    }
                } 
                else {
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

 
        public function emailVerification($email) {
            // Load the view with the email data
            $this->view('users/v_emailver', ['token'=>$token,'email' => $email]);
        }

        public function send_email_confirmation($token, $usersEmail){
            $url = "localhost/ecotrade/users/verify_email?token=$token";
            // 1 hour from now
            // $expirationTime = time() + (60 * 60); 

            $this->mail->isSMTP();
            $this->mail->Host = 'smtp.gmail.com';
            $this->mail->SMTPAuth = true;
            $this->mail->SMTPSecure = 'tls';
            $this->mail->Port = 587; // Use 587 for TLS, 465 for SSL
            $this->mail->Username = 'ecotrade46@gmail.com';
            $this->mail->Password = 'inua qsto hwfo seiy';

            //Can Send Email Now
            $subject = "Ecotrade - Verify your email";
            $message = "<p>Dear user,</p>";
            // $message = "Dear {$data['username']},\n\n";
            $message .= "<p></p>";
            $message .= "<p>To verify your email, please click on the following link:</p>";
            $message .= "<a href='".$url."'>Verify Email</a>";
            $message .= "<p>This link is valid for a limited time only. If you do not reset your password within this time frame, you may need to request another reset link.</p>";
            $message .= "<p>Thank you,</p>";
            $message .= "<p>Best Regards,<br>The EcoTrade Team</p>";
            // $message .= "<script>window.open('$url', '_blank');</script>";  // open the link in a new tab


            $this->mail->setFrom('ecotrade46@gmail.com', $subject);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body = $message;
            $this->mail->addAddress($usersEmail);
            $this->mail->send();
        }

        public function resendEmailConfirmation() {
            // Get the email and token from the request
            $email = $_POST['email'];
            $token = $_POST['token'];

            // Call the send_email_confirmation function
            $this->send_email_confirmation($token, $email);

            // Return a success message
            echo 'success';
        }

        public function verify_email(){
            $token = $_GET['token'];
            
            // get user from the temp_user_table
            $temp_user=$this->userModel->get_user_by_token($token);

            if($temp_user){
                // if user is not verified make a new one
                if(!$temp_user->verified){
                    $data['username']=$temp_user->username;
                    $data['email']=$temp_user->email;
                    $data['number']=$temp_user->number;
                    $data['password']=$temp_user->password;
                    $data['user_type']=$temp_user->user_type;

                    // insert user into the user table
                    $this->userModel->insert_user($data);
                    $this->userModel->verify_user($temp_user->email);
                    
                }

                // after verifying user and already veerified user
                redirect('Users/login');
                
            }else{
                // user not found
                $this->view('pages/verified');
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
            $_SESSION['LAST_ACTIVITY'] = time(); // Update last activity time stamp

            
            // die($_SESSION['userType']);
            if($_SESSION['userType']=='admin'){
                redirect('admin/index');
            }
            elseif($_SESSION['userType']=='moderator'){
                redirect('moderators/index');
            }
            elseif($_SESSION['userType']=='center'){
                redirect('RecycleCenters/index');
            }
            elseif($_SESSION['userType']=='collector'){
                redirect('collectors/index');
            }
            else{
                redirect('Pages/index');
            }
            
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }
            else{
                return false;
            }
        }

        private function setRememberMeCookie($userId){
            // Generate a unique token or identifier
            $token = uniqid();

            // Store the token in the database (you may need to create a "remember_tokens" table for this)
            $this->userModel->storeRememberToken($userId, $token);

            // Set a cookie with the token (you may want to set an expiration time)
            setcookie('remember_me', $token, time() + 3600 * 24 * 30, '/');
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
                               $this->userModel->updateProfileImage($_SESSION['user_id'], $filename);
                                    // The image has been saved, and the user's profile has been updated
                               
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
            $this->view('pages/v_buyer_profile', $data);
        }

        public function delete(){
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

        public function update(){
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

                $flag=false;

                // Validate the old password
                if (empty($oldPassword)) {
                    $flag=true;
                    error('oldPassword','Please enter your old password.');
                } elseif (!$this->userModel->verifyOldPassword($_SESSION['user_id'], $oldPassword)) {
                    $flag=true;
                    error('oldPassword','Incorrect old password.');
                }

                // Validate the new password and confirm password
                if (empty($newPassword)) {
                    $flag=true;
                    error('newPassword','New password cannot be empty.');
                } elseif (strlen($newPassword) < 6) {
                    $flag=true;
                    error('newPassword','New password must be at least 6 characters.');
                }

                if (empty($confirmPassword)) {
                    $flag=true;
                    error('confirmPassword','Please confirm your new password.');
                } elseif ($newPassword !== $confirmPassword) {
                    $flag=true;
                    error('confirmPassword','New password and confirm password do not match.');
                }

                // Check if there are any validation errors
                if (!$flag) {
                    if ($this->userModel->updatePassword($_SESSION['user_id'], $oldPassword, $newPassword)) {
                        flash('update_password', 'New password updated successfully');
                  
                    } else {
                        // Error occurred during password update
                        die('Something went wrong while updating the password');
                    }
                } 
            } else {
                // Display the password update form
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];
                $this->view('admin/dashboard', $data);
                $this->view('moderators/v_index', $data);
            }
        }

        public function changepassword(){
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

                $flag=false;

                // Validate the old password
                if (empty($oldPassword)) {
                    $flag=true;
                    error('oldPassword','Please enter your old password.');
                } elseif (!$this->userModel->verifyOldPassword($_SESSION['user_id'], $oldPassword)) {
                    $flag=true;
                    error('oldPassword','Incorrect old password.');
                }

                // Validate the new password and confirm password
                if (empty($newPassword)) {
                    $flag=true;
                    error('newPassword','New password cannot be empty.');
                } elseif (strlen($newPassword) < 6) {
                    $flag=true;
                    error('newPassword','New password must be at least 6 characters.');
                }

                if (empty($confirmPassword)) {
                    $flag=true;
                    error('confirmPassword','Please confirm your new password.');
                } elseif ($newPassword !== $confirmPassword) {
                    $flag=true;
                    error('confirmPassword','New password and confirm password do not match.');
                }

                // Check if there are any validation errors
                if (!$flag) {
                    if ($this->userModel->updatePassword($_SESSION['user_id'], $oldPassword, $newPassword)) {
                        flash('update_password', 'New password updated successfully');
                  
                    } else {
                        // Error occurred during password update
                        die('Something went wrong while updating the password');
                    }
                }
            } else { 
                // Display the password update form
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                $data = [
                    'user' => $user
                ];
                $this->view('pages/v_buyer_profile', $data);
            }
        }

        public function edit_username(){
            if(!$this->isLoggedIn()) {
                redirect('Users/login'); 
            }
            $data =[
                'newUsername'=>'',
                'newUsername_err'=>'',
            ];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data['newUsername'] = trim($_POST['newUsername']);

                if(empty($data['newUsername'])){
                    $data['newUsername_err']='Username cannot be empty.';
                }
                if(empty($data['newUsername_err'])){

                    if ($this->userModel->updateUsername($data['newUsername'])) {

                        flash('profile_edit', 'Your profile has been updated successfully');
                        $_SESSION['user_name'] = $data['newUsername'];
                        $this->view('pages/v_buyer_profile');
                        return; 

                    } else{

                    $data['newUsername_err'] = 'Error updating username. Please try again.';   
                    }
                }
            }

            $this->view('pages/v_buyer_profile',$data);
        }

        public function edit_number(){
        if (!$this->isLoggedIn()) {
            redirect('Users/login');
        }

        $data = [
            'newContactNumber' => '',
            'newContactNumber_err' => '', 
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         
            $data['newContactNumber'] = trim($_POST['newContactNumber']);

          
            if (empty($data['newContactNumber'])) {
                $data['newContactNumber_err'] = 'Contact number cannot be empty.';
            } elseif (!ctype_digit($data['newContactNumber']) || strlen($data['newContactNumber']) < 9) {
                $data['newContactNumber_err'] = 'Contact number must have at least 10 digits.';
            }

            if (empty($data['newContactNumber_err'])) {
                if ($this->userModel->updateUsernumber($data['newContactNumber'])) {
                   
                    flash('profile_edit', 'Your profile has been updated successfully');

                    $_SESSION['user_number'] = $data['newContactNumber'];
                    $this->view('pages/v_buyer_profile');
                    return; 
                } else {
                    $data['newContactNumber_err'] = 'Error updating contact number. Please try again.';
                }
            }
        }

        $this->view('pages/v_buyer_profile',$data);
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
                            

    