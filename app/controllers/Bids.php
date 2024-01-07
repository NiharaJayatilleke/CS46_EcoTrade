<?php
    class Bids extends Controller{
        public function __construct(){
            $this->auctionsModel=$this->model('M_Bids'); 
        }

        public function getBidDetails($id){
            $bidDetails = $this->auctionsModel->getBiddingDetailsByAd($id);
            $highestBid = $this->auctionsModel->getHighestBidByAd($id); 
            $bids = $this->auctionsModel->getBidsByAd($id);
            $numBids = count($bids);

            $response = array(
                'highestBid' => $highestBid->bid_amount,
                'startingBid' => $bidDetails->starting_bid,
                'numBids' => $numBids
            );
        
            echo json_encode($response);
        }
    }
?>