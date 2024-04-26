<?php
    class RecycleCenters extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->pagesModel =$this->model('M_Pages');
            $this->moderatorModel = $this->model('M_Moderators');
            $this->recycleCentersModel = $this->model('M_Recycle_Centers'); 
            $this->categoryModel = $this->model('M_Categories'); 
            $this->recycleItemAdsModel = $this->model('M_Recycle_Item_Ads'); 
            
        }

        public function register(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                // Sanitize the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Input data
                $data = [
                    'com_tel' => trim($_POST['com_tel']),
                    'com_address' => trim($_POST['com_address']),
                    'com_email' => trim($_POST['com_email']),
                    'com_name' => trim($_POST['com_name']),
                    'reg_number' => trim($_POST['reg_number']),
                    'website' => trim($_POST['website']),
                    'company_type' => trim($_POST['company_type']),
                    'com_address' => trim($_POST['com_address']),
                    'owner_name' => trim($_POST['owner_name']),
                    'nic' => trim($_POST['nic']),
                    'owner_address' => trim($_POST['owner_address']),
                    'operation_days' => trim($_POST['operation_days']),
                    'categories' => isset($_POST['categories']) ? array_map('trim', $_POST['categories']) : [],
                ];

                // Register collector
                if($this->recycleCentersModel->register($data)){
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
                    echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
                }
            }
            else {
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);

                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
                    // If user is not logged in, redirect to login page
                    redirect('Users/login');
                } else if($_SESSION['userType'] == 'center') {
                    // If user is a collector, redirect to a different page (e.g., collector's dashboard)
                    redirect('RecycleCenters/index');
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
                    // Guests or other user types should go to general user registration
                    redirect('Users/register');
                }
            }
        }      
        
        public function edit(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                // Sanitize the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Input data
                $data = [
                    'com_tel' => trim($_POST['com_tel']),
                    'com_address' => trim($_POST['com_address']),
                    'com_email' => trim($_POST['com_email']),
                    'com_name' => trim($_POST['com_name']),
                    'reg_number' => trim($_POST['reg_number']),
                    'website' => trim($_POST['website']),
                    'company_type' => trim($_POST['company_type']),
                    'com_address' => trim($_POST['com_address']),
                    'owner_name' => trim($_POST['owner_name']),
                    'nic' => trim($_POST['nic']),
                    'owner_address' => trim($_POST['owner_address']),
                    'operation_days' => trim($_POST['operation_days']),
                    'categories' => isset($_POST['categories']) ? array_map('trim', $_POST['categories']) : [],
                ];

                // Update recycle center
                if($this->recycleCentersModel->edit($data)){

                    // Update session data
                    $_SESSION['user_data'] = $data;

                    // Create a flash message
                    flash('edit_flash', 'Your details have been updated successfully!');

                    // redirect to the recycle center's dashboard
                    redirect('RecycleCenters/index');
                }
                else{
                    echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
                }
            }
            else {
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);

                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
                    // If user is not logged in, redirect to login page
                    redirect('Users/login');
                } else if($_SESSION['userType'] == 'center') {
                    $recycle_categories = $this->categoryModel->getCategories();

                    $data = [
                        'user' => $user,
                        'categories' => $recycle_categories
                    ];

                    // Load collector edit view
                    $this->view('users/recyclecenters/edit', $data);
                }
                else {
                    // Guests or other user types should go to general user registration
                    redirect('Users/register');
                }
            }
        }

        public function index(){

            if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'center'){
                // die('admin index, user type: ' . $_SESSION['userType']);
                $this->view('pages/forbidden');
            } else{

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    if (isset($_POST['delete_photo']) && $_POST['delete_photo'] == 1) {
                        $userId = $_SESSION['user_id'];
                        $this->moderatorModel->deleteProfileImage($userId);
        
                        // Redirect to the current page after deleting the image
                        header('Location: ' . $_SERVER['HTTP_REFERER']);
                        exit;
                    }
                else{
                
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
                            $this->moderatorModel->updateProfileImage($_SESSION['user_id'], $filename);  
                            $_SESSION['user_image']=$filename;
                            
                        } 
                      }
                     }
                    }
                }

            $useremail = $_SESSION['user_email'];
            $userdetails = $this->moderatorModel->getuserdetails($useremail);
          
            $data = [
                'userdetails'=> $userdetails
            ];
            $this->view('users/recyclecenters/dashboard',$data);
            }
        }

        public function about(){
            $data = [];
            $this->view('users/recyclecenters/about',$data);
        }

        public function addRequirement(){ //recenters
            
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                //input data
                $data = [
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_location' => trim($_POST['item_location']),
                    'item_quantity' => trim($_POST['item_quantity']),

                    'item_category_err' => '',
                    'item_location_err' => '',
                    'item_quantity_err' => '',
                ];
    
                //Validate item_category
                if(empty($data['item_category'])){
                    $data['item_category_err'] = 'Please select a category for your item';
                } 
    
                //validate item_location
                if(empty($data['item_location'])){
                    $data['item_location_err'] = 'Please enter the location of your item';
                }
    
                //Validation is completed and no error then add item ad to the database
                if(empty($data['item_category_err'])&&empty($data['item_location_err'])){
                    //Add item ad to the database
                    if($this->recycleCentersModel->re_create1($data)){
                        // create a flash message
                        flash('post_msg', 'Your ad has been posted successfully!');
                        redirect('pages/home');
                    }else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view with errors
                    $this->view('recenters/v_index', $data);
                    show($data);
                }
            }
            else {
                // initial form
                $data = [
                    'item_category' => '',
                    'item_desc' => '',
                    'item_location' => '',
                    
                    'item_category_err' => '',
                    'item_location_err' => '',
                    'item_quantity_err' => '',
                ];
    
                //load view
                $this->view('recenters/v_index',$data);
            }
        } 

        // public function dashboard(){
        //     $data = [];
        //     $this->view('users/recyclecenters/dashboard',$data);
        // }  
    }
?>