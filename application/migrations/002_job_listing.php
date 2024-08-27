<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_job_listing extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(
            array(
                'job_id' => array(
                    'type' => 'INT',
                    'constraint' => 5,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                ),
                'job_title' => array(
                    'type' => 'text',
                    'constraint' => '100',
                ),
                'job_type' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_category' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_city' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_country' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_minimum_salary' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_maximum_salary' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_education_level' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_experience' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_website' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_email' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_number' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_gender' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_shift' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_description' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'job_image' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'created_on' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,  
                ),
                'created_by' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,    
                ),
                'updated_on' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'updated_by' => array(
                    'type' => 'TEXT',
                    'null' => TRUE,
                ),
                'status' => array(
                    'type' => 'INT',
                    'default'=>1
                    

                )
            )
        );
        $this->dbforge->add_key('job_id', TRUE);
        $this->dbforge->create_table('job_listing');
    }

    public function down()
    {
        $this->dbforge->drop_table('job_listing');
    }
}