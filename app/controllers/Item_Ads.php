<?php
    class Item_Ads extends Controller{
        public function __construct(){
            $this->pagesModel =$this->model('M_Pages');
        }

        public function itemAd(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                //form is submitting

                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'item_name' => trim($_POST['item_name']),
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_price' => trim($_POST['item_price']),
                    'item_location' => trim($_POST['item_location']),

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                ];

                //Validate each inputs
                //Validate item_name
                if(empty($data['item_name'])){
                    $data['item_name_err'] = 'Please enter a name for your item';
                }

                //Validate item_category
                if(empty($data['item_category'])){
                    $data['item_category_err'] = 'Please select a category for your item';
                } 

                //Validate item_price
                if(empty($data['item_price'])) {
                    $data['item_price_err'] = 'Please enter the price of your item';
                }

                //validate item_location
                if(empty($data['item_location'])){
                    $data['item_location_err'] = 'Please enter the location of your item';
                }

                //validate selling_format
                if(empty($data['selling_format'])){
                    $data['selling_format_err'] = 'Please select an option';
                }

                //validate negotiable
                if(empty($data['negotiable'])){
                    $data['negotiable_err'] = 'Please select an option';
                }

                //Validation is completed and no error then add item ad to the database
                if(empty($data['item_name_err'])&&empty($data['email_err'])&&empty($data['password_err'])&&empty($data['confirm_password_err'])&&empty($data['agree_err'])){
                 
                //     //Add item ad to the database
                //     if($this->userModel->register($data)){
                //         // create a flash message
                //         flash('reg_flash', 'You are successfully registered!');
                //         redirect('Users/login');
                //     }
                //     else{
                //         die('Something went wrong');
                //     }
                }
                else{
                    //load view
                    $this->view('item_ads/v_create', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'item_name' => '',
                    'item_category' => '',
                    'item_desc' => '',
                    'item_price' => '',
                    'item_location' => '',

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                ];

                //load view
                $this->view('item_ads/v_create', $data);
            }
        }
    }
?>