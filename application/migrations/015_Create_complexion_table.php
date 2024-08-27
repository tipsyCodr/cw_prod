<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_complexion_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'complexion_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'complexion' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('complexion_id', true);
        $this->dbforge->create_table('complexion', true, ['ENGINE' => 'MyISAM']);

        $complexions = [
            ['complexion' => 'Fair'],
            ['complexion' => 'Wheatish'],
            ['complexion' => 'Dusky'],
            ['complexion' => 'Dark'],
            ['complexion' => 'Very Fair'],
            ['complexion' => 'Olive'],
            ['complexion' => 'Medium'],
            ['complexion' => 'Light Brown'],
            ['complexion' => 'Tan'],
            ['complexion' => 'Pale'],
        ];
        $this->db->insert_batch('complexion', $complexions);
        
    }

    public function down()
    {
        $this->dbforge->drop_table('complexion', true);
    }
}
