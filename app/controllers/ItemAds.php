<?php
    class ItemAds extends Controller{
        public function __construct(){
            $this->itemAdsModel =$this->model('M_Item_Ads');
            $this->offersModel =$this->model('M_Offers');
            $this->auctionsModel =$this->model('M_Bids');
            $this->usersModel =$this->model('M_Users');
            $this->notificationsModel =$this->model('M_Notifications');
        }

        public function index() {

            if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 'center' )){      
                $this->view('pages/forbidden');

            }else{

            $ads = $this->itemAdsModel->getAds();
            
            $data = [
                'ads' => $ads,
            ];
            // die(var_dump($data));

            $this->view('item_ads/v_index', $data);
            }
        }

        public function show($id) {

            if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 'center' )){      
                $this->view('pages/forbidden');

            }else if(isset($_SESSION['userType'])){    

            $ad = $this->itemAdsModel->getAdById($id);
            $offers = $this->offersModel->getOffersByAd($id);
            $acceptedOffer = $this->offersModel->getAcceptedOfferByAd($id);
            $bidDetails = $this->auctionsModel->getBiddingDetailsByAd($id);
            $bids = $this->auctionsModel->getBidsByAd($id);
            $numBids = count($bids);
            $seller = $this->usersModel->getUserDetails($ad->seller_id);
            $number = $seller->number;
            $buyerNotifications = $this->notificationsModel->getBuyerNotificationsByAd($_SESSION['user_id'], $id);

            if (isset($bidDetails->starting_time) && isset($bidDetails->auction_duration)) {
                $startTime = new DateTime($bidDetails->starting_time);
                $duration = $bidDetails->auction_duration;
                $remainingTimeString = $this->auctionsModel->calculateRemainingTime($startTime, $duration);
            }
            
            $ads = $this->itemAdsModel->getAds();
            $otherAds = array_filter($ads, function($ad) use ($id) {
                return $ad->id != $id;
            });
            
            $data = [
                'number' => $number,
                'remaining_time' => $remainingTimeString ?? null,
                'bid_details' => $bidDetails,
                'bids' => $bids,
                'bid_count' => $numBids,
                'ad' => $ad,
                'other_ads' => $otherAds,
                'offers' => $offers,
                'accepted_offer' => $acceptedOffer,
                'buyer_notifications' => $buyerNotifications,
                'user_id' => $_SESSION['user_id']
            ];

            $this->view('item_ads/v_show', $data);

            }else{
                redirect('users/login');
            }
        }

        public function getAdContent($id){
            
            error_log('getAddContent function called with adId: ' . $id);

            $ad = $this->itemAdsModel->getAdById($id);
            $offers = $this->offersModel->getOffersByAd($id);
            $acceptedOffer = $this->offersModel->getAcceptedOfferByAd($id);
            $bidDetails = $this->auctionsModel->getBiddingDetailsByAd($id);
            $bids = $this->auctionsModel->getBidsByAd($id);
            $numBids = count($bids);
            $sellerId = $ad->seller_id;
            $seller = $this->usersModel->getUserDetails($sellerId);
            $number = $seller->number;

            if (isset($bidDetails->starting_time) && isset($bidDetails->auction_duration)) {
                $startTime = new DateTime($bidDetails->starting_time);
                $duration = $bidDetails->auction_duration;
                $remainingTimeString = $this->auctionsModel->calculateRemainingTime($startTime, $duration);
            }

            $data = [
                'number' => $number,
                'remaining_time' => $remainingTimeString ?? null,
                'bid_details' => $bidDetails,
                'bids' => $bids,
                'bid_count' => $numBids,
                'ad' => $ad,
                'offers' => $offers,
                'accepted_offer' => $acceptedOffer,
                'user_id' => $_SESSION['user_id']
            ];

            echo json_encode($data);
        }

        public function itemType($itemType = ''){
            
            if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 'admin' || $_SESSION['userType'] == 'moderator' || $_SESSION['userType'] == 'center' )){      
                $this->view('pages/forbidden');

            }else if(isset($_SESSION['userType'])){    

            // $itemType = isset($_POST['item_type']) ? $_POST['item_type'] : '';
            
            $data = [
                'item_name' => '',
                'item_category' => '',
                'item_desc' => '',
                'item_condition' => '',
                'item_quantity' => '',
                'item_img' => '',
                'item_img_name' => '',
                'item_price' => '',
                'item_location' => '',
                'selling_format'=>'',
                'show_auction_fields' => '',
                'duration' => '',
                'starting_bid' => '',
                'negotiable' => '',

                'item_name_err' => '',
                'item_category_err' => '',
                'item_condition_err' => '',
                'item_quantity_err' => '',
                'item_images_err' => '',
                'item_price_err' => '',
                'item_location_err' => '',
                'selling_format_err' => '',
                'duration_err' => '',
                'starting_bid_err' => '',
                'negotiable_err' => '',
            ];

            // Redirect based on the item type
            if ($itemType == 'secondhand') {
                $this->view('item_ads/v_create', $data);
            } else if ($itemType == 'recycle') {
                $this->view('recycle_ads/v_re_create',$data);
            } else {
                // Handle invalid item type
                $this->view('item_ads/v_itemtype', $data);
            }

            // $this->view('item_ads/v_itemtype', $data);
            }else{
                redirect('users/login');
            }
        }

        public function itemAd(){

            if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 'admin' || $_SESSION['userType'] == 'moderator' || $_SESSION['userType'] == 'center' )){      
                $this->view('pages/forbidden');

            }else if(isset($_SESSION['userType'])){    

            if($_SERVER['REQUEST_METHOD'] =='POST'){
                //form is submitting

                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'item_name' => trim($_POST['item_name']),
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_condition' => trim($_POST['item_condition']),
                    'item_quantity' => trim($_POST['item_quantity']),
                    'item_img' => $_FILES['item_images'],

                    // 'item_img_name' => time().'_'.$_FILES['item_images']['name'],
                    'item_img_name' => array_map(function($filename) {
                        return time().'_'.$filename;
                    }, $_FILES['item_images']['name']),
                    
                    'item_price' => trim($_POST['item_price']),
                    'item_location' => trim($_POST['item_location']),
                    'selling_format' => trim($_POST['selling_format']),
                    'duration' => trim($_POST['duration']),
                    'starting_bid' => trim($_POST['starting_bid']),
                    'negotiable' => trim($_POST['negotiable']),
                    'item_expiry' => trim($_POST['item_expiry']),

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_condition_err' => '',
                    'item_quantity_err' => '',  
                    'item_images_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'duration_err' => '',
                    'starting_bid_err' => '',
                    'negotiable_err' => '',
                    'item_expiry_err' => '',
                ];

                // die(print_r($data['item_img_name']));

                //Validate each inputs
                //Validate item_name
                if(empty($data['item_name'])){
                    $data['item_name_err'] = 'Please enter a name for your item';
                }

                //Validate item_category
                if(empty($data['item_category'])){
                    $data['item_category_err'] = 'Please select a category for your item';
                } 

                if ($_POST['item_category'] === 'other') {
                    if (empty(trim($_POST['otherCategoryInput']))) {
                        $data['item_category_err'] = 'Please specify the category';
                    } else {
                        $data['item_category'] = trim($_POST['otherCategoryInput']);
                    }
                } else {
                    $data['item_category'] = $_POST['item_category'];
                }

                //Validate item_condition
                if(empty($data['item_condition'])){
                    $data['item_condition_err'] = 'Please select the condition of your item';
                }

                //Validate item_quantity
                if(empty($data['item_quantity'])){
                    $data['item_quantity_err'] = 'Please enter the quantity';
                }

                //item image
                // if(empty($data['item_image']['size'] > 0)){
                // if(isset($_FILES['item_images']) && $_FILES['item_images']['size'] > 0){
                //     if(uploadImage($data['item_img']['tmp_name'], $data['item_img_name'], '/img/items/')){
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

                //validate auction details
                if($data['selling_format'] == 'auction') {
                    if(empty($data['duration'])){
                        $data['duration_err'] = 'Please enter a duration for the auction';
                    }

                    if(empty($data['starting_bid'])){
                        $data['starting_bid_err'] = 'Please enter a starting amount for the auction';
                    }
                }

                $data['show_auction_fields'] = !empty($data['duration_err']) || !empty($data['starting_bid_err']);

                //validate negotiable
                if(empty($data['negotiable'])){
                    $data['negotiable_err'] = 'Please select an option';
                }

                //validate expiry
                if(empty($data['item_expiry'])){
                    $data['item_expiry_err'] = 'Please select the duration';
                }

                //Validation is completed and no error then add item ad to the database
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_condition_err'])&&empty($data['item_quantity_err'])&&empty($data['item_price_err'])&&empty($data['item_location_err'])&&empty($data['selling_format_err'])&&empty($data['negotiable_err'])&&empty($data['item_images_err'])&&empty($data['item_expiry_err'])){
                    // var_dump($data);
                    //Add item ad to the database
                    $ad_id = $this->itemAdsModel->create($data);
                    // var_dump($data); var_dump($ad_id);

                    if($ad_id){
                        // create a flash message
                        flash('post_msg', 'Your ad has been posted successfully!');
                        $data['ad_id'] = $ad_id;
                        redirect('ItemAds/index');
                        $this->usersModel->logActivity($_SESSION['user_id'], 'Preowned-Ad Creation', 'Posted a new preowned-itemAd for sale.');
                    }else{
                        die('Something went wrong');
                    }

                    // If the selling format is auction, add auction details to the database
                    if($data['selling_format'] == 'auction' && empty($data['duration_err']) && empty($data['starting_bid_err'])){
                        if($this->auctionsModel->addAuctionDetails($data)){
                            flash('auction_msg', 'Auction details have been added successfully!');
                        }else{
                            die('Something went wrong when adding auction details');
                        }
                    }

                    //SET USER TYPE
                    // $userId = $_SESSION['user_id'];
                    // $userType = $this->usersModel->getUserTypeById($userId);
                    // $userType = $userType->user_type;
                    $userId = $_SESSION['userType'];
                    
                    if ($userType == 'rSeller') {
                        $this->usersModel->setUserTypeById($userId, 'seller');
                        $_SESSION['userType']='seller';
                    } else if ($userType == 'pBuyer') {
                        $this->usersModel->setUserTypeById($userId, 'pSeller');
                        $_SESSION['userType']='pSeller';
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
                    'item_condition' => '',
                    'item_quantity' => '',
                    'item_img' => '',
                    'item_img_name' => '',
                    'item_price' => '',
                    'item_location' => '',
                    'selling_format' => '',
                    'duration' => '',
                    'starting_bid' => '',
                    'negotiable' => '',
                    'item_expiry' => '',

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_condition_err' => '',
                    'item_quantity_err' => '',
                    'item_images_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'duration_err' => '',
                    'starting_bid_err' => '',
                    'negotiable_err' => '',
                    'item_expiry_err' => '',

                    // 'show_auction_fields' => true
                ];

                //load view
                $this->view('item_ads/v_create', $data);
            }

            }else{
                redirect('users/login');
            }
        }

        public function edit($adId){

            $ad = $this->itemAdsModel->getAdById($adId);

            if(!isset($_SESSION['userType'])){
                redirect('users/login');
            
            }else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $ad->seller_id) {
        
            if($_SERVER['REQUEST_METHOD'] =='POST'){
                //form is submitting

                //Validate the data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                //input data
                $data = [
                    'p_id' => $adId,
                    'item_name' => trim($_POST['item_name']),
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_condition' => trim($_POST['item_condition']),
                    'item_quantity' => trim($_POST['item_quantity']),
                    'item_img' => $_FILES['item_images'],
                    'item_img_name' => time().'_'.$_FILES['item_images']['name'], /**/ 
                    'item_price' => trim($_POST['item_price']),
                    'item_location' => trim($_POST['item_location']),
                    'selling_format' => trim($_POST['selling_format']),
                    'duration' => trim($_POST['duration']),
                    'starting_bid' => trim($_POST['starting_bid']),
                    'negotiable' => trim($_POST['negotiable']),

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_condition_err' => '',
                    'item_quantity_err' => '',  
                    'item_images_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'duration_err' => '',
                    'starting_bid_err' => '',
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

                 //Validate item_condition
                if(empty($data['item_condition'])){
                    $data['item_condition_err'] = 'Please select the condition of your item';
                }

                //Validate item_quantity
                if(empty($data['item_quantity'])){
                    $data['item_quantity_err'] = 'Please enter the quantity';
                }

                //Validate item_image
                // if(uploadImage($data['item_img']['tmp_name'], $data['item_img_name'], '/img/items/')){
                //     //echo 'Image uploaded';
                // }else {
                //     $data['item_images_err'] = 'Image upload unsuccessful';
                // }
                $ad = $this->itemAdsModel->getAdById($adId);
                $oldImage = PUBROOT.'/img/items/'.$ad->item_image;

                if($_POST['intentionally_removed'] == 'removed'){
                    //Delete old image
                    deleteImage($oldImage);
                    $data['item_img_name'] = null;
                }else{
                    //No new image is uploaded
                    if($_FILES['item_images']['name'] == ''){
                        $data['item_img_name'] = $ad->item_image;
                    }else{
                        //New image is uploaded
                        updateImage($oldImage, $data['item_img']['tmp_name'], $data['item_img_name'], '/img/items/');
                    }
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
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_condition_err'])&&empty($data['item_quantity_err'])&&empty($data['item_price_err'])&&empty($data['item_location_err'])&&empty($data['selling_format_err'])&&empty($data['negotiable_err'])&&empty($data['item_images_err'])){

                    //Add item ad to the database
                    if($this->itemAdsModel->edit($data)){
                        // create a flash message
                        // flash('post_msg', 'Your ad has been updated successfully!');
                        redirect('ItemAds/index');
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
                    // redirect('ItemAds/index');
                    $this->view('pages/forbidden');
                }

                // die(var_dump($ad));

                // initial form
                $data = [
                    'p_id' => $adId,
                    'item_name' => $ad->item_name,
                    'item_category' => $ad->item_category,
                    'item_desc' => $ad->item_desc,
                    'item_condition' => $ad->item_condition,
                    'item_quantity' => $ad->item_quantity,
                    'item_img' => '',
                    'item_img_name' => $ad->item_image,
                    'item_price' => $ad->item_price,
                    'item_location' => $ad->item_location,
                    'selling_format' => $ad->selling_format,
                    'duration' => $ad->auction_duration,
                    'starting_bid' => $ad->starting_bid,
                    'negotiable' => $ad->negotiable,

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_condition_err' => '',
                    'item_quantity_err' => '',
                    'item_images_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'duration_err' => '',
                    'starting_bid_err' => '',
                    'negotiable_err' => '',
                ];

                //load view
                $this->view('item_ads/v_edit', $data);
            }
            }else{
                $this->view('pages/forbidden');
            }
        }

        public function promote($adId){

            $ad = $this->itemAdsModel->getAdById($adId);

            if(!isset($_SESSION['userType'])){
                redirect('users/login');
            
            }else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $ad->seller_id) {
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                $json = file_get_contents('php://input');
        
                $data = json_decode($json, true);

                $packageType = $data['packageType'];
                $timeInDays = $data['timeInDays'];
                $adId = $data['adId'];

                $packageData = [
                    'package' => $packageType,
                    'duration' => $timeInDays,
                    'ad_id' => $adId
                ];
        
                $this->itemAdsModel->adFeature($packageData);

                header('Content-Type: application/json');
                echo json_encode(['success' => true]);

            } else {
                    
            $ad = $this->itemAdsModel->getAdById($adId);
            
            $data = [
                'ad' => $ad,
            ];

            $this->view('item_ads/v_promote',$data);

            }
            }else{
                $this->view('pages/forbidden');
            }
        }

        public function packageExists($adId) {

            $ad = $this->itemAdsModel->getAdById($adId);

            if(!isset($_SESSION['userType'])){
                redirect('users/login');
            
            }else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $ad->seller_id) {

            error_log('packageExists function called with adId: ' . $adId);
            // die('packageExists');
            $packageDetails = $this->itemAdsModel->packageExists($adId);

            error_log(print_r($packageDetails, true));

            if ($packageDetails) {
                $pvDuration = null;
                $agDuration = null;

                foreach ($packageDetails as $packageDetail) {
                    if ($packageDetail->package === 'PV') {
                        $pvDuration = $packageDetail->duration * 86400;
                        $pvStartTime = strtotime($packageDetail->starting_time);
                        error_log('PV start time: ' . $pvStartTime);
                    } else if ($packageDetail->package === 'AG') {
                        $agDuration = $packageDetail->duration * 86400;
                        $agStartTime = strtotime($packageDetail->starting_time);
                    }
                }

                if ($pvDuration !== null) {
                    $pvElapsed = time() - $pvStartTime;
                    error_log('Time: ' . time());
                    error_log('PV elapsed: ' . $pvElapsed);
                    $pvRemaining = $pvDuration - $pvElapsed;
                    error_log('PV remaining: ' . $pvRemaining);

                    if ($pvRemaining < 0) {
                        $pvRemaining = 0;
                    }
                }

                if ($agDuration !== null) {
                    $agElapsed = time() - $agStartTime;
                    $agRemaining = $agDuration - $agElapsed;

                    if ($agRemaining < 0) {
                        $agRemaining = 0;
                    }
                }

                $data = array(
                    'PV' => $pvRemaining,
                    'AG' => $agRemaining
                );

                echo json_encode($data);
            } else {
                echo json_encode(array());
            }
            }else{
                $this->view('pages/forbidden');
            }
        }

        public function payment(){

            $ad = $this->itemAdsModel->getAdById($adId);

            if(!isset($_SESSION['userType'])){
                redirect('users/login');
            
            }else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $ad->seller_id) {
            
            $this->view('item_ads/v_paymentportal');
            
            }else{
                $this->view('pages/forbidden');
            }
        }

        public function report($adId){

            if(isset($_SESSION['userType']) && ($_SESSION['userType'] == 'admin' || $_SESSION['userType'] == 'moderator' || $_SESSION['userType'] == 'center' )){      
                $this->view('pages/forbidden');

            }else if(isset($_SESSION['userType'])){    

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                $reason = $_POST['reason'];
                $comments = $_POST['comments'];
                $contact = $_POST['contact'];

                $data = [
                    'ad_id' => $adId,
                    'reporter_id' => $_SESSION['user_id'],
                    'reason' => $reason,
                    'comments' => $comments,
                    'contact' => $contact,
                    'status' => 'Pending' // Assuming the initial status is 'Pending'
                ];
        
                //send to the database
                //die($reason.' '.$comments.' '.$contact);
                $this->itemAdsModel->reportAd($data);
                $this->userModel->logActivity($_SESSION['user_id'], 'Report ItemAd', 'Reported Ad for violation or suspicious Activity');
                echo 'Data received successfully.';
            } else {
                echo 'Invalid request method.';
            }
            }else{
                redirect('users/login');
            }
        }

        public function delete($adId){
            $ad = $this->itemAdsModel->getAdById($adId);

            if(!isset($_SESSION['userType'])){
                redirect('users/login');
            
            }else if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $ad->seller_id) {
            /*check for owner to prevent deleting through url
            if($ad->seller_id != $_SESSION['user_id']){
                redirect('ItemAds/index');
            }else{*/
                $ad = $this->itemAdsModel->getAdById($adId);
                $oldImage = PUBROOT.'/img/items/'.$ad->item_image;
                deleteImage($oldImage);

                if($this->itemAdsModel->delete($adId)){
                    flash('post_msg', 'Your ad has been deleted successfully!');
                    $this->userModel->logActivity($_SESSION['user_id'], 'ItemAd deletion', 'Removed preowned-itemAd from the platform');
                    redirect('ItemAds/index');
                }
                else{
                    die('Something went wrong');
                }
            }else{
                $this->view('pages/forbidden');
            }
            
        }

        public function addSellerRating($adId){
            error_log('addSellerRating function called with adId: ' . $adId);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $jsonData = json_decode(file_get_contents("php://input"), true);

                $sellerId = $this->itemAdsModel->getSellerByAd($adId);

                $data = [
                    'ad_id' => $adId,
                    'seller_id' => $sellerId->seller_id,
                    'rated_by_id' => $_SESSION['user_id'],
                    'rating' => $jsonData['rating']
                ];
        
                if($this->itemAdsModel->addSellerRating($data)){
                    echo json_encode(
                        array('message' => 'Rating Added')
                    );
                } else {
                    echo json_encode(
                        array('message' => 'Rating Not Added')
                    );
                }
            }

        }

        public function checkUserRating($adId){
            error_log('checkUserRating function called with adId: ' . $adId);

            $userId = $_SESSION['user_id'];

            $rating = $this->itemAdsModel->getUserRating($adId, $userId);

            if($rating){
                echo json_encode(
                    array('hasRated' => true, 'rating' => $rating)
                );
            } else {
                echo json_encode(
                    array('hasRated' => false)
                );
            }
        }

        public function updateSellerRating($adId){
            error_log('updateSellerRating function called with adId: ' . $adId);
        
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
                $jsonData = json_decode(file_get_contents("php://input"), true);
        
                $sellerId = $this->itemAdsModel->getSellerByAd($adId);
        
                $data = [
                    'ad_id' => $adId,
                    'seller_id' => $sellerId->seller_id,
                    'rated_by_id' => $_SESSION['user_id'],
                    'rating' => $jsonData['rating']
                ];
        
                if($this->itemAdsModel->updateSellerRating($data)){
                    echo json_encode(
                        array('message' => 'Rating Updated')
                    );
                } else {
                    echo json_encode(
                        array('message' => 'Rating Not Updated')
                    );
                }
            }
        }
    }
?>