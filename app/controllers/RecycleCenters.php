<?php
    class RecycleCenters extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->pagesModel =$this->model('M_Pages');
            $this->recentersModel = $this->model('M_Recenters'); 
            $this->categoryModel = $this->model('M_Categories'); 
            
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                die('Collector registration');
                // form is submitting
                // Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                // Input data
                
                $data = [
                    'com_tel' => trim($_POST['com_tel']),
                    'com_address' => trim($_POST['com_address']),
                    'com_email' => trim($_POST['com_email']),
                    'com_name' => trim($_POST['com_name']),
                    'reg_number' => trim($_POST['reg_number']),
                    'website' => trim($_POST['website']),
                    'company_type' => trim($_POST['company_type']),
                    'other-input' => isset($_POST['other-input']) ? trim($_POST['other-input']) : '',
                    'com_address' => trim($_POST['com_address']),
                    'owner_name' => trim($_POST['owner_name']),
                    'nic' => trim($_POST['nic']),
                    'owner_address' => trim($_POST['owner_address']),
                    'operation_days' => trim($_POST['operation_days']),
                    'categories' => isset($_POST['categories']) ? array_map('trim', $_POST['categories']) : [],

                    'com_tel_err' => '',
                    'com_address_err' => '',
                    'com_email_err' => '',
                    'com_name_err' => '',
                    'reg_number_err' => '',
                    'website_err' => '',
                    'company_type_err' => '',
                    'owner_name_err' => '',
                    'nic_err' => '',
                    'owner_address_err' => '',
                    'operation_days_err' => '',
                    'categories_err' => '',
                    'other-input_err' => ''
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

                // die('Registering collector');
                if(empty($data['nic_err']) && empty($data['gender_err']) && empty($data['address_err']) && empty($data['com_name_err']) && empty($data['com_email_err']) && empty($data['com_address_err']) && empty($data['telephone_err']) && empty($data['company_type_err']) && empty($data['reg_number_err']) && empty($data['vehicle_type_err']) && empty($data['vehicle_reg_err']) && empty($data['model_err']) && empty($data['other_vehicle_err']) &&  empty($data['color_err']) && empty($data['districts_err'])){
                    // Register collector
                    
                    if($this->recyclecenterModel->register($data)){
                        // Create a flash message
                        flash('reg_flash', 'You are successfully registered as a center!');

                        // Get the current user type
                        $userType = $_SESSION['userType'];
                        
                        // Only update the user type if they are not a moderator or an admin or collector
                        if ($userType != 'moderator' && $userType != 'admin' && $userType != 'collector') {
                            if ($this->userModel->updateUserType('center')) {
                                echo json_encode(['status' => 'success', 'message' => 'User type updated successfully']);
                            } else {
                                echo json_encode(['status' => 'error', 'message' => 'Failed to update user type']);
                            }
                        }
                        session_destroy();
                        // redirect('Users/login');
                    }
                    else{
                        // die('Something went wrong');
                        echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
                    }
                }
                else{
                    // Load view
                    $this->view('users/recyclecenters/register', $data);
                }
            }
            else {
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);

                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
                    // If user is not logged in, redirect to login page
                    redirect('Users/login');
                } else if($_SESSION['userType'] == 'center') {
                    // If user is a collector, redirect to a different page (e.g., collector's dashboard)
                    redirect('recyclecenters/index');
                }
                else if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && ($_SESSION['userType'] != 'center'|| $_SESSION['userType'] != null)) {
                    $recycle_categories = $this->categoryModel->getCategories();

                    $data = [
                        'user' => $user,
                        'categories' => $recycle_categories
                    ];
        
                    // Load collector registration view
                    $this->view('users/recyclecenters/register', $data);
                }
                else {
                    // Initial form data
                    $data = [
                        'com_tel' => '',
                        'com_address' => '',
                        'com_email' => '',
                        'com_name' => '',
                        'reg_number' => '',
                        'website' => '',
                        'company_type' => '',
                        'com_address' => '',
                        'owner_name' => '',
                        'nic' => '',
                        'owner_address' => '',
                        'operation_days' => '',
                        'categories' => [],
                        'other-input' => '',


                        'com_tel_err' => '',
                        'com_address_err' => '',
                        'com_email_err' => '',
                        'com_name_err' => '',
                        'reg_number_err' => '',
                        'website_err' => '',
                        'company_type_err' => '',
                        'owner_name_err' => '',
                        'nic_err' => '',
                        'owner_address_err' => '',
                        'operation_days_err' => '',
                        'categories_err' => '',
                        'other-input_err' => ''
                    ];
                    // Guests or other user types should go to general user registration
                    redirect('Users/register');
                }
            }
        }       
        
        
        public function index(){
            $data = [];
            $this->view('users/recyclecenters/dashboard',$data);
        }

        public function about(){
            $data = [];
            $this->view('users/recyclecenters/about',$data);
        }

        // public function dashboard(){
        //     $data = [];
        //     $this->view('users/recyclecenters/dashboard',$data);
        // }  
    }
?>