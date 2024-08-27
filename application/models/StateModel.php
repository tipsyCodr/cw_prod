<?php
defined('BASEPATH') or exit('No direct script access allowed');


class StateModel extends CI_Model
{
    public function getAllState()
    {
        $this->db->select('*');
        $this->db->from('state');
        $this->db->order_by('state_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
