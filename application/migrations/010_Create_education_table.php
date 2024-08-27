<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_education_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'education_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'education' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('education_id', true);
        $this->dbforge->create_table('education', true, ['ENGINE' => 'MyISAM']);

        $educations = [
            ['education' => 'High School'],
            ['education' => 'Intermediate'],
            ['education' => 'Diploma'],
            ['education' => "Bachelor's Degree"],
            ['education' => "Master's Degree"],
            ['education' => 'PhD'],
            ['education' => 'MBA'],
            ['education' => 'B.Tech'],
            ['education' => 'M.Tech'],
            ['education' => 'LLB'],
            ['education' => 'B.Sc.'],
            ['education' => 'M.Sc.'],
        ];
        $this->db->insert_batch('education', $educations);
        
    }

    public function down()
    {
        $this->dbforge->drop_table('education', true);
    }
}
