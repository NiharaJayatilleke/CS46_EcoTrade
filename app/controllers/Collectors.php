<?php
    class Collectors extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->collectorModel =$this->model('M_Collectors');
            $this->pagesModel =$this->model('M_Pages');

        }

        // public function temp_reg(){
        //     $user = $this->userModel->getUserDetails($_SESSION['user_id']);
        //     $data = [
        //         'user' => $user
        //     ];
        //     $this->view('users/collectors/register',$data);
            
        // }

        public function register(){
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
                        // Assuming $user is an instance of the class that contains the updateUserType method
                        if ($user->updateUserType('collector')) {
                            echo 'User type updated successfully';
                        } else {
                            echo 'Failed to update user type';
                        }
                        session_destroy();
                        redirect('Users/login');
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
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                // die('User ID: ' . $_SESSION['user_id'] . ', User Type: ' . $_SESSION['userType']);
                if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && ($_SESSION['userType'] != 'collector'|| $_SESSION['userType'] != 'recenter' || $_SESSION['userType'] != null)) {
                    $data = [
                        'user' => $user,
                    ];
        
                    // Load collector registration view
                    $this->view('users/collectors/register', $data);
                }
                else if($_SESSION['userType'] == 'collector'){
                    // Redirect to login page
                    redirect('Users/login');
                }
                else {
                    // Guests or other user types should go to general user registration
                    redirect('Users/register');
                }
            }
        }
        

        public function index(){
            $data = [];
            $this->view('users/collectors/dashboard',$data);
        }

        public function about(){
            $data = [];
            $this->view('users/collectors/about',$data);
        }

        // public function dashboard(){
        //     $data = [];
        //     $this->view('users/collectors/dashboard',$data);
        // }  
    }
?>