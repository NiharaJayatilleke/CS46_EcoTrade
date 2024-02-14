<?PHP
    class M_Wishlist{
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        public function isInWishlist($adId, $userId) {
            $this->db->query('SELECT * FROM Wishlist WHERE ad_id = :ad_id AND user_id = :user_id');
            $this->db->bind(':ad_id', $adId);
            $this->db->bind(':user_id', $userId);
            $this->db->execute();       
            return $this->db->rowCount() > 0;
        }
        
        public function removeItem($data) {
            $this->db->query('DELETE FROM Wishlist WHERE ad_id = :ad_id AND user_id = :user_id');
            $this->db->bind(':ad_id', $data['ad_id']);
            $this->db->bind(':user_id', $data['user_id']);
            $this->db->execute();
        }
        
        public function addItem($data) {
            $this->db->query('INSERT INTO Wishlist(ad_id, user_id) VALUES (:ad_id, :user_id)');
            $this->db->bind(':ad_id', $data['ad_id']);
            $this->db->bind(':user_id', $data['user_id']);
            return $this->db->execute();
        }
        
        public function getWishlistCount($userId) {
            $this->db->query('SELECT COUNT(*) AS count FROM Wishlist WHERE user_id = :user_id');
            $this->db->bind(':user_id', $userId);
            $this->db->execute();
            $row = $this->db->single();
            return $row->count;
        }

        public function getWishlistItems($userId) {
            $this->db->query('SELECT ia.* FROM Item_Ads ia INNER JOIN Wishlist w ON ia.p_id = w.ad_id WHERE w.user_id = :user_id');
            $this->db->bind(':user_id', $userId);
            return $this->db->resultSet();
        }

        
        // public function getOffersByAd($id){
        //     $this->db->query('SELECT * FROM Offers WHERE ad_id = :ad_id ORDER BY offer_amount DESC');
        //     $this->db->bind(':ad_id',$id);
        //     $results = $this->db->resultSet();
        //     return $results;
        // }
    }
?>