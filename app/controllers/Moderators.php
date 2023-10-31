<?php
    class Moderators extends Controller{
        public function __construct(){
            $this->moderatorModel = $this->model('M_Moderators');
        }


        public function login(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Form is submitting
                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                // Input data
                $data = [
                    'email' => trim($_POST['email']),
                    'username' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'remember_me' => isset($_POST['remember_me']),
                    'err' => ''
                ];
    
                // Validate data
                // Validate email
                if (empty($data['email'])){
                    $data['err'] = 'Please enter email';
                }
                else{
                    if ($this->userModel->findUserByEmail($data['email']) or $this->userModel->findUserByUsername($data['username'])){
                        // User found
                    }
                    else{
                        // User not found
                        $data['err'] = 'No user found';
                    }
                }
    
                // Validate password
                if (empty($data['password'])){
                    $data['err'] = 'Please enter password';
                }
    
                // Check if error is empty
                if (empty($data['err'])){
                    // log the user
                    $loggedInUser = $this->userModel->login($data['email'], $data['password'], $data['username']);
                    if ($loggedInUser){
                        // Create session
                        $this->createUserSession($loggedInUser);
    
                        // If "Remember Me" is checked, set a cookie
                        if ($data['remember_me']) {
                            $this->setRememberMeCookie($loggedInUser->id);
                        }
                    }
                    else{
                        $data['err'] = 'Password incorrect';
    
                        // Load view with errors
                        $this->view('users/v_login', $data);
                    }
                }
                else{
                    // Load view with errors
                    $this->view('users/v_login', $data);
                }
            }
            else{
                // Initial form load
                $data = [
                    'email' => '',
                    'username' => '',
                    'password' => '',
                    'err' => ''
                ];
    
                // Load view
                $this->view('users/v_login', $data);
            }
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

        public function createModeratorSession($user){
            $_SESSION['moderator_id']=$user->id;
            $_SESSION['moderator_email']=$user->email;
            $_SESSION['moderator_name']=$user->username;

            redirect('Pages/index');
        }

        public function logout(){
            unset($_SESSION['moderator_id']);
            unset($_SESSION['moderator_email']);
            unset($_SESSION['moderator_name']);
            session_destroy();

            redirect('Moderators/login');
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['moderator_id'])){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>
