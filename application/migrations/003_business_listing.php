<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_business_listing extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(
            array(
                'business_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'company_name' => array(
                    'type' => 'text',
                    'constraint' => '100',
                ),
                'address_1' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'address_2' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'city' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'country' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'opening_time' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'closing_time' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'business_category' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'pin_code' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'website' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'email_address' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'phone_number' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'fax' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'business_image' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'created_by' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'created_on' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'updated_by' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'updated_on' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'INT',
                    'default' => 1


                )
            )
        );
        $this->dbforge->add_key('business_id', TRUE);
        $this->dbforge->create_table('business_listing');
    }

    public function down()
    {
        $this->dbforge->drop_table('business_listing');
    }
}