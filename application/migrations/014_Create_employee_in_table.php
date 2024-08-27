<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_employee_in_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'employee_in_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'employee_in' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('employee_in_id', true);
        $this->dbforge->create_table('employee_in', true, ['ENGINE' => 'MyISAM']);

        $employee_ins = [
            ['employee_in' => 'Government'],
            ['employee_in' => 'Private'],
            ['employee_in' => 'Self-Employed'],
            ['employee_in' => 'Business'],
            ['employee_in' => 'Non-Profit Organization'],
            ['employee_in' => 'Freelancer'],
            ['employee_in' => 'Retired'],
            ['employee_in' => 'Unemployed'],
            ['employee_in' => 'Student'],
            ['employee_in' => 'Other'],
        ];
        $this->db->insert_batch('employee_in', $employee_ins);
        
    }

    public function down()
    {
        $this->dbforge->drop_table('employee_in', true);
    }
}
