<?php

class M_Search {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Perform a basic search by item name
    public function searchItems($searchQuery, $category) {
        $query = 'SELECT * FROM Items WHERE item_name LIKE :searchQuery';
        $bindings = [':searchQuery' => '%' . $searchQuery . '%'];
    
        if (!empty($category)) {
            $query .= ' AND item_category = :category';
            $bindings[':category'] = $category;
        }
    
        $this->db->query($query);
        $this->db->bindMultiple($bindings);
    
        $ads = $this->db->resultSet();
    
        return $ads;
    }
    

    // Add other search methods as needed

}

?>
