<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserRegistrationModel extends CI_Model
{

    public function registeruser($formArray)
    {
        $this->load->helper('email_helper');
        $token = $this->generateUniqueToken();

        $fdata = [
            'user_name' => $formArray['user_name'],
            'user_mobile' => $formArray['user_mobile'],
            'user_password' => password_hash($formArray['user_mobile'], PASSWORD_DEFAULT),
            'user_token' => $token,
            'user_email' => $formArray['user_email'],
            'user_address' => $formArray['user_address'],
            'user_city' => $formArray['user_city'],
            'user_pincode' => $formArray['user_pincode'],
            'user_profile_pic' => $formArray['user_profile_pic'],
            'user_created_on' => time()


        ];
        // echo "<pre>";
        // print_r($fdata);
        $q = $this->db->insert('user_registration', $fdata);
        $inserted_id = $this->db->insert_id();

        if ($q) {


            $to = $formArray['user_email']; // Make sure you have the correct email field
            $subject = 'Please Verify Your Email Address';
            $from = 'anubhavnair023@gmail.com';
            $from_name = 'PathIdea Multiskill';

            $message = '
            <p>Dear ' . $formArray['user_name'] . ',</p>
            <p>Thank you for registering with PathIdea Multiskill!</p>
            <p>Your User ID is: ' . $formArray['user_id'] . '</p>
            <p>To complete your registration, please verify your email address by clicking the link below:</p>
            <p><a href="' . base_url() . 'email_verification_controller/verify_email?token=' . urlencode($token) . '&adfas=' . $inserted_id . '">Verify Your Email Address</a></p>
            <p>If you did not create an account with us, please ignore this email.</p>
            <p>Thank you!</p>
            <p>Best regards,</p>
            <p>PathIdea Multiskill Team</p>
        ';

            if (send_email($to, $subject, $message, $from, $from_name)) {


                return true;
            } else {
                return false;

            }

        } else {
            return false;
        }


    }
    public function generateUniqueToken()
    {
        $token = bin2hex(random_bytes(32));
        while ($this->db->where('user_token', $token)->get('user_registration')->num_rows() > 0) {
            $token = bin2hex(random_bytes(32));
        }
        return $token;
    }


    public function checkpassword($email, $password)
    {
        $q = $this->db->where(['user_email' => $email, 'user_verified_status' => 1])->get('user_registration');
        // print_r($q->result_array());
        if ($q->num_rows() > 0) {
            $user = $q->row();
            if (password_verify($password, $user->user_password)) {

                return $user;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }
    public function getSingleUser($id)
    {


        $this->db->where('uid', $id);
        $q = $this->db->get('user_registration');

        if ($q->num_rows() > 0) {
            return $q->row();
        } else {
            return false;
        }
    }
    // verify the token which is sent to user 
    public function isVerifiedToken($token, $id)
    {
        $udata = $this->getSingleUser($id);
        $uemail = $udata->user_email;
        $id = intval($id);

        $this->db->where('uid', $id);
        $this->db->where('user_token', $token);
        $this->db->where('user_email', $uemail);
        $this->db->where('user_verified_status', 0);
        $q = $this->db->get('user_registration');


        if ($q->num_rows() == 1) {

            $data = array('user_verified_status' => 1);
            $this->db->where('uid', $id);
            $this->db->update('user_registration', $data);
            return true;
        } else {
            return false;
        }

    }
    public function isRegistered($username)
    {


        $this->db->where('user_email', $username);
        $q = $this->db->get('user_registration');

        if ($q->num_rows() > 0) {
            return $q->result_array();
        } else {
            return false;
        }
    }

}
