<?php
    class ItemAds extends Controller{
        public function __construct(){
            $this->itemAdsModel =$this->model('M_Item_Ads');
            $this->offersModel =$this->model('M_Offers');
            $this->auctionsModel =$this->model('M_Bids');
        }

        public function index() {
            $ads = $this->itemAdsModel->getAds();
            
            $data = [
                'ads' => $ads,
            ];

            $this->view('item_ads/v_index', $data);
        }

        public function show($id) {
            $ad = $this->itemAdsModel->getAdById($id);
            $offers = $this->offersModel->getOffersByAd($id);
            $acceptedOffer = $this->offersModel->getAcceptedOfferByAd($id);
            
            $data = [
                'ad' => $ad,
                'offers' => $offers,
                'accepted_offer' => $acceptedOffer
            ];

            $this->view('item_ads/v_show', $data);
        }

        public function itemType(){
            $itemType = isset($_POST['item_type']) ? $_POST['item_type'] : '';
            $data = [];

            // Redirect based on the item type
            if ($itemType == 'secondhand') {
                $this->view('item_ads/v_create', $data);
            } else if ($itemType == 'recycle') {
                $this->view('recycle_ads/v_re_create', $data);
            } else {
                // Handle invalid item type
            }

            $this->view('item_ads/v_itemtype', $data);
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
                    'item_condition' => trim($_POST['item_condition']),
                    'item_img' => $_FILES['item_images'],
                    'item_img_name' => time().'_'.$_FILES['item_images']['name'],
                    'item_price' => trim($_POST['item_price']),
                    'item_location' => trim($_POST['item_location']),
                    'selling_format' => trim($_POST['selling_format']),
                    'duration' => trim($_POST['duration']),
                    'starting_bid' => trim($_POST['starting_bid']),
                    'negotiable' => trim($_POST['negotiable']),

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_condition_err' => '',
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

                //item image
                if(empty($data['item_image']['size'] > 0)){
                    if(uploadImage($data['item_img']['tmp_name'], $data['item_img_name'], '/img/items/')){
                        //echo 'Image uploaded';
                    }else {
                        $data['item_images_err'] = 'Image upload unsuccessful';
                    }
                }else{
                    $data['item_image'] = null;
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

                //Validation is completed and no error then add item ad to the database
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_condition_err'])&&empty($data['item_price_err'])&&empty($data['item_location_err'])&&empty($data['selling_format_err'])&&empty($data['negotiable_err'])&&empty($data['item_images_err'])){
                    // var_dump($data);
                    //Add item ad to the database
                    $ad_id = $this->itemAdsModel->create($data);
                    var_dump($data); var_dump($ad_id);

                    if($ad_id){
                        // create a flash message
                        flash('post_msg', 'Your ad has been posted successfully!');
                        $data['ad_id'] = $ad_id;
                        redirect('ItemAds/index');
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
                    'item_img' => '',
                    'item_img_name' => '',
                    'item_price' => '',
                    'item_location' => '',
                    'selling_format' => '',
                    'duration' => '',
                    'starting_bid' => '',
                    'negotiable' => '',

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_condition_err' => '',
                    'item_images_err' => '',
                    'item_price_err' => '',
                    'item_location_err' => '',
                    'selling_format_err' => '',
                    'duration_err' => '',
                    'starting_bid_err' => '',
                    'negotiable_err' => '',

                    // 'show_auction_fields' => true
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
                    'p_id' => $adId,
                    'item_name' => trim($_POST['item_name']),
                    'item_category' => trim($_POST['item_category']),
                    'item_desc' => trim($_POST['item_desc']),
                    'item_img' => $_FILES['item_images'],
                    'item_img_name' => time().'_'.$_FILES['item_images']['name'], /**/ 
                    'item_price' => trim($_POST['item_price']),
                    'item_location' => trim($_POST['item_location']),
                    'selling_format' => trim($_POST['selling_format']),
                    'negotiable' => trim($_POST['negotiable']),

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_images_err' => '',
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
                if(empty($data['item_name_err'])&&empty($data['item_category_err'])&&empty($data['item_price_err'])&&empty($data['item_location_err'])&&empty($data['selling_format_err'])&&empty($data['negotiable_err'])&&empty($data['item_images_err'])){

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
                    redirect('ItemAds/index');
                }


                // initial form
                $data = [
                    'p_id' => $adId,
                    'item_name' => $ad->item_name,
                    'item_category' => $ad->item_category,
                    'item_desc' => $ad->item_desc,
                    'item_img' => '',
                    'item_img_name' => $ad->item_image,
                    'item_price' => $ad->item_price,
                    'item_location' => $ad->item_location,
                    'selling_format' => $ad->selling_format,
                    'negotiable' => $ad->negotiable,

                    'item_name_err' => '',
                    'item_category_err' => '',
                    'item_images_err' => '',
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
                redirect('ItemAds/index');
            }else{
                $ad = $this->itemAdsModel->getAdById($adId);
                $oldImage = PUBROOT.'/img/items/'.$ad->item_image;
                deleteImage($oldImage);

                if($this->itemAdsModel->delete($adId)){
                    flash('post_msg', 'Your ad has been deleted successfully!');
                    redirect('ItemAds/index');
                }
                else{
                    die('Something went wrong');
                }
            }
            
        }
        
    }
?>