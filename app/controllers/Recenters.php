<?php
   /* class Recenters extends Controller{
        public function __construct() {
            $this->recentersModel = $this->model('M_Recenters');

            $this->recycleItemAdsModel =$this->model('M_Recycle_Item_Ads');
            $this->usersModel = $this->model('M_Users');
        } 


    /*public function recenters(){
        // show("Recenters");
        
        if($_SERVER['REQUEST_METHOD'] =='POST'){
            //form is submitting
            //Validate the data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            // var_dump($_POST);

            //input data
            $data = [
                // 'item_name' => trim($_POST['item_name']),
                'item_category' => trim($_POST['item_category']),
                'item_desc' => trim($_POST['item_desc']),
                // 'item_img' => $_FILES['item_images'],
                // 'item_img_name' => time().'_'.$_FILES['item_images']['name'],
                'item_location' => trim($_POST['item_location']),
                'item_quantity' => trim($_POST['item_quantity']),

                // 'item_name_err' => '',
                'item_category_err' => '',
                // 'item_images_err' => '',
                'item_location_err' => '',
                'item_quantity_err' => '',

            ];

            //Validate each inputs
            //Validate item_name
            // if(empty($data['item_name'])){
            //     $data['item_name_err'] = 'Please enter a name for your item';
            // }

            //Validate item_category
            if(empty($data['item_category'])){
                $data['item_category_err'] = 'Please select a category for your item';
            } 

            //item image
            // if(empty($data['item_image']['size'] > 0)){
            //     if(uploadImage($data['item_img']['tmp_name'], $data['item_img_name'], '/img/items/')){
            //         echo 'Image uploaded';
            //     }else {
            //         $data['item_images_err'] = 'Image upload unsuccessful';
            //     }
            // }else{
            //     $data['item_image'] = null;
            // }

            //validate item_location
            if(empty($data['item_location'])){
                $data['item_location_err'] = 'Please enter the location of your item';
            }

            //Validation is completed and no error then add item ad to the database
            if(empty($data['item_category_err'])&&empty($data['item_location_err'])){
                //Add item ad to the database
                if($this->recentersModel->re_create1($data)){
                    // create a flash message
                    flash('post_msg', 'Your ad has been posted successfully!');
                    redirect('pages/home');
                }else{
                    die('Something went wrong');
                }

                //SET USER TYPE
                $userId = $_SESSION['user_id'];
                $userType = $this->usersModel->getUserTypeById($userId);
                $userType = $userType->user_type;

                if ($userType == 'pSeller') {
                    $this->usersModel->setUserTypeById($userId, 'seller');
                } else if ($userType != 'seller' && $userType != 'rSeller') {
                    $this->usersModel->setUserTypeById($userId, 'rSeller');
                }
            }
            else{
                //load view with errors
                $this->view('recenters/v_index', $data);
                show($data);
            }
        }
        else {
            // initial form
            $data = [
                // 'item_name' => '',
                'item_category' => '',
                'item_desc' => '',
                // 'item_img' => '',
                // 'item_img_name' => '',
                'item_location' => '',
                

                // 'item_name_err' => '',
                'item_category_err' => '',
                // 'item_images_err' => '',
                'item_location_err' => '',
                'item_quantity_err' => '',
            ];

            //load view
            $this->view('recenters/v_index',$data);
        }
    }    

}
?> */
