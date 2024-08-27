<?php
defined('BASEPATH') or exit('No direct script access allowed');

class OccupationModel extends CI_Model
{

    public function getAllOccupation()
    {

        $this->db->select('*');
        $this->db->from('occupation');
        $this->db->order_by('occupation_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();

    }
}
?>