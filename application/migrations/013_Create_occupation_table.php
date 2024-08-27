<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_occupation_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'occupation_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'occupation' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('occupation_id', true);
        $this->dbforge->create_table('occupation', true, ['ENGINE' => 'MyISAM']);

        $occupations = [
            ['occupation' => 'accountant'],
            ['occupation' => 'actor'],
        ];
        $this->db->insert_batch('occupation', $occupations);
        
    }

    public function down()
    {
        $this->dbforge->drop_table('occupation', true);
    }
}
