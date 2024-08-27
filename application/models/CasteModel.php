<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CasteModel extends CI_Model
{
    public function getAllCaste()
    {
        $this->db->select('*');
        $this->db->from('caste');
        $this->db->order_by('caste_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>
