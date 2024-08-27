<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BusinessListingModel extends CI_Model
{
    public function post_business($formArray)
    {
        $businessData = [
            'company_name' => $formArray['company_name'],
            'address_1' => $formArray['address_1'],
            'address_2' => $formArray['address_2'],
            'city' => $formArray['city'],
            'country' => $formArray['country'],
            'opening_time' => $formArray['opening_time'],
            'closing_time' => $formArray['closing_time'],
            'business_category' => $formArray['business_category'],
            'pin_code' => $formArray['pin_code'],
            'website' => $formArray['website'],
            'email_address' => $formArray['email_address'],
            'phone_number' => $formArray['phone_number'],
            'fax' => $formArray['fax'],
            'business_image' => $formArray['business_image'],
            // 'created_by' => $formArray['created_by'], // Assuming you are passing this value from the controller
            // 'created_on' => time(),
            // 'updated_by' => $formArray['updated_by'], // Assuming you are passing this value from the controller
            // 'updated_on' => time()
        ];

        $q = $this->db->insert('business_listing', $businessData);
        return $q ? true : false;
    }
    public function getAllBusinessData()
    {
        $this->db->select('*');
        $this->db->from('business_listing');
        $this->db->order_by('business_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
}
?>