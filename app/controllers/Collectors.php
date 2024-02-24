<?php
    class Collectors extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->collectorModel =$this->model('M_Collectors');
            $this->pagesModel =$this->model('M_Pages');

        }

        public function temp_reg(){
            $data = [];
            $this->view('users/collectors/register',$data);
        }

        // public function register(){
        //     // Check if the person is in the users controller
        //     $userExists = $this->userModel->checkUserExists();

        //     if($userExists){
        //         die('User exists');
        //         // If the user exists, then allow the person to go forward in the view
        //         $data = $this->userModel->getUserDetails();
        //         $this->view('users/collectors/register', $data);
        //     } else {
        //         // If the user does not exist, then redirect the person to an appropriate page or show an error message
        //         redirect('users/signup');
        //     }
        // }

        // public function register(){
        //     if($_SERVER['REQUEST_METHOD'] =='POST'){
        //         // form is submitting
        //         // Validate the data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        //         // Input data
        //         $data = [
        //             'username' => trim($_POST['username']),
        //             'email' => trim($_POST['email']),
        //             'number' => trim($_POST['number']),
        //             'password' => trim($_POST['password']),
        //             'confirm_password' => trim($_POST['confirm_password']),
        //             'user_type' => 'collector', // Hardcoded as collector for collector registration
        //             'username_err' => '',
        //             'email_err' => '',
        //             'number_err' => '',
        //             'password_err' => '',
        //             'confirm_password_err' => '',
        //             'agree_err' => ''
        //         ];
        
        //         // Validate username
        //         if(empty($data['username'])){
        //             $data['username_err'] = 'Please enter a username';
        //         }
        
        //         // Validate email
        //         if(empty($data['email'])){
        //             $data['email_err'] = 'Please enter an email';
        //         }
        //         else{
        //             // Check if the email is already registered
        //             if($this->userModel->findUserByEmail($data['email'])){
        //                 $data['email_err'] = 'This email is already registered';
        //             }
        //         }   
        
        //         // Validate number
        //         if(empty($data['number'])) {
        //             $data['number_err'] = 'Please enter a contact number';
        //         }
        //         elseif (!ctype_digit($data['number']) || strlen($data['number']) < 9) {
        //             $data['number_err'] = 'Contact number requires at least 10 digits and must consist only of digits.';
        //         }
        
        //         // Validate password
        //         if(empty($data['password'])){
        //             $data['password_err'] = 'Please enter a password';
        //         }
        //         elseif(strlen($data['password']) < 6){
        //             $data['password_err'] = 'Password must be at least 6 characters';
        //         }
        //         else{
        //             if(empty($data['confirm_password'])){
        //                 $data['confirm_password_err'] = 'Please confirm the password';
        //             }
        
        //             if($data['password'] != $data['confirm_password']){
        //                 $data['confirm_password_err'] = 'Passwords do not match';
        //             }
        //         }
        
        //         // Check if the user has agreed to the terms
        //         if (!isset($_POST['agree'])) {
        //             $data['agree_err'] = 'You must agree to the terms and conditions.';
        //         }
        
        //         // Validation is completed and no error then register the user
        //         if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['agree_err'])){
        //             // Hash password
        //             $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        //             // Register user
        //             if($this->userModel->register($data)){
        //                 // Create a flash message
        //                 flash('reg_flash', 'You are successfully registered as a collector!');
        //                 redirect('Collectors/index');
        //             }
        //             else{
        //                 die('Something went wrong');
        //             }
        //         }
        //         else{
        //             // Load view
        //             $this->view('users/collectors/register', $data);
        //         }
        //     }
        //     else {
        //         // if(isset($_SESSION['userType'])) {
        //         //     die('User Type: ' . $_SESSION['userType']);
        //         // } else {
        //         //     die('User Type is not setb aaaa');
        //         // }
        //         // Initial form
        //         if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && $_SESSION['userType'] == 'pBuyer') {
        //             $data = [
        //                 'username' => '',
        //                 'email' => '',
        //                 'number' => '',
        //                 'password' => '',
        //                 'confirm_password' => '',
        //                 'username_err' => '',
        //                 'email_err' => '',
        //                 'number_err' => '',
        //                 'password_err' => '',
        //                 'confirm_password_err' => '',
        //                 'agree_err' => ''
        //             ];
        
        //             // Load collector registration view
        //             $this->view('users/collectors/register', $data);
        //         } else {
        //             // Guests or other user types should go to general user registration
        //             redirect('Users/register');
        //         }
        //     }
        // }
        

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