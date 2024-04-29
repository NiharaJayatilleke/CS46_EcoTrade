<?php
    class RecycleItemAds extends Controller{
        public function __construct(){
            $this->recycleItemAdsModel =$this->model('M_Recycle_Item_Ads');
            $this->usersModel = $this->model('M_Users');
        }

        public function index() {
            $ads = $this->recycleItemAdsModel->getAds();
            
            $data = [
                'ads' => $ads,
            ];

            $this->view('pages/v_collectorhome', $data);
        }

        public function recycleItemAd(){
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                //form is submitting

                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                // var_dump($_POST);

                if (isset($_POST['item_expiry']) && is_numeric($_POST['item_expiry'])) {
                $expiryMonths = trim($_POST['item_expiry']);
                $expiryDate = new DateTime();
                $expiryDate->add(new DateInterval("P{$expiryMonths}M"));
                } else {
                    // Handle the error case here. For example, you could set $expiryDate to null:
                    $expiryDate = null;
                }

                //input data
                $data = [
                    'item_name' => trim($_POST['item_name']),
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_img' => $_FILES['item_images'],
                    // 'item_img_name' => time().'_'.$_FILES['item_images']['name'],

                    'item_img_name' => array_map(function($filename) {
                        return time().'_'.$filename;
                    }, $_FILES['item_images']['name']),

                    'item_location' => trim($_POST['item_location']),
                    'item_district' => trim($_POST['item_district']),
                    // 'item_expiry' => $expiryDate->format('Y-m-d H:i:s'),
                    'item_expiry' => $expiryDate ? $expiryDate->format('Y-m-d H:i:s') : null,

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_images_err' => '', 
                    'item_location_err' => '',
                    'item_district_err' => '',
                    'item_expiry_err' => '',

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

                //item image

                /*if(empty($data['item_image']['size'] > 0)){
                    if(uploadImage($data['item_img']['tmp_name'], $data['item_img_name'], '/img/items/')){
                        // echo 'Image uploaded';
                    }else {
                        $data['item_images_err'] = 'Image upload unsuccessful';
                    }
                }else{
                    $data['item_image'] = null;
                }*/
                
                if (empty($_FILES['item_images']['name'][0])) {
                    $data['item_images_err'] = 'Please upload at least one image.';
                } else {
                    if(isset($_FILES['item_images']) && count($_FILES['item_images']['size']) > 0){
                    for($i = 0; $i < count($_FILES['item_images']['name']); $i++) {
                        $new_name = time() . '_' . $_FILES['item_images']['name'][$i];
                        if(uploadImage($_FILES['item_images']['tmp_name'][$i], $new_name, '/img/items/')){
                            //echo 'Image uploaded';
                        }else {
                            $data['item_images_err'] = 'Image upload unsuccessful';
                        }
                    }
                    }else{
                        $data['item_image'] = null;
                    }
                }

                //validate item_location
                if(empty($data['item_location'])){
                    $data['item_location_err'] = 'Please enter the location of your item';
                }

                //validate item_district
                if(empty($data['item_district'])){
                    $data['item_district_err'] = 'Please select a district';
                }

                //validate expiry
                if(empty($data['item_expiry'])){
                    $data['item_expiry_err'] = 'Please select the duration';
                }

                //Validation is completed and no error then add item ad to the database
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_images_err'])&&empty($data['item_location_err'])&&empty($data['item_district_err'])&&empty($data['item_expiry_err'])){ //&&empty($data['item_images_err'])
                    //Add item ad to the database
                    if($this->recycleItemAdsModel->re_create($data)){
                        // create a flash message
                        flash('post_msg', 'Your ad has been posted successfully!');
                        $this->usersModel->logActivity($_SESSION['user_id'], 'RecycleAd Creation', 'Posted a new RecycleitemAd for sale.');
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
                    } else if ($userType == 'pBuyer') {
                        $this->usersModel->setUserTypeById($userId, 'rSeller');
                    }
                }
                else{
                    //load view with errors
                    $this->view('recycle_ads/v_re_create', $data);
                }
            }
            else {
                // initial form
                $data = [
                    'item_name' => '',
                    'item_category' => '',
                    'item_desc' => '',
                    'item_img' => '',
                    'item_img_name' => '',
                    'item_location' => '',
                    'item_district' => '',
                    'item_expiry' => '',

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_images_err' => '',
                    'item_location_err' => '',
                    'item_district_err' => '',
                    'item_expiry_err' => '',
                ];

                //load view
                $this->view('recycle_ads/v_re_create', $data);
            }
        }   
        
        public function recycleShow($adId){
            $ad = $this->recycleItemAdsModel->getAdById($adId);
            // $seller = $this->recycleItemAdsModel->getSellerByAdId($adId);
            
            $data = [
                'ad' => $ad,
                // 'seller' => $seller,
            ];

            $this->view('recycle_ads/v_re_show',$data);
        }

        public function edit(){

        }

        public function delete(){
            $ad = $this->RecycleItemAdsModel->getAdById($adId);
            $oldImage = PUBROOT.'/img/items/'.$ad->item_image;
            deleteImage($oldImage);

            if($this->RecycleItemAdsModel->delete($adId)){
                flash('post_msg', 'Your ad has been deleted successfully!');
                $this->usersModel->logActivity($_SESSION['user_id'], 'Ad deletion', 'Recycle Ad deleted ');
                redirect('ItemAds/index');
            }
            else{
                die('Something went wrong');
            }
        }

    }
?>