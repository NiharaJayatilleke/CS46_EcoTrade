<?php

class M_Forgot_password{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function storePasswordResetToken($email, $selector, $token, $expires) {
        $sql = "INSERT INTO forgot_password (pwdResetemail, pwdResetSelector, pwdresetToken, pwdResetExpires) VALUES (:email, :selector, :token, :expires)";
        $this->db->query($sql);
        $this->db->bind(':email', $email);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':token', $token);
        $this->db->bind(':expires', $expires);

        return $this->db->execute();
    }

    public function getPasswordResetToken($selector) {
        $sql = "SELECT * FROM forgot_password WHERE pwdResetSelector = :selector AND pwdResetExpires >= :current_time";
        $this->db->query($sql);
        $this->db->bind(':selector', $selector);
        $this->db->bind(':current_time', time());

        // return $this->db->single();
        return $this->db->single();
    }

  
}