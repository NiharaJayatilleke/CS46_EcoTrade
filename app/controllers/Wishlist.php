<?php
    class Wishlist extends Controller{
        public function __construct(){
            $this->wishlistModel =$this->model('M_Wishlist');
           
            
        }

        public function index(){
            $data = [];
            $this->view('pages/v_wishlist',$data);

        }
        public function addToWishlist($id){

            if($_SERVER['REQUEST_METHOD']=='POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $data = [
                    'ad_id' => $id,
                    'user_id' => $_SESSION['user_id'],
                ];

                try {
                    if ($this->wishlistModel->addItem($data)) {
                        flash('wishlist_success','Item added successfully');

                    } else {
                        die('Something went wrong with adding the offer');
                    }

                } catch (Exception $e) {
                    die('Error: ' . $e->getMessage());
                }

            }
        }

        
    }
?>