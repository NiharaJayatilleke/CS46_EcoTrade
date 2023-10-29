<?php
    class Pages extends Controller {
        public function __construct() {
            $this->pagesModel = $this->model('M_Pages'); 
        }

        public function index() {}

        // public function about($name, $age) {
        //     $data = [
        //         'userName' => $name,
        //         'userAge' => $age
        //     ];
        //     $this->view('v_about', $data);
        // }

        public function about() {
            $users = $this->pagesModel->getUsers();

            $data = [
                'users' => $users
            ];

            $this->view('v_about', $data);
        }
    }
?>