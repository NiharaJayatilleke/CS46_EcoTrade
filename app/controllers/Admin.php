<?php
    class Admin extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('M_Admin');
            $this->moderatorModel = $this->model('M_Moderators');
            $this->userModel = $this->model('M_Users');
            $this->itemAdsModel = $this->model('M_Item_Ads');    
        }
        
        public function index(){
            if(!isset($_SESSION['userType']) || $_SESSION['userType'] != 'admin'){
                // die('admin index, user type: ' . $_SESSION['userType']);
                $this->view('pages/forbidden');
            }
            else{
                $ads = $this->itemAdsModel->getAds();
                $numSecAds = count($ads);
                $adCountsByCategory = $this->moderatorModel->getItemAdCountsByCategory();
                $moderators = $this->moderatorModel->getModerators();
                $numModerators = count($moderators);
                $userCounts = $this->moderatorModel->getUserCounts();
                $users = $this->userModel->getUsers();
                $numUsers = count($users);
                $reportedAds = $this->moderatorModel->getReportedAds();
                $recentActivities = $this->moderatorModel->getRecentActivities();

                $data = [
                    'ads' => $ads,
                    'sec_ad_count' => $numSecAds,
                    'moderators_count' => $numModerators,
                    'adCountsByCategory' => $adCountsByCategory,
                    'moderators' => $moderators,
                    'userCounts' => $userCounts,
                    'users' => $users,
                    'users_count' => $numUsers,
                    'reportedAds' => $reportedAds,
                    'recentActivities' => $recentActivities,
                    
                ];

                $this->view('admin/dashboard', $data);
            } 
        }

        // public function dashboard(){
        //     $data = [];
        //     $this->view('admin/v_dashboard',$data);
        // }

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

