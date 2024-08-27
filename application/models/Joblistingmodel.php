<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JobListingModel extends CI_Model
{

    public function job_listing($formArray)
    {

        $jobData = [
            'job_title' => $formArray['job_title'],
            'job_type' => $formArray['job_type'],
            'job_category' => $formArray['job_category'],
            'job_city' => $formArray['job_city'],
            'job_country' => $formArray['job_country'],
            'job_minimum_salary' => $formArray['job_minimum_salary'],
            'job_maximum_salary' => $formArray['job_maximum_salary'],
            'job_education_level' => $formArray['job_education_level'],
            'job_experience' => $formArray['job_experience'],
            'job_website' => $formArray['job_website'],
            'job_email' => $formArray['job_email'],
            'job_number' => $formArray['job_number'],
            'job_gender' => $formArray['job_gender'],
            'job_shift' => $formArray['job_shift'],
            'job_description' => $formArray['job_description'],
            'job_image' => $formArray['job_image'],
            // 'created_by' => $formArray['created_by'],
            // 'created_on' => time(),
            // 'updated_by' => $formArray['updated_by'],
            // 'updated_on' => time()
        ];
        // echo "<pre>";
        // print_r($fdata);
        $q = $this->db->insert('job_listing',$jobData);
        if($q){
            return true;
        }else{
            return false;
        }


    }

    public function getAllJobData(){
        $this->db->select('*');
        $this->db->from('job_listing');
        $this->db->order_by('job_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();

    }

}
