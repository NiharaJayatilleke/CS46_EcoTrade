<?php
    class Admin extends Controller{
        public function __construct(){
            $this->adminModel = $this->model('M_Admin');
            $this->moderatorModel = $this->model('M_Moderators');
        }

        public function register($data): bool{
            // Prepare statement
            $this->db->query('INSERT INTO user (name, username, email, password, userType, contactNo) VALUES (:name, :username, :email, :password, :userType, :contactNo)');
    
            // Bind values
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);
            $this->db->bind(':userType', $data['user_type']);
            $this->db->bind(':contactNo', $data['contact_no']);
    
            // Execute
            if ($this->db->execute() and $this->userTableUpdate($data)){;
                return true;
            }
            else {
                return false;
            }
        }
        public function create_moderator(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                // form is submitting
                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'firstname' => trim($_POST['firstname']),
                    'lastname' => trim($_POST['lastname']),
                    'username' => trim($_POST['username']),
                    'email' => trim($_POST['email']),
                    'number' => trim($_POST['number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'firstname_err' => '',
                    'lastname_err' => '',
                    'username_err' => '',
                    'email_err' => '',
                    'number_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'agree_err' => ''

                ];

                //Validate each inputs
                //Validate firstname
                if(empty($data['firstname'])){
                    $data['firstname_err'] = 'Please enter a firstname';
                }
                
                //Validate secondname
                if(empty($data['lastname'])){
                    $data['lastname_err'] = 'Please enter a lastname';
                }

                //Validate username
                if(empty($data['username'])){
                    $data['username_err'] = 'Please enter a username';
                }

                //Validate email
                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter an email';
                }
                else{
                    //check email is already create_moderatored or not
                    if($this->moderatorModel->findUserByModerator($data['email'])){
                        $data['email_err'] = 'This email is already create_moderatored';
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

                // // Check if the user has agreed to the terms
                // if (!isset($_POST['agree'])) {
                //     $data['agree_err'] = 'You must agree to the terms and conditions.';
                //   }

                //Validation is completed and no error then create_moderator the user
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //create_moderator user
                    if($this->moderatorModel->create_moderator($data)){
                        // create a flash message
                        flash('reg_flash', 'You successfully created a moderator to the system!');
                        redirect('Moderators/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('admin/manage_moderators/v_create_moderator', $data);
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
                $this->view('admin/manage_moderators/v_create_moderator', $data);
            }
        }
        public function show_moderator(){
            $moderators->moderatorModel->getModerator();

            $data = [
                'moderators' => $moderators
            ];
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
                    if($this->adminModel->findAdminByEmail($data['email'])){
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
                    $loggedUser = $this->adminModel->login($data['email'],$data['password']);

                    if($loggedUser){
                        //Admin the authenticated
                        //create Admin sessions
                        // redirect('Pages/index');
                        $this->createAdminSession($loggedUser);
                    }
                    else{
                        $data['password_err']='Password incorrect';

                        //Load view with errors
                        $this->view('admin/v_login', $data);
                    }
                }
                else{
                    //Load view with errors
                    $this->view('admin/v_login', $data);
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
                $this->view('admin/v_login', $data);
            }
        }

        // public function forgot_password(){
        //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //         // Handle the password reset request
        //         // Validate and process the request, send reset instructions, and update the database as needed
        //         // Display a message to inform the user that reset instructions have been sent
        //         echo "Password reset instructions have been sent to your email address.";
        //     }
        //     else {
        //         // Display the password reset request form
        //         $data = [
        //             'email' => '',
        //             'email_err' => ''
        //         ];
        //         $this->view('moderator/v_forgot_password', $data);
        //     }
        // }

        public function createAdminSession($user){
            $_SESSION['admin_id']=$user->id;
            $_SESSION['admin_email']=$user->email;
            $_SESSION['admin_name']=$user->username;

            redirect('Pages/index');
        }

        public function logout(){
            unset($_SESSION['admin_id']);
            unset($_SESSION['admin_email']);
            unset($_SESSION['admin_name']);
            session_destroy();

            // redirect('Pages/index');
            redirect('Admin/login');
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['admin_id'])){
                return true;
            }
            else{
                return false;
            }
        }
    }
        // public function create_moderator_moderator(){
        //     if($_SERVER['REQUEST_METHOD'] =='POST'){
        //         // form is submitting
        //         //Validate the data
        //         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //         //input data
        //         $data = [
        //             'firstname' => trim($_POST['firstname']),
        //             'lastname' => trim($_POST['lastname']),
        //             'username' => trim($_POST['username']),
        //             'email' => trim($_POST['email']),
        //             'number' => trim($_POST['number']),
        //             'password' => trim($_POST['password']),
        //             'confirm_password' => trim($_POST['confirm_password']),

        //             'firstname_err' => '',
        //             'lastname_err' => '',
        //             'username_err' => '',
        //             'email_err' => '',
        //             'number_err' => '',
        //             'password_err' => '',
        //             'confirm_password_err' => '',
        //             'agree_err' => ''

        //         ];

        //         //Validate each inputs
        //         //Validate firstname
        //         if(empty($data['firstname'])){
        //             $data['firstname_err'] = 'Please enter a firstname';
        //         }
                
        //         //Validate secondname
        //         if(empty($data['lastname'])){
        //             $data['lastname_err'] = 'Please enter a lastname';
        //         }

        //         //Validate username
        //         if(empty($data['username'])){
        //             $data['username_err'] = 'Please enter a username';
        //         }

        //         //Validate email
        //         if(empty($data['email'])){
        //             $data['email_err'] = 'Please enter an email';
        //         }
        //         else{
        //             //check email is already create_moderatored or not
        //             if($this->adminModel->findUserByModerator($data['email'])){
        //                 $data['email_err'] = 'This email is already create_moderatored';
        //             }
        //         }   

        //         //Validate number
        //         if(empty($data['number'])) {
        //             $data['number_err'] = 'Please enter a contact number';
        //         }

        //         //validate password
        //         if(empty($data['password'])){
        //             $data['password_err'] = 'Please enter a password';
        //         }
        //         else if(strlen($data['password'])<6){
        //                 $data['password_err']='Password must be at least 6 characters';
        //             }
        //         else{
        //             if(empty($data['confirm_password'])){
        //                 $data['confirm_password_err']='Please confirm the password';
        //             }

        //             if($data['password']!=$data['confirm_password']){
        //                     $data['confirm_password_err']='Passwords do not match';
                        

        //             }
        //         }

        //         // Check if the user has agreed to the terms
        //         if (!isset($_POST['agree'])) {
        //             $data['agree_err'] = 'You must agree to the terms and conditions.';
        //           }

        //         //Validation is completed and no error then create_moderator the user
        //         if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


        //             //Hash password
        //             $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

        //             //create_moderator user
        //             if($this->adminModel->create_moderator_moderator($data)){
        //                 // create a flash message
        //                 flash('reg_flash', 'You successfully create_moderatored a moderator to the system!');
        //                 redirect('Users/login');
        //             }
        //             else{
        //                 die('Something went wrong');
        //             }
        //         }
        //         else{
        //             //load view
        //             $this->view('admin/manage_moderators/v_create_moderator_moderator', $data);
        //         }
        //     }
        //     else {
        //         // initial form
        //         $data = [
        //             'username' => '',
        //             'email' => '',
        //             'number' => '',
        //             'password' => '',
        //             'confirm_password' => '',

        //             'username_err' => '',
        //             'email_err' => '',
        //             'number_err' => '',
        //             'password_err' => '',
        //             'confirm_password_err' => '',
        //             'agree_err' => ''

        //         ];

        //         //load view
        //         $this->view('admin/manage_moderators/v_create_moderator_moderator', $data);
        //     }
        // }

        
        // public function terms(){
        //     $this->view('users/terms'); // Load the 'terms.php' view
        // }

        //PASSWPRD HAS TO BE SENT TO ADMIN 

        
?>
