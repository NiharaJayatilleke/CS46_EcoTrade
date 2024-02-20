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

        public function deleteBid($bidId){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $bidId = $_POST['bidId'];
                if ($this->auctionsModel->deleteBid($bidId)) {
                    http_response_code(200);
                    echo json_encode(['status' => 'success']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status' => 'error']);
                }
            } else {
                http_response_code(405);
                echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
            }
        }

        public function reopenBidding($adId){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $jsonString = file_get_contents('php://input');
                $jsonObject = json_decode($jsonString);
        
                $duration = $jsonObject->duration;
                $startingBid = $jsonObject->startingBid;

                if ($this->auctionsModel->updateBiddingDetails($adId, $duration, $startingBid)) {
                    http_response_code(200);
                    echo json_encode(['status' => 'success']);
                } else {
                    http_response_code(500);
                    echo json_encode(['status' => 'error']);
                }
            } else {
                http_response_code(405);
                echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
            }
        }
    }
?>