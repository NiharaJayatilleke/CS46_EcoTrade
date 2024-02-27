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
                    'user' => $user,
                    'nic' => trim($_POST['nic']),
                    'gender' => trim($_POST['gender']),
                    'address' => trim($_POST['address']),
                    'com_name' => trim($_POST['com_name']),
                    'com_email' => trim($_POST['com_email']),
                    'com_address' => trim($_POST['com_address']),
                    'telephone' => trim($_POST['telephone']),
                    'company_type' => trim($_POST['company_type']),
                    'reg_number' => trim($_POST['reg_number']),
                    'vehicle_type' => trim($_POST['vehicle_type']),
                    'vehicle_reg' => trim($_POST['vehicle_reg']),
                    'make' => trim($_POST['make']),
                    'model' => trim($_POST['model']),
                    'insurance' => trim($_POST['insurance']),
                    'color' => trim($_POST['color']),
                    'district1' => trim($_POST['district1']),
                    'district2' => trim($_POST['district2']),
                    'district3' => trim($_POST['district3']),
                    'district4' => trim($_POST['district4']),
                    'district5' => trim($_POST['district5']),
                    // 'agree' => trim($_POST['agree']),
                    'err' => ''
                ];
        
                // Check if the user has agreed to the terms
                // if (!isset($_POST['agree'])) {
                //     $data['err'] = 'You must agree to the terms and conditions.';
                // }
        
                // Validation is completed and no error then register the user
                if(empty($data['err'])){
                    // Register collector
                    if($this->collectorModel->register($data)){
                        die('Form submitted');
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
                    // Initial form data
                    $data = [
                    'nic' => '',
                    'gender' => '',
                    'address' => '',
                    'com_name' => '',
                    'com_email' => '',
                    'com_address' => '',
                    'telephone' => '',
                    'company_type' => '',
                    'reg_number' => '',
                    'vehicle_type' => '',
                    'vehicle_reg' => '',
                    'make' => '',
                    'model' => '',
                    'insurance' => '',
                    'color' => '',
                    'district1' => '',
                    'district2' => '',
                    'district3' => '',
                    'district4' => '',
                    'district5' => '',
                    // 'agree' => '',
                    'err' => ''
                    ];
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