<?php
    class Wishlist extends Controller{
        public function __construct(){
            $this->wishlistModel =$this->model('M_Wishlist');
        }

        public function index(){
            $data = [];
            $this->view('pages/v_wishlist',$data);

        }

        public function addToWishlist() {

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $id = $_POST['ad_id'];
            
            $data = [
                'ad_id' => $id,
                'user_id' => $_SESSION['user_id'],
                    ];
                     
                // Check if the item is already in the wishlist
                $isInWishlist = $this->wishlistModel->isInWishlist($data['ad_id'], $data['user_id']);
                
                if ($isInWishlist) {
                    // Remove item from wishlist
                    $this->wishlistModel->removeItem($data);
                } else {
                    // Add item to wishlist
                    $this->wishlistModel->addItem($data);
                }
                // Return JSON response with updated count
                echo json_encode(['msg' => "successfully updated"]);
        }

        public function getWishlistCount() {
            if (isset($_SESSION['user_id'])) {
                $userId = $_SESSION['user_id'];
                $wishlistCount = $this->wishlistModel->getWishlistCount($userId);
                echo $wishlistCount;
            }else{
                echo 0;
            }
        }

        public function isInWishlist(){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $ad_id = $_POST['ad_id'];
            $user_id = $_SESSION['user_id'];
            $isInWishlist = $this->wishlistModel->isInWishlist($ad_id, $user_id);
            echo $isInWishlist;
        }
        
    }
?>