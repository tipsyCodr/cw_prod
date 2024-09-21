<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{


    public function create($name, $email, $password, $role)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT),
            'role' => $role
        );
        try {
            $this->db->insert('admin', $data);
            return true;
        } catch (Exception $e) {
            return false;
        }


    }
}
