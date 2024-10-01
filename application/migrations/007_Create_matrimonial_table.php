<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_matrimonial_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'matrimonial_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'for' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'hide_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'hide_contact' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'manglik' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'states' => [
                'type' => 'VARCHAR',
                'constraint' => 255
            ],
            'city' => [
                'type' => 'VARCHAR',
                'constraint' => 255
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
            'education' => [
                'type' => 'TEXT',
            ],
            'employee_in' => [
                'type' => 'TEXT',
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
                'type' => 'INT',
                'constraint' => 11,
                'default' => 1,
            ],
            'flag_admin' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
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
