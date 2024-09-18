<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    public function requestExist($uid)
    {
        $this->db->select('*');
        $this->db->from('verification_requests');
        $this->db->where('user_id', $uid);
        $requests = $this->db->get()->num_rows();
        if ($requests > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function fetchAllUserVerifications()
    {
        $this->db->select('*');
        $this->db->from('verification_requests');
        $requests = $this->db->get()->result_array();
        return $requests;
    }
}