<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_matrimonial_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'matrimonial_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'dob' => [
                'type' => 'DATETIME',
            ],
            'job_occupation' => [
                'type' => 'TEXT',
            ],
            'images' => [
                'type' => 'TEXT',
            ],
            'height' => [
                'type' => 'TEXT',
            ],
            'weight' => [
                'type' => 'TEXT',
            ],
            'mother_tongue_id' => [
                'type' => 'INT',
            ],
            'gotram' => [
                'type' => 'TEXT',
            ],
            'zodiac' => [
                'type' => 'TEXT',
            ],
            'education_id' => [
                'type' => 'INT',
            ],
            'employee_in_id' => [
                'type' => 'INT',
            ],
            'salary' => [
                'type' => 'TEXT',
            ],
            'gender' => [
                'type' => 'TEXT',
            ],
            'description' => [
                'type' => 'TEXT',
            ],
            'flag' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 1,
            ],
            'flag_admin' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type'    => 'DATETIME',
            ],
            'updated_at' => [
                'type' => 'DATETIME',
            ],
        ]);

        $this->dbforge->add_key('matrimonial_id', true);
        $this->dbforge->create_table('matrimonial');
    }

    public function down()
    {
        $this->dbforge->drop_table('matrimonial');
    }
}
