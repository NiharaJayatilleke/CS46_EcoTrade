<?php

class M_Search {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Perform a basic search by item name
    public function searchItems($searchQuery, $category) {
        $query = 'SELECT * FROM V_ads WHERE 1';
    
        // Check if both category and search query are provided
        if (!empty($category) && !empty($searchQuery)) {
            $query .= ' AND item_category = :category AND item_name LIKE :search';
        } 
        // Check if only category is provided
        elseif (!empty($category)) {
            $query .= ' AND item_category = :category';
        } 
        // Check if only search query is provided
        elseif (!empty($searchQuery)) {
            $query .= ' AND item_name LIKE :search';
        }
    
        $this->db->query($query);
    
        // Bind parameters based on provided values
        if (!empty($category)) {
            $this->db->bind(':category', $category);
        }
    
        if (!empty($searchQuery)) {
            $this->db->bind(':search', "%{$searchQuery}%");
        }
    
        $ads = $this->db->resultSet();
    
        return $ads;
    }
    
    // Add other search methods as needed

}

?>
