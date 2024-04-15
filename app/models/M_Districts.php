<?php
class M_Districts {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getDistricts() {
        $this->db->query('SELECT * FROM Districts');
        return $this->db->resultSet();
    }
}