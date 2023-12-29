<?php

class M_Search {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    // Perform a basic search by item name
    public function searchItems($searchQuery, $category) {
        $query = 'SELECT * FROM v_ads WHERE 1';

        if (!empty($category)) {
            $query .= ' AND item_category = :category';
        }

        if (!empty($searchQuery)) {
            $query .= ' AND item_name LIKE :search';
        }

        $this->db->query($query);

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
