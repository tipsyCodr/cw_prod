<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ComplexionModel extends CI_Model
{
    public function getAllComplexions()
    {
        $this->db->select('*');
        $this->db->from('complexion');
        $this->db->order_by('complexion_id', 'DESC');
        $query = $this->db->get();
        return $query->result(); // Use result_array() for CodeIgniter 3
    }
}
