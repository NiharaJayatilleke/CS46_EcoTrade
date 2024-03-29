<?php
    class Collectors extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->collectorModel =$this->model('M_Collectors');
            $this->pagesModel =$this->model('M_Pages');

        }

        public function register(){
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
                    'make' => trim($_POST['make']),
                    'model' => trim($_POST['model']),
                    'insurance' => trim($_POST['insurance']),
                    'color' => trim($_POST['color']),
                    'district1' => trim($_POST['district1']),
                    'district2' => trim($_POST['district2']),
                    'district3' => trim($_POST['district3']),
                    'district4' => trim($_POST['district4']),
                    'district5' => trim($_POST['district5']),

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
                    'make_err' => '',
                    'model_err' => '',
                    'insurance_err' => '',
                    'color_err' => '',
                    'district1_err' => '',
                    'district2_err' => '',
                    'district3_err' => '',
                    'district4_err' => ''
                    // 'district5_err' => ''
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

                // // Validate gender
                // if (empty($data['gender'])){
                //     $data['gender_err'] = 'Please enter gender';
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
                

                // // Validate district5
                // if (empty($data['district1'])){
                //     $data['district1_err'] = 'Please enter the collection district';
                // } else {
                //     $data['district1_err'] = '';
                // }


                //Check if the user has agreed to the terms
                // if (!isset($_POST['agree'])) {
                //     $data['err'] = 'You must agree to the terms and conditions.';
                // }
        
                // Validation is completed and no error then register the user
                if(empty($data['nic_err']) && empty($data['gender_err']) && empty($data['address_err']) && empty($data['com_name_err']) && empty($data['com_email_err']) && empty($data['com_address_err']) && empty($data['telephone_err']) && empty($data['company_type_err']) && empty($data['reg_number_err']) && empty($data['vehicle_type_err']) && empty($data['vehicle_reg_err']) && empty($data['make_err']) && empty($data['model_err']) && empty($data['insurance_err']) && empty($data['color_err']) && empty($data['district1_err'])){
                    // Register collector
                    if($this->collectorModel->register($data)){
                        // Create a flash message
                        
                        flash('reg_flash', 'You are successfully registered as a collector!');
                        // Assuming $user is an instance of the class that contains the updateUserType method
                        if ($this->userModel->updateUserType('collector')) {
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

                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
                    // If user is not logged in, redirect to login page
                    redirect('Users/login');
                } else if($_SESSION['userType'] == 'collector') {
                    // If user is a collector, redirect to a different page (e.g., collector's dashboard)
                    redirect('Collectors/dashboard');
                }
                else if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && ($_SESSION['userType'] != 'collector'|| $_SESSION['userType'] != 'recenter' || $_SESSION['userType'] != null)) {
                    $data = [
                        'user' => $user,
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
                    'make' => '',
                    'model' => '',
                    'insurance' => '',
                    'color' => '',
                    'district1' => '',
                    'district2' => '',
                    'district3' => '',
                    'district4' => '',
                    'district5' => '',
                    
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
                    'make_err' => '',
                    'model_err' => '',
                    'insurance_err' => '',
                    'color_err' => '',
                    'district1_err' => '',
                    'district2_err' => '',
                    'district3_err' => '',
                    'district4_err' => '',
                    'district5_err' => ''
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