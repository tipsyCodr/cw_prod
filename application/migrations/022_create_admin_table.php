<?php

class Migration_Create_admin_table extends CI_Migration
{

    public function up()
    {
        $this->dbforge->add_field(array(
            'admin_id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'name' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'email' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'password' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'role' => array(
                'type' => 'VARCHAR',
                'constraint' => 255,
            ),
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp'
        ));
        $this->dbforge->add_key('admin_id', TRUE);
        $this->dbforge->create_table('admin', TRUE, ['ENGINE' => 'MyISAM']);
    }

    public function down()
    {
        $this->dbforge->drop_table('admin', TRUE);
    }
}
