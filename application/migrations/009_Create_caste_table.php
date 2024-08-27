<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Migration_Create_caste_table extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field([
            'caste_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'caste' => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
        ]);

        $this->dbforge->add_key('caste_id', true);
        $this->dbforge->create_table('caste', true, ['ENGINE' => 'MyISAM']);
    }

    public function down()
    {
        $this->dbforge->drop_table('caste', true);
    }
}
