<?php
defined('BASEPATH') or exit('No direct script access allowed');


class MotherTongueModel extends CI_Model
{
    public function getAllMotherTongues()
    {
        $this->db->select('*');
        $this->db->from('mother_tongue');
        $this->db->order_by('mother_tongue_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
