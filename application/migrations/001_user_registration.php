<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_user_registration extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(
            array(
                'uid' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'user_name' => array(
                    'type' => 'text',
                    'constraint' => '100',
                ),
                'user_mobile' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_password' => array(
                    'type' => 'TEXT',

                ),
                'user_token' => array(
                    'type' => 'TEXT',

                ),
                'user_verified_status' => array(
                    'type' => 'INT',
                    'default' => 0

                ),
                'user_email' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_address' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_state' => array(
                    'type' => 'INT',
                    'null' => TRUE,
                    'default' => 0
                ),
                'user_city' => array(
                    'type' => 'INT',
                    'null' => TRUE,
                    'default' => 0
                ),
                'user_pincode' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_profile_pic' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_created_on' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'user_updated_on' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'INT',
                    'default' => 1


                )
            )
        );
        $this->dbforge->add_key('uid', TRUE);
        $this->dbforge->create_table('user_registration');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_registration');
    }
}