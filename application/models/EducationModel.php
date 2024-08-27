<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EducationModel extends CI_Model
{

    public function getAllEducation()
    {
        $this->db->select('*');
        $this->db->from('education');
        $this->db->order_by('education_id', 'DESC');
        $query = $this->db->get();
        return $query->result(); // Use result_array() for CodeIgniter 3
    }
}
