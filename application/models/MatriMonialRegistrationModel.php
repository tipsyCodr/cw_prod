<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MatriMonialRegistrationModel extends CI_Model
{


    public function suspend_matrimonial_profile($id)
    {
        try {
            $this->db->where('matrimonial_id', $id);
            $this->db->set('flag_admin', 1);
            $this->db->update('matrimonial');
            return true;
        } catch (Exception $e) {
            log_message('error', 'Error suspending profile: ' . $e->getMessage());
            echo json_encode(['status' => false, 'error' => $e->getMessage()]);
            // return false;
        }
    }
    public function enable_matrimonial_profile($id)
    {
        try {
            $this->db->where('matrimonial_id', $id);
            $this->db->set('flag_admin', 0);
            $this->db->update('matrimonial');
            return true;
        } catch (Exception $e) {
            log_message('error', 'Error enabling profile: ' . $e->getMessage());
            return false;
        }
    }
    public function insert_matrimonial($formArray)
    {
        $matrimonialData = [
            // 'user_id' => $formArray['user_id'],
            'dob' => $formArray['dob'],
            'job_occupation' => $formArray['job_occupation'],
            'images' => $formArray['images'],
            'height' => $formArray['height'],
            'weight' => $formArray['weight'],
            'mother_tongue_id' => $formArray['mother_tongue'],
            'gotram' => $formArray['gotram'],
            'zodiac' => $formArray['zodiac'],
            'education_id' => $formArray['education'],
            'salary' => $formArray['salary'],
            'gender' => $formArray['gender'],
            'description' => $formArray['description'],
            // 'flag' => $formArray['flag'],
            // 'flag_admin' => $formArray['flag_admin'],
            // 'created_at' => NOW(),
        ];

        $q = $this->db->insert('matrimonial', $matrimonialData);
        if ($q) {
            return true;
        } else {
            return false;
        }
    }


    public function getMatrimonialDataById($id)
    {
        try {
            // Select necessary fields
            $this->db->select('matrimonial.*, 
                (YEAR(CURDATE()) - YEAR(DATE(dob))) -   
                (DATE_FORMAT(CURDATE(), "%m-%d") < DATE_FORMAT(DATE(dob), "%m-%d")) AS age,
                user_registration.*, state.*, city.*, mother_tongue.mother_tongue');

            // Define the main table and join related tables
            $this->db->from('matrimonial');
            $this->db->join('user_registration', 'matrimonial.user_id = user_registration.uid', 'left');
            $this->db->join('state', 'user_registration.user_state = state.state_id', 'left');
            $this->db->join('city', 'user_registration.user_city = city.city_id', 'left');
            $this->db->join('mother_tongue', 'matrimonial.mother_tongue = mother_tongue.mother_tongue_id', 'left');

            // Apply the filter
            $this->db->where('matrimonial.matrimonial_id', $id);

            // Execute the query
            $query = $this->db->get();

            // Return a single row if expecting one result
            return $query->row_array();
        } catch (Exception $e) {
            log_message('error', 'Error in getMatrimonialDataById: ' . $e->getMessage());
            throw $e;
        }
    }


    public function get_matches($gender, $from_age, $to_age, $limit = 10, $offset = 0)
    {
        $this->load->library('pagination');

        $this->db->select('matrimonial.*, 
        (YEAR(CURDATE()) - YEAR(DATE(dob))) -   
        (DATE_FORMAT(CURDATE(), "%m-%d") < DATE_FORMAT(DATE(dob), "%m-%d")) AS age,
        user_registration.*,mother_tongue,education.education', false);

        $this->db->from('matrimonial');
        $this->db->join('user_registration', 'matrimonial.user_id = user_registration.uid', 'left'); // Join user_registration table
        $this->db->join('mother_tongue', 'matrimonial.mother_tongue_id = mother_tongue.mother_tongue_id', 'left');
        $this->db->join('education', 'matrimonial.education_id = education.education_id', 'left');

        $this->db->where('matrimonial.gender', $gender);
        $this->db->having('age >=', $from_age);
        $this->db->having('age <=', $to_age);

        // Set limit and offset for pagination
        $this->db->limit($limit, $offset);

        $query = $this->db->get();
        return $query->result();
    }

    public function filter_members($criteria)
    {
        try {
            $this->db->select('matrimonial.*, 
                (YEAR(CURDATE()) - YEAR(DATE(dob))) -   
                (DATE_FORMAT(CURDATE(), "%m-%d") < DATE_FORMAT(DATE(dob), "%m-%d")) AS age,
                user_registration.*, state.*, city.*, mother_tongue.mother_tongue,education.education');

            $this->db->from('matrimonial');
            $this->db->join('user_registration', 'matrimonial.user_id = user_registration.uid', 'left');
            $this->db->join('state', 'user_registration.user_state = state.state_id', 'left');
            $this->db->join('city', 'user_registration.user_city = city.city_id', 'left');
            $this->db->join('mother_tongue', 'matrimonial.mother_tongue_id = mother_tongue.mother_tongue_id', 'left');
            $this->db->join('education', 'matrimonial.education_id = education.education_id', 'left');
            $this->db->join('employee_in', 'matrimonial.employee_in_id = employee_in.employee_in_id', 'left');

            if (!empty($criteria['gender'])) {
                $this->db->where('matrimonial.gender', $criteria['gender']); // Added table prefix for clarity
            }
            if (!empty($criteria['from_age']) && !empty($criteria['to_age'])) {
                $this->db->where('TIMESTAMPDIFF(YEAR, dob, CURDATE()) >=', $criteria['from_age']);
                $this->db->where('TIMESTAMPDIFF(YEAR, dob, CURDATE()) <=', $criteria['to_age']);
            }
            if (isset($criteria['from_height']) && isset($criteria['to_height'])) {
                $this->db->where('matrimonial.height >=', $criteria['from_height']); // Added table prefix for clarity
                $this->db->where('matrimonial.height <=', $criteria['to_height']); // Added table prefix for clarity
            }
            if (!empty($criteria['state_ids'])) {
                $this->db->where_in('user_registration.user_state', $criteria['state_ids']);
            }
            if (!empty($criteria['city_ids'])) {
                $this->db->where_in('user_registration.user_city', $criteria['city_ids']);
            }
            if (!empty($criteria['motherTongue_ids'])) {
                $this->db->where_in('matrimonial.mother_tongue_id', $criteria['motherTongue_ids']);
            }
            if (!empty($criteria['Education_ids'])) {
                $this->db->where_in('matrimonial.education_id', $criteria['Education_ids']);
            }
            if (!empty($criteria['EmployeeIn_ids'])) {
                $this->db->where_in('matrimonial.employee_in_id', $criteria['EmployeeIn_ids']);
            }
            // if ($criteria['photo_search']) {
            //     $this->db->where('matrimonial.images IS NOT NULL AND matrimonial.images !=', '');
            // }

            $query = $this->db->get();

            // Log the SQL query for debugging
            log_message('debug', 'SQL Query: ' . $this->db->last_query());

            return $query->result();
        } catch (Exception $e) {
            log_message('error', 'Error in filter_members: ' . $e->getMessage());
            throw $e;
        }
    }

    public function getAllMatrimonialData()
    {
        $this->db->select('*');
        $this->db->from('matrimonial');
        $this->db->order_by('matrimonial_id', 'DESC');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_matrimonial_profile_by_id($id)
    {
        $this->db->where('matrimonial_id', $id);
        $query = $this->db->get('matrimonial');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        }
        return false;
    }

    public function getGotraLists()
    {
        $this->db->select('*');
        $this->db->from('gotra');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function storeRequest($sender, $receiver)
    {
        // Insert new request
        try {
            $this->db->insert('requests', [
                'user_id' => $sender,
                'matrimonial_id' => $receiver,
                'status' => 'pending',
                'created_on' => date('Y-m-d H:i:s')
            ]);

            $response = ['success' => true, 'message' => 'Request sent successfully.'];
            echo json_encode($response);
            return true;

        } catch (Exception $e) {
            // Log error (optional)
            log_message('error', 'Error sending request: ' . $e->getMessage());

            $response = ['success' => false, 'message' => 'Error sending request.'];
            echo json_encode($response);
            return false;
        }
    }
    public function getPendingRequests($matrimonial_id)
    {
        $this->db->where('matrimonial_id', $matrimonial_id);
        $this->db->where('status', 'pending');
        $query = $this->db->get('requests');
        return $query->result_array();
    }
    public function getOldRequests($matrimonial_id)
    {
        $this->db->where('matrimonial_id', $matrimonial_id);
        $this->db->where('status !=', 'pending');
        $query = $this->db->get('requests');
        return $query->result_array();
    }
    public function acceptRequest($id)
    {
        if ($this->db->get_where('requests', ['request_id' => $id, 'status' => 'pending'])->row()) {
            try {
                $this->db->where('request_id', $id);
                $this->db->set('status', 'accepted');
                $this->db->update('requests');
                // return true;
                echo json_encode(['status' => true, 'message' => 'Request Accepted!']);
                exit;

            } catch (Exception $e) {
                echo json_encode(['status' => false, 'message' => 'Failed to make change']);
                exit;
            }
        }
        echo json_encode(['status' => false, 'message' => 'Something Went Wrong']);
        exit;

    }
    public function rejectRequest($id)
    {
        if ($this->db->get_where('requests', ['request_id' => $id, 'status' => 'pending'])->row()) {
            try {
                $this->db->where('request_id', $id);
                $this->db->set('status', 'rejected');
                $this->db->update('requests');
                // return true;
                echo json_encode(['status' => true, 'message' => 'Request Rejected!']);
                exit;

            } catch (Exception $e) {
                echo json_encode(['status' => false, 'message' => 'Failed to make change']);
                exit;

            }
        }
        echo json_encode(['status' => false, 'message' => 'Something Went Wrong']);
        exit;
    }
    public function getUsersProfiles($user_id)
    {
        $this->db->select('*');
        $this->db->where('user_id', $user_id);
        $this->db->from('matrimonial');
        $q = $this->db->get();
        return $q->result();

    }
}