<?php
    class Collectors extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
            $this->collectorModel = $this->model('M_Collectors');
            $this->moderatorModel = $this->model('M_Moderators');
            $this->pagesModel = $this->model('M_Pages');
            $this->districtModel = $this->model('M_Districts'); // Add this line
            $this->recycleItemAdsModel = $this->model('M_Recycle_Item_Ads'); 
            $this->recycleCentersModel = $this->model('M_Recycle_Centers'); 
        }

  
        public function register(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                // Sanitize the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

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
                ];

                // Register collector
                if($this->collectorModel->register($data)){
                    // Create a flash message
                    flash('reg_flash', 'You are successfully registered as a collector!');

                    // Get the current user type
                    $userType = $_SESSION['userType'];
                    
                    // Only update the user type if they are not a moderator or an admin
                    if ($userType != 'moderator' && $userType != 'admin' && $userType != 'center') {
                        if ($this->userModel->updateUserType('collector')) {
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
                } else if($_SESSION['userType'] == 'collector') {
                    // If user is a collector, redirect to a different page (e.g., collector's dashboard)
                    redirect('Collectors/index');
                }
                else if(isset($_SESSION['user_id']) && isset($_SESSION['userType']) && ($_SESSION['userType'] != 'collector'|| $_SESSION['userType'] != null)) {
                    $districts = $this->districtModel->getDistricts();

                    $data = [
                        'user' => $user,
                        'districts' => $districts
                    ];

                    // Load collector registration view
                    $this->view('users/collectors/register', $data);
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
                ];

                // Update collector
                if($this->collectorModel->edit($data)){

                    // Update session data
                    $_SESSION['user_data'] = $data;

                    // Create a flash message
                    flash('edit_flash', 'Your details have been updated successfully!');

                    // Redirect to collector's dashboard
                    redirect('Collectors/index');
                }
                else{
                    echo json_encode(['status' => 'error', 'message' => 'Something went wrong']);
                }
            }
            else {
                $user = $this->userModel->getUserDetails($_SESSION['user_id']);
                $collector = $this->collectorModel->getUserDetails($_SESSION['user_id']);

                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
                    // If user is not logged in, redirect to login page
                    redirect('Users/login');
                } else if($_SESSION['userType'] == 'collector') {
                    $districts = $this->districtModel->getDistricts();

                    // Fetch the selected districts for the collector
                    $selected_districts = $this->collectorModel->getCollectorDistricts($_SESSION['user_id']);

                    $data = [
                        'collector' => $collector,
                        'user' => $user,
                        'districts' => $districts,
                        'selected_districts' => $selected_districts
                    ];

                    // Load collector edit view
                    $this->view('users/collectors/edit', $data);
                }
                else {
                    // Guests or other user types should go to general user registration
                    redirect('Users/register');
                }
            }
        }

        // public function edit($colId){
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         // form is submitting
        //         // Sanitize the data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //         // Input data
        //         $data = [
        //             'id' => $colId,
        //             'nic' => trim($_POST['nic']),
        //             'gender' => trim($_POST['gender']),
        //             'address' => trim($_POST['address']),
        //             'com_name' => trim($_POST['com_name']),
        //             'com_email' => trim($_POST['com_email']),
        //             'com_address' => trim($_POST['com_address']),
        //             'telephone' => trim($_POST['telephone']),
        //             'company_type' => trim($_POST['company_type']),
        //             'reg_number' => trim($_POST['reg_number']),
        //             'vehicle_type' => trim($_POST['vehicle_type']),
        //             'vehicle_reg' => trim($_POST['vehicle_reg']),
        //             'model' => trim($_POST['model']),
        //             'color' => trim($_POST['color']),
        //             'districts' => isset($_POST['districts']) ? array_map('trim', $_POST['districts']) : []
        //         ];

        //         // Update collector
        //         if($this->collectorModel->update($data)){
        //             // Create a flash message
        //             flash('reg_flash', 'Your details are successfully updated!');
        //             redirect('Collectors/index');
        //         }
        //         else{
        //             die('Something went wrong');
        //         }
        //     }
        //     else {
        //         $collector = $this->collectorModel->getCollectorById($colId);

        //         // Initial form
        //         $data = [
        //             'id' => $colId,
        //             'nic' => $collector->nic,
        //             'gender' => $collector->gender,
        //             'address' => $collector->address,
        //             'com_name' => $collector->com_name,
        //             'com_email' => $collector->com_email,
        //             'com_address' => $collector->com_address,
        //             'telephone' => $collector->telephone,
        //             'company_type' => $collector->company_type,
        //             'reg_number' => $collector->reg_number,
        //             'vehicle_type' => $collector->vehicle_type,
        //             'vehicle_reg' => $collector->vehicle_reg,
        //             'model' => $collector->model,
        //             'color' => $collector->color,
        //             'districts' => $this->collectorModel->getDistrictsByCollectorId($colId)
        //         ];

        //         // Load view
        //         $this->view('collectors/edit', $data);
        //     }
        // }

        public function index(){

            if(!isset($_SESSION['userType']) || ($_SESSION['userType'] != 'collector')){

                $this->view('pages/forbidden');
            }else{

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
            
            $ads = $this->recycleItemAdsModel->getAds();
            $ads2= $this->recycleCentersModel->getAds();
            $useremail = $_SESSION['user_email'];
            $userdetails = $this->moderatorModel->getuserdetails($useremail);
            $centerReqs = $this->recycleCentersModel->getCenterRequirements();
            $rec_ads = $this->recycleItemAdsModel->getAds();

            $data = [
                'ads' => $ads,
                'ads2' => $ads2,
                'userdetails'=> $userdetails,
                'center_reqs'=> $centerReqs,
                'rec_ads' => $rec_ads,
            ];
            $this->view('users/collectors/dashboard',$data);
             }
        }

        public function about(){
            $data = [];
            $this->view('users/collectors/about',$data);
        }

        public function saveReq($reqId){
            $collectorId = $_SESSION['user_id'];
            $result = $this->collectorModel->saveReq($collectorId,$reqId);

            if($result) {
                echo json_encode(["status" => "success", "message" => "Request saved successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to save request"]);
            }
        }

        public function unsaveReq($reqId){
            $collectorId = $_SESSION['user_id'];
            $result = $this->collectorModel->unsaveReq($collectorId,$reqId);

            if($result) {
                echo json_encode(["status" => "success", "message" => "Request saved successfully"]);
            } else {
                echo json_encode(["status" => "error", "message" => "Failed to save request"]);
            }
        }

        // public function dashboard(){
        //     $data = [];
        //     $this->view('users/collectors/dashboard',$data);
        // }  
    }
?>