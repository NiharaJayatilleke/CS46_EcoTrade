<?php
    class Moderators extends Controller{
        public function __construct(){
            $this->moderatorModel = $this->model('M_Moderators');
        }

        public function register(){
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
                    //check email is already registered or not
                    if($this->moderatorModel->findModeratorByEmail($data['email'])){
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

                // Check if the Moderator has agreed to the terms
                if (!isset($_POST['agree'])) {
                    $data['agree_err'] = 'You must agree to the terms and conditions.';
                  }

                //Validation is completed and no error then Register the Moderator
                if(empty($data['username_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){


                    //Hash password
                    $data['password'] = password_hash($data['password'],PASSWORD_DEFAULT);

                    //Register Moderator
                    if($this->moderatorModel->register($data)){
                        // create a flash message
                        flash('reg_flash', 'You successfully registered a moderator to the system!');
                        redirect('Moderators/login');
                    }
                    else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view
                    $this->view('moderators/v_register', $data);
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
                $this->view('moderators/v_register', $data);
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
                    if($this->moderatorModel->findModeratorByEmail($data['email'])){
                        //Moderator is found
                    }
                    else{
                        //Moderator is not found
                        $data['email_err'] = 'User not found';
                    }
                }

                //Validate the password
                if(empty($data['password'])){
                    $data['password_err']='Please enter the password';
                }

                //If no error found the login the Moderator
                if(empty($data['email_err'])&&empty($data['password_err'])){
                    //log the Moderator
                    $loggedUser = $this->moderatorModel->login($data['email'],$data['password']);

                    if($loggedUser){
                        //User the authenticated
                        //create user sessions
                        $this->createModeratorSession($loggedUser);
                    }
                    else{
                        $data['password_err']='Password incorrect';

                        //Load view with errors
                        $this->view('moderators/v_login', $data);
                    }
                }
                else{
                    //Load view with errors
                    $this->view('moderators/v_login', $data);
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
                $this->view('moderators/v_login', $data);
            }
        }

        public function createModeratorSession($user){
            $_SESSION['moderator_id']=$user->id;
            $_SESSION['moderator_email']=$user->email;
            $_SESSION['moderator_name']=$user->username;

            redirect('Pages/index');
        }

        public function logout(){
            unset($_SESSION['moderator_id']);
            unset($_SESSION['moderator_email']);
            unset($_SESSION['moderator_name']);
            session_destroy();

            redirect('Moderators/login');
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['moderator_id'])){
                return true;
            }
            else{
                return false;
            }
        }

        public function terms(){
            $this->view('moderators/terms'); // Load the 'terms.php' view
        }
        

        
    }
?>
