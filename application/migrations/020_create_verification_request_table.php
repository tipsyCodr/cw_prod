<?php

class Migration_Create_verification_request_table extends CI_Migration
{


    public function up()
    {
        if (!$this->db->table_exists('verification_requests')) {
            $this->dbforge->add_field(array(
                'id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'user_id' => array(
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => TRUE,
                    'null' => FALSE
                ),
                'aadhar_card' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE
                ),
                'selfie' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE
                ),
                'gotra' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE
                ),
                'status' => array(
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => FALSE,
                    'default' => 'pending'
                ),

                'created_on' => array(
                    'type' => 'TIMESTAMP',
                    'null' => FALSE,
                ),
                'updated_on' => array(
                    'type' => 'TIMESTAMP',
                    'null' => FALSE,
                ),
            ));
            $this->dbforge->add_key('id', TRUE);
            $this->dbforge->create_table('verification_requests');
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('verification_requests');
    }
}

