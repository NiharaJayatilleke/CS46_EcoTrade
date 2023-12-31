<?php
    class Pages extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
        }

        public function index(){
            $user = $this->pagesModel->getUserProfileImage($_SESSION['user_id']);
            $data = [
                'user' => $user,
            ];
            $this->view('pages/v_index',$data);

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