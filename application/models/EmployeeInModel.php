<?php
defined('BASEPATH') or exit('No direct script access allowed');


class EmployeeInModel extends CI_Model
{
    public function getAllEmployeeIn()
    {
        $this->db->select('*');
        $this->db->from('employee_in');
        $this->db->order_by('employee_in_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
}
