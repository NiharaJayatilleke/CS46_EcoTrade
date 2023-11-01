<?php
    class Item_Ads extends Controller{
        public function __construct(){
            $this->itemAdsModel =$this->model('M_Item_Ads');
        }

        public function index() {
            $ads = $this->itemAdsModel->getAds();
            
            $data = [
                'ads' => $ads,
            ];

            $this->view('item_ads/v_index', $data);
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
                    'selling_format' => trim($_POST['selling_format']),
                    'negotiable' => trim($_POST['negotiable']),

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'negotiable_err' => '',
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
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_price_err'])&&empty($data['item_location_err'])&&empty($data['selling_format_err'])&&empty($data['negotiable_err'])){
                 
                    //Add item ad to the database
                    if($this->itemAdsModel->create($data)){
                        // create a flash message
                        flash('post_msg', 'Your ad has been posted successfully!');
                        redirect('Item_Ads/index');
                    }else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view with errors
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
                    'selling_format' => '',
                    'negotiable' => '',

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'negotiable_err' => '',
                ];

                //load view
                $this->view('item_ads/v_create', $data);
            }
        }

        public function edit($adId){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                //form is submitting

                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    // 'ad_id' => $adId,
                    'p_id' => $adId,
                    'item_name' => trim($_POST['item_name']),
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_price' => trim($_POST['item_price']),
                    'item_location' => trim($_POST['item_location']),
                    'selling_format' => trim($_POST['selling_format']),
                    'negotiable' => trim($_POST['negotiable']),
                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'negotiable_err' => '',
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
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_price_err'])&&empty($data['item_location_err'])&&empty($data['selling_format_err'])&&empty($data['negotiable_err'])){
                 
                    //Add item ad to the database
                    if($this->itemAdsModel->edit($data)){
                        // create a flash message
                        flash('post_msg', 'Your ad has been updated successfully!');
                        redirect('Item_Ads/index');
                    }else{
                        die('Something went wrong');
                    }
                }
                else{
                    //load view with errors
                    $this->view('item_ads/v_edit', $data);
                }
            }
            else {
                $ad = $this->itemAdsModel->getAdById($adId);

                //check for owner as a security measure to prevent editing through url
                if($ad->seller_id != $_SESSION['user_id']){
                    redirect('Item_Ads/index');
                }


                // initial form
                $data = [
                    // 'ad_id' => $adId,
                    'p_id' => $adId,
                    'item_name' => $ad->item_name,
                    'item_category' => $ad->item_category,
                    'item_desc' => $ad->item_desc,
                    'item_price' => $ad->item_price,
                    'item_location' => $ad->item_location,
                    'selling_format' => $ad->selling_format,
                    'negotiable' => $ad->negotiable,

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'negotiable_err' => '',
                ];

                //load view
                $this->view('item_ads/v_edit', $data);
            }
        }

        public function delete($adId){
            $ad = $this->itemAdsModel->getAdById($adId);

            //check for owner to prevent deleting through url
            if($ad->seller_id != $_SESSION['user_id']){
                redirect('Item_Ads/index');
            }else{
                if($this->itemAdsModel->delete($adId)){
                    flash('post_msg', 'Your ad has been deleted successfully!');
                    redirect('Item_Ads/index');
                }
                else{
                    die('Something went wrong');
                }
            }
            
        }

    }
?>