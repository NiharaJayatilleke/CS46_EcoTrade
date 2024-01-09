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

            // Get the remaining time
            $startTime = new DateTime($bidDetails->starting_time);
            $duration = $bidDetails->auction_duration;
            $remainingTimeString = $this->auctionsModel->calculateRemainingTime($startTime, $duration);

            /*
            //the end time
            $endTime = clone $startTime;
            $endTime->modify("+$duration days");

            //the current time
            $now = new DateTime();

            //the remaining time
            $remainingTime = $endTime->diff($now);

            //Formating the remaining time as a string
            $remainingTimeString = $remainingTime->format('%dd %hh %im %ss'); 
            */

            $response = array(
                'highestBid' => $highestBid->bid_amount,
                'startingBid' => $bidDetails->starting_bid,
                'numBids' => $numBids,
                'remainingTime' => $remainingTimeString
            );
        
            echo json_encode($response);
        }  

        public function addBid($adId){

            $bid_amount = $_POST['bidAmount'];
            $this->auctionsModel->addBid($adId, $bid_amount);
        }
    }
?>