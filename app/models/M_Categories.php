<?php
class M_Categories {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getCategories() {
        $this->db->query('SELECT * FROM Categories');
        return $this->db->resultSet();
    }
}
