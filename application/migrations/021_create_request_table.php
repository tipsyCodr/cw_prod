<?php

class Migration_Create_request_table extends CI_Migration
{

    public function up()
    {
        if (!$this->db->table_exists('requests')) {
            $this->dbforge->add_field([
                'request_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'user_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => false,
                ],
                'matrimonial_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => false,
                ],
                'status' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => false,
                    'default' => 'pending',
                ],
                'created_on' => [
                    'type' => 'TIMESTAMP',
                    'null' => false,
                ],
                'updated_on' => [
                    'type' => 'TIMESTAMP',
                    'null' => false,
                ],
            ]);

            $this->dbforge->add_key('request_id', true);
            $this->dbforge->create_table('requests');
        }
    }

    public function down()
    {
        $this->dbforge->drop_table('requests');
    }
}
