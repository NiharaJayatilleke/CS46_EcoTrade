<?php
    class Admin extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('M_Admin');
            $this->moderatorModel = $this->model('M_Moderators');
            $this->userModel = $this->model('M_Users');
            $this->itemAdsModel = $this->model('M_Item_Ads');    
            $this->recycleItemAdsModel = $this->model('M_Recycle_Item_Ads');
        }
        
        public function index(){
            if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'admin'){
                // die('admin index, user type: ' . $_SESSION['userType']);
                $this->view('pages/forbidden');
            }
            else{

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
                
                $ads = $this->itemAdsModel->getAds();
                $numSecAds = count($ads);
                $rec_ads = $this->recycleItemAdsModel->getAds();
                $numRecAds = count($rec_ads);
                $adCountsByCategory = $this->moderatorModel->getItemAdCountsByCategory();
                $moderators = $this->moderatorModel->getModerators();
                $numModerators = count($moderators);
                $userCounts = $this->moderatorModel->getUserCounts();
                $users = $this->userModel->getUsers();
                $numUsers = count($users);
                $collectors = $this->userModel->getUsersByType('collector');
                $numCollectors = count($collectors);
                $centers = $this->userModel->getUsersByType('center');
                $numCenters = count($centers);
                $reportedAds = $this->moderatorModel->getReportedAds();
                $recentActivities = $this->moderatorModel->getRecentActivities();
                $useremail = $_SESSION['user_email'];
                $userdetails = $this->moderatorModel->getuserdetails($useremail);
          
                $data = [
                    'ads' => $ads,
                    'sec_ad_count' => $numSecAds,
                    'rec_ads' => $rec_ads,
                    'rec_ad_count' => $numRecAds,
                    'moderators_count' => $numModerators,
                    'adCountsByCategory' => $adCountsByCategory,
                    'moderators' => $moderators,
                    'userCounts' => $userCounts,
                    'users' => $users,
                    'users_count' => $numUsers,
                    'collectors_count' => $numCollectors,
                    'centers_count' => $numCenters,
                    'reportedAds' => $reportedAds,
                    'recentActivities' => $recentActivities,
                    'userdetails'=> $userdetails
                ];
                
                $this->view('admin/dashboard', $data);
            } 
        }

        public function ban($userId){
            $user = $this->userModel->getUserDetails($userId);

            if($this->userModel->changeUserStatus($userId, 0)){
                flash('post_msg', 'The user has been banned successfully!');
                redirect('Admin/users#users-content');
            }
            else{
                die('Something went wrong');
            }
        }

        public function unban($userId){
            $user = $this->userModel->getUserDetails($userId);

            if($this->userModel->changeUserStatus($userId, 1)){
                flash('post_msg', 'The user has been unbanned successfully!');
                redirect('Admin/users#users-content');
            }
            else{
                die('Something went wrong');
            }
        }

        // public function moderators(){
        //     if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'admin'){
        //         $this->view('pages/forbidden');
        //     }
        //     else{
        //         $ads = $this->itemAdsModel->getAds();
        //         $numSecAds = count($ads);
        //         $moderators = $this->moderatorModel->getModerators();
        //         $numModerators = count($moderators);
        //         $users = $this->userModel->getUsers();
        //         $numUsers = count($users);

        //         $data = [
        //             'sec_ad_count' => $numSecAds,
        //             'moderators_count' => $numModerators,
        //             'moderators' => $moderators,
        //             'users' => $users,
        //             'users_count' => $numUsers,
        //         ];
            
        //         //load view
        //         $this->view('admin/dashboard', $data);
        //     }
        // }


    //     public function login(){
    //         if($_SERVER['REQUEST_METHOD']=='POST'){
    //             //Form is submitting
    //             $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    //             $data =[
    //                 'email' =>trim($_POST['email']),
    //                 'password'=>trim($_POST['password']),

    //                 'email_err' =>'',
    //                 'password_err'=>''
    //             ];
    //             //validate the email
    //             if(empty($data['email'])){
    //                 $data['email_err']='Please enter the email';
    //             }
    //             else{
    //                 if($this->adminModel->findUserByEmail($data['email'])){
    //                     //User is found
    //                 }
    //                 else{
    //                     //User is not found
    //                     $data['email_err'] = 'User not found';
    //                 }
    //             }

    //             //Validate the password
    //             if(empty($data['password'])){
    //                 $data['password_err']='Please enter the password';
    //             }

    //             //If no error found the login the user
    //             if(empty($data['email_err'])&&empty($data['password_err'])){
    //                 //log the user
    //                 $loggedUser = $this->adminModel->login($data['email'],$data['password']);

    //                 if($loggedUser){
    //                     //User the authenticated
    //                     //create user sessions
    //                     $this->createUserSession($loggedUser);
    //                 }
    //                 else{
    //                     $data['password_err']='Password incorrect';

    //                     //Load view with errors
    //                     $this->view('admin/login', $data);
    //                 }
    //             }
    //             else{
    //                 //Load view with errors
    //                 $this->view('admin/login', $data);
    //             }

    //         }
    //         else{
    //             //initial form
    //             $data =[
    //                 'email' =>'',
    //                 'password'=>'',

    //                 'email_err' =>'',
    //                 'password_err'=>''
    //             ];

    //             //Load view
    //             $this->view('admin/login', $data);
    //         }
    //     }

    //     public function createUserSession($user){
    //         $_SESSION['user_id']=$user->id;
    //         $_SESSION['user_email']=$user->email;
    //         $_SESSION['user_name']=$user->username;
    //         $_SESSION['userType'] = $user->user_type;
    //         die($user->user_type);
    //         redirect('admin/index');
    //     }

    //     public function logout(){
    //         unset($_SESSION['user_id']);
    //         unset($_SESSION['user_email']);
    //         unset($_SESSION['user_name']);
    //         unset($_SESSION['userType']);
    //         session_destroy();

    //         // redirect('Pages/index');
    //         redirect('admin/login');
    //     }
        
    //     public function isLoggedIn(){
    //         if(isset($_SESSION['user_email'])){
    //             return true;
    //         }
    //         else{
    //             return false;
    //         }
    //     }
    }
?>

