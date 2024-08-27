<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CityModel extends CI_Model
{

    public function getAllCities()
    {
        $this->db->select('*');
        $this->db->from('city');
        $this->db->order_by('city_id', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_cities_by_state_ids($state_ids)
    {
        $this->db->where_in('state_id', $state_ids);
        $query = $this->db->get('city');
        return $query->result();
    }
}
