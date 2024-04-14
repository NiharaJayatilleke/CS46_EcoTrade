<?php
    class Collectors extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->collectorModel = $this->model('M_Collectors');
            $this->pagesModel = $this->model('M_Pages');
            $this->districtModel = $this->model('M_Districts'); // Add this line
        }

        public function register(){
            // die('Collector registration');
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                // Input data
                $data = [
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
                    'model' => trim($_POST['model']),
                    'color' => trim($_POST['color']),
                    'districts' => isset($_POST['districts']) ? array_map('trim', $_POST['districts']) : [],
                    'other_vehicle' => trim($_POST['other_vehicle']),

                    'nic_err' => '',
                    'gender_err' => '',
                    'address_err' => '',
                    'com_name_err' => '',
                    'com_email_err' => '',
                    'com_address_err' => '',
                    'telephone_err' => '',
                    'company_type_err' => '',
                    'reg_number_err' => '',
                    'vehicle_type_err' => '',
                    'vehicle_reg_err' => '',
                    'model_err' => '',
                    'color_err' => '',
                    'districts_err' => '',
                    'other_vehicle_err' => ''
                    // 'agree' => trim($_POST['agree']),
                ];
                
                
                // // Validate NIC
                // if (empty($data['nic'])){
                //     $data['nic_err'] = 'Please enter NIC';
                // }
                // else if (strlen($data['nic']) == 10 and ($data['nic'][9] == 'V' or $data['nic'][9] == 'v')){
                //     $data['nic_err'] = '';
                // }
                // else if (strlen($data['NIC']) == 12 and ctype_digit($data['NIC'])){
                //     $data['nic_err'] = '';
                // }
                // else{
                //     $data['nic_err'] = 'Invalid NIC';
                // }

                // Validate gender
                // if (empty($data['gender'])){
                //     $data['gender_err'] = 'Please select a gender';
                // } else {
                //     $data['gender_err'] = '';
                // }

                // // Validate address
                // if (empty($data['address'])){
                //     $data['address_err'] = 'Please enter address';
                // } else {
                //     $data['address_err'] = '';
                // }

                // // Validate com_name
                // if (!empty($data['com_name'])){
                //     // If com_name is provided, validate com_email, com_address, telephone, company_type, reg_number
                //     if (empty($data['com_email'])){
                //         $data['com_email_err'] = 'Please enter company email';
                //     } else if (!filter_var($data['com_email'], FILTER_VALIDATE_EMAIL)) {
                //         $data['com_email_err'] = 'Invalid email format';
                //     } else {
                //         $data['com_email_err'] = '';
                //     }

                //     if (empty($data['com_address'])){
                //         $data['com_address_err'] = 'Please enter company address';
                //     } else {
                //         $data['com_address_err'] = '';
                //     }

                //     if (empty($data['telephone'])){
                //         $data['telephone_err'] = 'Please enter telephone';
                //     } else {
                //         $data['telephone_err'] = '';
                //     }

                //     if (empty($data['company_type'])){
                //         $data['company_type_err'] = 'Please enter company type';
                //     } else {
                //         $data['company_type_err'] = '';
                //     }

                //     if (empty($data['reg_number'])){
                //         $data['reg_number_err'] = 'Please enter registration number';
                //     } else {
                //         $data['reg_number_err'] = '';
                //     }
                // } else {
                //     // If com_name is not provided, clear com_email, com_address, telephone, company_type, reg_number errors
                //     $data['com_email_err'] = '';
                //     $data['com_address_err'] = '';
                //     $data['telephone_err'] = '';
                //     $data['company_type_err'] = '';
                //     $data['reg_number_err'] = '';
                //     $data['com_name_err'] = '';
                // }
                

                // if(empty($data['other_vehicle'])){
                //     $data['other_vehicle_err'] = 'Please enter your other vehicle';
                // }

                // //Validate districts
                // if (empty($data['districts'])){
                //     $data['districts_err'] = 'Please select at least one district.';
                // } else {
                //     $data['districts_err'] = '';
                // }

                //Check if the user has agreed to the terms
                // if (!isset($_POST['agree'])) {
                //     $data['err'] = 'You must agree to the terms and conditions.';
                // }
        
                // Validation is completed and no error then register the user
                if(empty($data['nic_err']) && empty($data['gender_err']) && empty($data['address_err']) && empty($data['com_name_err']) && empty($data['com_email_err']) && empty($data['com_address_err']) && empty($data['telephone_err']) && empty($data['company_type_err']) && empty($data['reg_number_err']) && empty($data['vehicle_type_err']) && empty($data['vehicle_reg_err']) && empty($data['model_err']) && empty($data['other_vehicle_err']) &&  empty($data['color_err']) && empty($data['districts_err'])){
                    // Register collector
                    if($this->collectorModel->register($data)){
                        // Create a flash message
                        flash('reg_flash', 'You are successfully registered as a collector!');

                        // Get the current user type
                        $userType = $_SESSION['userType'];
                        
                        // Only update the user type if they are not a moderator or an admin
                        if ($userType != 'moderator' && $userType != 'admin') {
                            if ($this->userModel->updateUserType('collector')) {
                                echo 'User type updated successfully';
                            } else {
                                echo 'Failed to update user type';
                            }
                        }
                        session_destroy();
                        // redirect('Users/login');
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

                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
                    // If user is not logged in, redirect to login page
                    redirect('Users/login');
                } else if($_SESSION['userType'] == 'collector') {
                    // If user is a collector, redirect to a different page (e.g., collector's dashboard)
                    redirect('Collectors/index');
                }
                else if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && ($_SESSION['userType'] != 'collector'|| $_SESSION['userType'] != 'recenter' || $_SESSION['userType'] != null)) {
                    $districts = $this->districtModel->getDistricts();

                    $data = [
                        'user' => $user,
                        'districts' => $districts
                    ];
        
                    // Load collector registration view
                    $this->view('users/collectors/register', $data);
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
                        'model' => '',
                        'districts' => '',
                        'color_err' => '',
                        'other_vehicle' => '',
                
                        'nic_err' => '',
                        'gender_err' => '',
                        'address_err' => '',
                        'com_name_err' => '',
                        'com_email_err' => '',
                        'com_address_err' => '',
                        'telephone_err' => '',
                        'company_type_err' => '',
                        'reg_number_err' => '',
                        'vehicle_type_err' => '',
                        'vehicle_reg_err' => '',
                        'model_err' => '',
                        'color_err' => '',
                        'districts_err' => '',
                        'other_vehicle_err' => ''
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