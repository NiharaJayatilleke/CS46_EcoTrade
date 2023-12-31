<?php
    class Pages extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
        }

        public function index(){
        if(isset($_SESSION['user_id'])) {
            $user = $this->pagesModel->getUserProfileImage($_SESSION['user_id']);
            $data = [
                'user' => $user,
            ];
            $this->view('pages/v_index',$data);
        } else {   
            $this->view('pages/v_index');
        }
        
        }
        public function about(){
            $users = $this->pagesModel->getUsers();
            $data = [
                'users' => $users
            ];
            $this->view('v_about',$data);
        }
    }
?>