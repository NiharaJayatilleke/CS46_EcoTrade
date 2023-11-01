<?php
    class Moderators extends Controller{
        public function __construct(){
            $this->moderatorModel = $this->model('M_Users');
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
                    if($this->moderatorModel->findUserByEmail($data['email'])){
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
                    $loggedUser = $this->moderatorModel->login($data['email'],$data['password']);

                    if($loggedUser){
                        //User the authenticated
                        //create user sessions
                        $this->createUserSession($loggedUser);
                    }
                    else{
                        $data['password_err']='Password incorrect';

                        //Load view with errors
                        $this->view('users/v_moderator_login', $data);
                    }
                }
                else{
                    //Load view with errors
                    $this->view('users/v_moderator_login', $data);
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
                $this->view('users/v_moderator_login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id']=$user->id;
            $_SESSION['user_email']=$user->email;
            $_SESSION['user_name']=$user->username;

            redirect('Pages/index');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_email']);
            unset($_SESSION['user_name']);
            session_destroy();

            redirect('Users/v_moderator_login');
        }
        
        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            }
            else{
                return false;
            }
        }
    }
?>
