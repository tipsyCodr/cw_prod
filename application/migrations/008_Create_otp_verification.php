<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_otp_verification extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(
            array(
                'id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'user_id' => array(
                    'type' => 'INT',
                    'unsigned' => TRUE,
                    'null' => FALSE
                ),
                'otp_code' => array(
                    'type' => 'VARCHAR',
                    'constraint' => '6',
                    'null' => FALSE
                ),
                'expires_at' => array(
                    'type' => 'DATETIME',
                    'null' => FALSE
                ),
                'verified' => array(
                    'type' => 'TINYINT',
                    'default' => '0'
                ),
                'created_at' => array(
                    'type' => 'TIMESTAMP',
                    
                )
            )
        );

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('otp_verifications');
    }
    public function down()
    {
        $this->dbforge->drop_table('otp_verifications');
    }
}
