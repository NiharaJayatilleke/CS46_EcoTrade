<?php
    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('M_Users');
        }

        public function register(){
            $data = [
                'title' => 'Register'
            ];
            $this->view('users/v_register', $data);
        }
        public function pBuyerRegister(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                        

                    }
                }

                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('users/v_pBuyerRegister', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'username' => '',
                    'email' => '',
                    'number' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('users/v_pBuyerRegister', $data);
            }
        }

        public function pSellerRegister(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => trim($_POST['user_type']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                        

                    }
                }

                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('users/v_pSellerRegister', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'username' => '',
                    'email' => '',
                    'number' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('users/v_pSellerRegister', $data);
            }
        }

        public function rSellerRegister(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => trim($_POST['user_type']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                        

                    }
                }

                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('users/v_rSellerRegister', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'username' => '',
                    'email' => '',
                    'number' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('users/v_rSellerRegister', $data);
            }
        }

        public function rCollectorRegister(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => trim($_POST['user_type']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                        

                    }
                }

                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('users/v_rCollectorRegister', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'username' => '',
                    'email' => '',
                    'number' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('users/v_rCollectorRegister', $data);
            }
        }
        public function rCenterRegister(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => trim($_POST['user_type']),

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already registered or not
                    if($this->userModel->findUserByEmail($data['email'])){
                        $data['email_err'] = 'This email is already registered';
                    }
                }   

                //Validate number
                if(empty($data['number'])) {
                    $data['number_err'] = 'Please enter a contact number';
                }

                //validate password
                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter a password';
                }
                else if(strlen($data['password'])<6){
                        $data['password_err']='Password must be at least 6 characters';
                    }
                else{
                    if(empty($data['confirm_password'])){
                        $data['confirm_password_err']='Please confirm the password';
                    }

                    if($data['password']!=$data['confirm_password']){
                            $data['confirm_password_err']='Passwords do not match';
                        

                    }
                }

                // Check if the user has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register user
                    if($this->userModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You are successfully registered!');
                        redirect('Users/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('users/v_rCenterRegister', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'username' => '',
                    'email' => '',
                    'number' => '',
                    'password' => '',
                    'confirm_password' => '',

                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //load view
                $this->view('users/v_rCenterRegister', $data);
            }
        }


        public function login(){
            if($_SERVER['REQUEST_METHOD']=='POST'){
                //Form is submitting
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data =[
                    'email' =>trim($_POST['email']),
                    'password'=>trim($_POST['password']),

                    'email_err' =>'',
                    'password_err'=>''
                ];
                //validate the email
                if(empty($data['email'])){
                    $data['email_err']='Please enter the email';
                }
                else{
                    if($this->userModel->findUserByEmail($data['email'])){
                        //User is found
                    }
                    else{
                        //User is not found
                        $data['email_err'] = 'User not found';
                    }
                }

                //Validate the password
                if(empty($data['password'])){
                    $data['password_err']='Please enter the password';
                }

                //If no error found the login the user
                if(empty($data['email_err'])&&empty($data['password_err'])){
                    //log the user
                    $loggedUser = $this->userModel->login($data['email'],$data['password']);

                    if($loggedUser){
                        //User the authenticated
                        //create user sessions
                        $this->createUserSession($loggedUser);
                    }
                    else{
                        $data['password_err']='Password incorrect';

                        //Load view with errors
                        $this->view('users/v_login', $data);
                    }
                }
                else{
                    //Load view with errors
                    $this->view('users/v_login', $data);
                }

            }
            else{
                //initial form
                $data =[
                    'email' =>'',
                    'password'=>'',

                    'email_err' =>'',
                    'password_err'=>''
                ];

                //Load view
                $this->view('users/v_login', $data);
            }
        }
        
        public function terms(){
            $this->view('users/terms'); // Load the 'terms.php' view
        }

        public function forgot_password(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Handle the password reset request
                // Validate and process the request, send reset instructions, and update the database as needed
                // Display a message to inform the user that reset instructions have been sent
                echo "Password reset instructions have been sent to your email address.";
            }
            else {
                // Display the password reset request form
                $data = [
                    'email' => '',
                    'email_err' => ''
                ];
                $this->view('users/forgot_password', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id']=$user->id;
            $_SESSION['user_email']=$user->email;
            $_SESSION['user_name']=$user->username;
            $_SESSION['user_number'] = $user->number;
            redirect('Pages/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            unset($_SESSION['user_number']);

            session_destroy();

            redirect('Users/login');
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }
            else{
                return false;
            }
        }

        public function create_profile(){
            // Check if the user is logged in
            if (!$this->isLoggedIn()) {
                // Redirect the user to the login page if they are not logged in
                redirect('Users/login');
            }
        
            $user = $this->userModel->getUserDetails($_SESSION['user_id']);
            $data = [
                'user' => $user
            ];
            // Load the profile view
            $this->view('users/profile/v_create', $data);
        }
        

        public function update_profile(){

              // Check if the user is logged in
              if (!$this->isLoggedIn()) {
                // Redirect the user to the login page if they are not logged in
                redirect('Users/login');
            }
             // Load the profile view
            $this->view('users/profile/v_update');
        }

//     Handle the form submission in your Users.php controller
//     public function update_profile() {
//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         // Get the updated data from the form
//         $newUsername = $_POST['newUsername'];
//         $newContactNumber = $_POST['newContactNumber'];

//         // Perform validation on the data (e.g., check for empty values, data format, etc.)

//         // Update the user's information in the database
//         $user = $this->userModel->getUserDetails($_SESSION['user_id']);
//         $user->username = $newUsername;
//         $user->number = $newContactNumber;

//         // Save the updated user data to the database (you may use a method like updateUserDetails in your model)
//         // Example: $this->userModel->updateUserDetails($user);

//         // Redirect back to the user's profile page
//         redirect('users/create_profile');
//     } else {
//         // Load the user profile page
//         $user = $this->userModel->getUserDetails($_SESSION['user_id']);
//         $data = [
//             'user' => $user
//         ];
//         $this->view('users/profile/v_create', $data);
//     }
// }


        
        public function delete_profile(){

            // Check if the user is logged in
            if (!$this->isLoggedIn()) {
              // Redirect the user to the login page if they are not logged in
              redirect('Users/login');
          }
           // Load the profile view
          $this->view('users/profile/v_delete');
      }

      
      public function security_profile(){

        // Check if the user is logged in
        if (!$this->isLoggedIn()) {
          // Redirect the user to the login page if they are not logged in
          redirect('Users/login'); }
       // Load the profile view
        $this->view('users/profile/v_security');
   }

  
  public function notifications_profile(){

    // Check if the user is logged in
    if (!$this->isLoggedIn()) {
      // Redirect the user to the login page if they are not logged in
      redirect('Users/login');
   }
    // Load the profile view
    $this->view('users/profile/v_notifications');
   }
        
    }
?>
