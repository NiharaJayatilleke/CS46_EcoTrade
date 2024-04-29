<?PHP
    class M_Item_Ads{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function getAds(){
            $this->db->query('SELECT * FROM v_ads WHERE status = "active"');
            $results = $this->db->resultSet();
            return $results;
        }

        public function getAdById($adId){
            $this->db->query('SELECT * FROM v_ads WHERE ad_id = :id');
            $this->db->bind(':id',$adId);
            $row = $this->db->single();
            return $row;
        }

        public function getAdsBySeller($sellerId){
            $this->db->query('SELECT * FROM Item_Ads WHERE seller_id = :seller_id');
            $this->db->bind(':seller_id',$sellerId);
            $results = $this->db->resultSet();
            return $results;
        }

        public function getSellerByAd($adId){
            $this->db->query('SELECT seller_id FROM v_ads WHERE ad_id = :id');
            $this->db->bind(':id',$adId);
            $row = $this->db->single();
            return $row;
        }

        public function create($data) {
            
            $this->db->query('INSERT INTO Item_Ads(seller_id,item_name,item_category,item_desc,item_condition,item_quantity,item_image,item_price,item_location,selling_format,negotiable, item_expiry, status) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_condition, :item_quantity, :item_image, :item_price, :item_location, :selling_format, :negotiable, :item_expiry, :status)'); 
            // $this->db->query('INSERT INTO Item_Ads(seller_id,item_name,item_category,item_desc,item_condition,item_quantity,item_price,item_location,selling_format,negotiable) VALUES(:seller_id, :item_name, :item_category, :item_desc, :item_condition, :item_quantity, :item_price, :item_location, :selling_format, :negotiable)'); 
            $this->db->bind(':seller_id',$_SESSION['user_id']);         
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_condition',$data['item_condition']);
            $this->db->bind(':item_quantity',$data['item_quantity']);
            $this->db->bind(':item_image',$data['item_img_name'][0]);
            $this->db->bind(':item_price',$data['item_price']);
            $this->db->bind(':item_location',$data['item_location']);
            $this->db->bind(':selling_format',$data['selling_format']);
            $this->db->bind(':negotiable',$data['negotiable']);
            $this->db->bind(':item_expiry',$data['item_expiry']);
            $this->db->bind(':status',"active");
            
            if($this->db->execute()){
                $item_id = $this->db->lastInsertId();

                for($i = 1; $i < count($data['item_img_name']); $i++) {
                    $this->db->query('INSERT INTO Secondhand_Ad_Images(item_id, image_name) VALUES(:item_id, :image_name)');
                    $this->db->bind(':item_id', $item_id);
                    $this->db->bind(':image_name', $data['item_img_name'][$i]);
                    // $this->db->execute();
                    if(!$this->db->execute()){
                        print_r($this->db->errorInfo());
                    }
                }
        
                return $item_id;
            }
            else{
                return false;
            }
        }

        public function edit($data) {        
            // $this->db->query('UPDATE Item_Ads SET item_name = :item_name, item_category = :item_category, item_desc = :item_desc, item_condition = :item_condition, item_quantity = :item_quantity, item_image = :item_image, item_price = :item_price, item_location = :item_location, selling_format = :selling_format, negotiable = :negotiable WHERE p_id = :p_id');
            
            $query = 'UPDATE Item_Ads SET item_name = :item_name, item_category = :item_category, item_desc = :item_desc, item_condition = :item_condition, item_quantity = :item_quantity, item_image = :item_image, item_price = :item_price, item_location = :item_location, selling_format = :selling_format, negotiable = :negotiable WHERE p_id = :p_id';
    
            // if (isset($data['duration'])) {
            //     $query .= ', duration = :duration';
            // }
        
            // if (isset($data['starting_bid'])) {
            //     $query .= ', starting_bid = :starting_bid';
            // }
        
            $this->db->query($query); //binding later to prevent sql injections

            $this->db->bind(':p_id',$data['p_id']);   
            $this->db->bind(':item_name',$data['item_name']);
            $this->db->bind(':item_category',$data['item_category']);
            $this->db->bind(':item_desc',$data['item_desc']);  
            $this->db->bind(':item_condition',$data['item_condition']);
            $this->db->bind(':item_quantity',$data['item_quantity']);
            $this->db->bind(':item_image',$data['item_img_name']); 
            // $this->db->bind(':item_image',$data['item_img_name'][0]); 
            $this->db->bind(':item_price',$data['item_price']);
            $this->db->bind(':item_location',$data['item_location']);
            $this->db->bind(':selling_format',$data['selling_format']);
            // $this->db->bind(':duration',$data['duration']);
            // $this->db->bind(':starting_bid',$data['starting_bid']);
            $this->db->bind(':negotiable',$data['negotiable']);

            // if (isset($data['duration'])) {
            //     $this->db->bind(':duration', $data['duration']);
            // }
        
            // if (isset($data['starting_bid'])) {
            //     $this->db->bind(':starting_bid', $data['starting_bid']);
            // }
    
            if($this->db->execute()){

                // $this->db->query('DELETE * FROM Secondhand_Ad_Images WHERE WHERE p_id = :p_id');
                // $this->db->bind(':p_id', $data['p_id']);

                // if($this->db->execute()){
                // for($i = 1; $i < count($data['item_img_name']); $i++) {
                //     $this->db->query('INSERT INTO Secondhand_Ad_Images(item_id, image_name) VALUES(:item_id, :image_name)');
                //     $this->db->bind(':item_id', $data['p_id']);
                //     $this->db->bind(':image_name', $data['item_img_name'][$i]);
                //     // $this->db->execute();
                //     if(!$this->db->execute()){
                //         print_r($this->db->errorInfo());
                //     }
                // }
                // }
        
                // return $item_id;
                // return true;
                
                $query = 'UPDATE Bidding_Details SET ';
                $bindings = [];

                if (isset($data['duration']) && isset($data['starting_bid'])) {
                    $query .= 'auction_duration = :auction_duration, starting_bid = :starting_bid, starting_time = NOW() ';
                    $bindings[':auction_duration'] = $data['duration'];
                    $bindings[':starting_bid'] = $data['starting_bid'];
                }
                
                if (!empty($bindings)) {
                $query .= ' WHERE adfir_id = :p_id';
                $bindings[':p_id'] = $data['p_id'];
                
                $this->db->query($query);
                
                foreach ($bindings as $key => $value) {
                    $this->db->bind($key, $value);
                }
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
                }
                
            }else{
                return false;
            }
        }

        public function delete($adId){
            $this->db->query('DELETE FROM Item_Ads WHERE p_id = :id');
            $this->db->bind(':id',$adId);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteExpiredAds(){
            $this->db->query('DELETE FROM Item_Ads WHERE item_expiry < NOW()');
            if(!$this->db->execute()){
                return false;
            }
            return true;
        }

        public function adFeature($data){
            $this->db->query('INSERT INTO Featured_Ads(p_id,package,duration) VALUES(:p_id, :package, :duration)');
            $this->db->bind(':p_id',$data['ad_id']);
            $this->db->bind(':package',$data['package']);
            $this->db->bind(':duration',$data['duration']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function addUnpaidFeatureAd($data){
            $this->db->query('INSERT INTO unpaidFeatureAds(p_id, package, duration) VALUES(:p_id, :package, :duration)');
            $this->db->bind(':p_id', $data['ad_id']);
            $this->db->bind(':package', $data['package']);
            $this->db->bind(':duration', $data['duration']);
    
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }




        // public function adFeature($data){
        //     $this->db->query('INSERT INTO Featured_Ads(p_id, package, duration, status) VALUES(:p_id, :package, :duration, :status)');
        //     $this->db->bind(':p_id', $data['ad_id']);
        //     $this->db->bind(':package', $data['package']);
        //     $this->db->bind(':duration', $data['duration']);
        //     $this->db->bind(':status', $data['status']); // Bind the status

        //     if($this->db->execute()){
        //         return true;
        //     }
        //     else{
        //         return false;
        //     }
        // }


        public function packageExists($adId){
            $this->db->query('SELECT * FROM Featured_Ads WHERE p_id = :id');
            $this->db->bind(':id',$adId);
            $results = $this->db->resultSet();
            return $results;
        }

        public function reportAd($data){
            
            $this->db->query('INSERT INTO Reported_Ads(ad_id, reporter_id, report_reason, report_comments, report_contact, report_status) VALUES(:ad_id, :reporter_id, :reason, :comments, :contact, :status)');
            $this->db->bind(':ad_id', $data['ad_id']);
            $this->db->bind(':reporter_id', $data['reporter_id']);
            $this->db->bind(':reason', $data['reason']);
            $this->db->bind(':comments', $data['comments']);
            $this->db->bind(':contact', $data['contact']);
            $this->db->bind(':status', $data['status']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function addSellerRating($data){

            $this->db->query('INSERT INTO Seller_Rating (ad_id, seller_id, rated_by_id, rating) VALUES (:ad_id, :seller_id, :rated_by_id, :rating)');

            $this->db->bind(':ad_id', $data['ad_id']);
            $this->db->bind(':seller_id', $data['seller_id']);
            $this->db->bind(':rated_by_id', $data['rated_by_id']);
            $this->db->bind(':rating', $data['rating']);

            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getUserRating($adId, $userId){
            $this->db->query('SELECT rating FROM Seller_Rating WHERE ad_id = :ad_id AND rated_by_id = :rated_by_id');
            $this->db->bind(':ad_id', $adId);
            $this->db->bind(':rated_by_id', $userId);
        
            $row = $this->db->single();
        
            if($this->db->rowCount() > 0){
                return $row->rating;
            } else {
                return null;
            }
        }

        public function updateSellerRating($data){
            $this->db->query('UPDATE Seller_Rating SET rating = :rating WHERE ad_id = :ad_id AND seller_id = :seller_id AND rated_by_id = :rated_by_id');
        
            $this->db->bind(':ad_id', $data['ad_id']);
            $this->db->bind(':seller_id', $data['seller_id']);
            $this->db->bind(':rated_by_id', $data['rated_by_id']);
            $this->db->bind(':rating', $data['rating']);
        
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }
        }

        public function getSellerRating($sellerId){
            $this->db->query('SELECT rating, COUNT(*) as count FROM Seller_Rating WHERE seller_id = :seller_id GROUP BY rating');
            $this->db->bind(':seller_id', $sellerId);
        
            $rows = $this->db->resultSet();
        
            $ratings = [];
            foreach ($rows as $row) {
                $ratings[$row->rating] = $row->count;
            }
            
            return $ratings;
        }
    }

?>