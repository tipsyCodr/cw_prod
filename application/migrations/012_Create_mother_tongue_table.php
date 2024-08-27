<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_mother_tongue_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'mother_tongue_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mother_tongue' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('mother_tongue_id', true);
        $this->dbforge->create_table('mother_tongue', true, ['ENGINE' => 'MyISAM']);

        $mother_tongues = [
            ['mother_tongue' => 'Hindi'],
            ['mother_tongue' => 'English'],
            ['mother_tongue' => 'Bengali'],
            ['mother_tongue' => 'Telugu'],
            ['mother_tongue' => 'Marathi'],
            ['mother_tongue' => 'Tamil'],
            ['mother_tongue' => 'Gujarati'],
            ['mother_tongue' => 'Urdu'],
            ['mother_tongue' => 'Kannada'],
            ['mother_tongue' => 'Malayalam'],
            ['mother_tongue' => 'Punjabi'],
            ['mother_tongue' => 'Odia'],
        ];
        $this->db->insert_batch('mother_tongue', $mother_tongues);
        
    }

    public function down()
    {
        $this->dbforge->drop_table('mother_tongue', true);
    }
}
